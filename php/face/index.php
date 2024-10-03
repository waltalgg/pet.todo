<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/php/toolbox/caller.php');
Caller::Call(); // подключение всех зависимостей
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <title>ToDoList</title>
	<?= BlockPattern::ReturnPattern('meta'); ?>
</head>
<body>

<header>
	<?= BlockPattern::ReturnPattern('header'); ?>
</header>

<div class="container">
	<?= BlockPattern::ReturnPattern('faceIndex'); ?>
	<?= BlockPattern::ReturnPattern('indexInformationBlock'); ?>
</div>

</body>

<footer>
	<?php // TODO: Написать footer ?>
</footer>

</html>