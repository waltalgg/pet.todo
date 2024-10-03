<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/php/toolbox/caller.php');
Caller::Call(); // подключение всех зависимостей
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<title>Регистрация</title>
    <link href= "../../css/page_registration.css" rel="stylesheet">
    <?= BlockPattern::ReturnPattern('meta'); ?>

</head>
<body>
    <?= BlockPattern::ReturnPattern('PageRegistration');  // TODO: Сделать норм дизайн и анимации ?>
</body>

<footer>

</footer>

</html>