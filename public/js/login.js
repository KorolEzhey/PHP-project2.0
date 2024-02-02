// Получите CSRF-токен из метатега
const csrfToken = $('meta[name="csrf-token"]').attr('content');

// Установите CSRF-токен в заголовок запроса для всех AJAX-запросов
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': csrfToken
    }
});

// Теперь при отправке POST-запроса CSRF-токен будет включен в запрос автоматически
$(document).ready(function() {
    $('#login-form').submit(function(e) {
        e.preventDefault();

        // Получите данные формы
        const email = $('#email').val();
        const password = $('#password').val();

        // Отправьте POST-запрос с использованием jQuery и AJAX
        $.ajax({
            url: '/login',
            method: 'POST',
            data: {
                email: email,
                password: password
            },
            success: function(response) {
                // Обработка успешного ответа от сервера
                // Например, перенаправление на другую страницу
                window.location.href = '/profile';
            },
            error: function(xhr, status, error) {
                if (xhr.status === 404) {
                    alert('User not found.');
                } else if (xhr.status === 401) {
                    alert('Incorrect password.');
                } else {
                    alert('An error occurred while sending the request: ' + error);
                }
            }
        });
    });
});