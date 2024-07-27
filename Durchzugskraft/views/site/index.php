<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Durchzugskraft</title>
    <link rel="stylesheet" href="/style.css">
    <link rel="shortcut icon" href="/assets/images/logo.png" />
</head>
<body>
<main>
    <div class="topnav">
        <a href="" class="active">Главная</a>
        <a href="cart" >Корзина</a>
        <a href="pa">Личный кабинет</a>
        <a href="categories">Категории</a>
        <a href="about">О нас</a>
    </div>
    <div class="show-products">
    </div>
</main>
<!--отправка JSON к JS:-->
<div id="json-data" style="display: none;"><?php echo $result; ?></div>
<!--подгрузка JS-->
<script src="/js/jquery-3.7.1.js"></script>
<script src="/js/notify.js"></script>
<script src="/js/main.js"></script>
</body>
</html>
