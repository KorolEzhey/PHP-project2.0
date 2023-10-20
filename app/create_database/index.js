const mysql = require('mysql2');

const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '1245'
});

// Подключение к MySQL
connection.connect((err) => {
  if (err) {
    console.error('Ошибка подключения к MySQL: ' + err.message);
    return;
  }

  console.log('Успешное подключение к MySQL');

  // Создание базы данных, если она не существует
  connection.query('CREATE DATABASE IF NOT EXISTS db_person', (err, results) => {
    if (err) {
      console.error('Ошибка при создании базы данных: ' + err.message);
    } else {
      console.log('База данных "db_person" создана или уже существует');

      // Переключаемся на базу данных "db_person"
      connection.changeUser({ database: 'db_person' }, (err) => {
        if (err) {
          console.error('Ошибка при переключении на базу данных: ' + err.message);
          return;
        }
        console.log('Переключение на базу данных "db_person" успешно');

        // Создаем таблицу "Person", если она не существует
        connection.query('CREATE TABLE IF NOT EXISTS Person (id INT AUTO_INCREMENT, name VARCHAR(255), email VARCHAR(255), password VARCHAR(255), passport VARCHAR(255), about TEXT, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, PRIMARY KEY (id))', (err, results) => {
          if (err) {
            console.error('Ошибка при создании таблицы: ' + err.message);
          } else {
            console.log('Таблица "Person" создана или уже существует');
          }

          // Закрытие соединения
          connection.end((err) => {
            if (err) {
              console.error('Ошибка при закрытии соединения: ' + err.message);
            } else {
              console.log('Соединение с MySQL закрыто');
            }
          });
        });
      });
    }
  });
});