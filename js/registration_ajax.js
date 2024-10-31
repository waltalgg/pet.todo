document.getElementById('registrationForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);

    console.log('Начало работы формы регистрации');

    // Отправляем данные на сервер
    fetch('../auth/new_user_registration.php', {
        method: 'POST',
        body: formData
    })
        .then(response =>
        {
            if (!response.ok)
            {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data =>
        {
            if (data.error)
            {
                alert(data.error);
            }
            else if (data.success)
            {
                alert(data.success);
                location.href = '../face/index.php'; // Переход на страницу успешной регистрации
            }
        })
        .catch(error => console.error('Ошибка: ', error));
});
