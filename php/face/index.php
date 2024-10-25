<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/php/toolbox/caller.php';
Caller::Call(); // подключение всех зависимостей
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <title>ToDoList</title>
	<?= BlockPattern::Builder('meta'); ?>
</head>
<body>

<header>
	<?= BlockPattern::Builder('header'); ?>
</header>

<div class="container">
	<?= BlockPattern::Builder('faceIndex'); ?>
	<?= BlockPattern::Builder('indexInformationBlock'); ?>
</div>

</body>

<footer>
	<?php // TODO: Написать footer ?>
</footer>

</html>