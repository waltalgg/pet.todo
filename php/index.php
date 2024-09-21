<html>
<head>
    <?php
    require_once($_SERVER['DOCUMENT_ROOT'].'\php\debugger.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'\php\block_pattern.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'\php\work_with_database.php');  // TODO: Сделать разделение путей на бд, паттерны и основной код index'а

    Debugger::WatchError(1);
    ?>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Index</title>
</head>
<body>

<div class="container">
    <div class="row mt-5">
        <div class="col-md-12 text-center">
            <h1>ToDoList</h1>
            <p class="lead"> Заметки и календарь <i>ваших</i> дел</p>
        </div>
    </div>
    <?= BlockPattern::ReturnPattern('IndexHeadBlock', 6); ?>
</div>

</body>
</html>