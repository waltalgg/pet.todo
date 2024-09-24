<html>
<head>
    <?php
    require_once($_SERVER['DOCUMENT_ROOT'].'\php/debugger\debugger.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'\php/pattern\block_pattern.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'\php/database\work_with_database.php'); // TODO: Сделать namespaces

    Debugger::WatchError(1);
    ?>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href= "../css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>ToDoList</title>
</head>

<header>
        <?= BlockPattern::ReturnPattern('header') ?>
</header>

<body>
    <div class="container">
        <?= BlockPattern::ReturnPattern('faceIndex'); ?>
        <?= BlockPattern::ReturnPattern('indexInformationBlock'); ?>
    </div>

</body>
</html>