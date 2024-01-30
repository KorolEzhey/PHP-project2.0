$(document).ready(function () {
    // Получаем токен CSRF из мета-тега
    const csrfToken = $('meta[name="csrf-token"]').attr('content');

    // Обработчик события нажатия на кнопку "Сгенерировать пароль"
    $("#generatePassword").on("click", function () {
        // Ваш код для генерации пароля (или вызов соответствующей функции)
        var generatedPassword = generateRandomPassword(12);

        // Вставляем сгенерированный пароль в поле
        $("#password").val(generatedPassword);
    });

    // Обработчик события при нажатии кнопки "Уже есть аккаунт?"
    $("#loginButton").click(function () {
        // Переадресация на страницу входа
        window.location.href = "/login"; // Укажите свой маршрут для страницы входа
    });

    // Обработчик события для кнопки "Зарегистрироваться"
    $('#registrationForm').submit(function (event) {
        // Отменяем стандартное действие формы
        event.preventDefault();

        // Собираем данные формы
        const formData = {
            name: $('#username').val(),
            email: $('#email').val(),
            passport: $('#passport').val(),
            _token: csrfToken, // Добавляем токен CSRF
        };

        // Отправляем POST-запрос на сервер
        $.ajax({
            url: '/register',
            type: 'POST',
            data: formData, // Используем объект formData без JSON.stringify
            success: function (data, textStatus, xhr) {
                // Обработка успешного ответа
                console.log(data);
                console.log(textStatus);
                console.log(xhr.status); // HTTP статус
                // Добавьте здесь переход на страницу пользователя, например:
                window.location.href = "/user-profile";
            },
            error: function (xhr) {
                // Обработка ошибки
                console.log(xhr.responseText); // Текст ошибки
                console.log(xhr.status); // HTTP статус ошибки
            }
        });
    });

    // Функция для генерации случайного пароля
    function generateRandomPassword(length) {
        var charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-+=";
        var password = "";
        for (var i = 0; i < length; i++) {
            var randomIndex = Math.floor(Math.random() * charset.length);
            password += charset.charAt(randomIndex);
        }
        return password;
    }
});
