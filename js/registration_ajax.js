document.getElementById('registrationForm').addEventListener('submit', function(e)
{
    e.preventDefault();
    const formData = new FormData(this);
    console.log('Регистрация js');

    fetch('../auth/new_user_registration.php',
        {
        method: 'POST',
        body: formData
    })
        .then(response =>
        {
            if (response.ok)
            {
                return response.text();
            }
            throw new Error('Network response was not ok');
        })
        .then(data =>
        {
            console.log(data);
            location.href = '../auth/new_user_registration.php';
        })
        .catch(error => console.error('Ошибка: ', error));
});