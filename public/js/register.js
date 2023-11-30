$(document).ready(function() {
    // Получаем токен CSRF из мета-тега
    const csrfToken = $('meta[name="csrf-token"]').attr('content');

    if (!csrfToken) {
        console.error('CSRF token not found');
        return;
    }

    // Обработчик события для кнопки "Зарегистрироваться"
    $('#registrationForm').submit(function(event) {
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
            data: formData,
            success: function(data, textStatus, xhr) {
                // Обработка успешного ответа
                console.log(data);
                console.log(textStatus);
                console.log(xhr.status); // HTTP статус
            },
            error: function(xhr) {
                // Обработка ошибки
                console.log(xhr.responseText); // Текст ошибки
                console.log(xhr.status); // HTTP статус ошибки
            }
        });
    });
});
