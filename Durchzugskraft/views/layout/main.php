<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        <? echo $page_title?>
    </title>
    <link rel="stylesheet" href="/style.css">
    <link rel="shortcut icon" href="/assets/images/logo.png" />
    <base href="http://durchzugskraft/">
</head>

<body>
    <?php include 'header.php'; ?>
    <main>
        <?php include $contentView; ?>
    </main>
    <?php include 'footer.php';?>
</body>

</html>