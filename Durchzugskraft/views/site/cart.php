<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Корзина</title>
    <link rel="stylesheet" href="/style.css">
    <link rel="shortcut icon" href="/assets/images/logo.png" />
</head>
<header>
    <div class="topnav">
        <a href="index.php" >Главная</a>
        <a href="cart" class="active">Корзина</a>
        <a href="pa">Личный кабинет</a>
        <a href="categories">Категории</a>
        <a href="about">О нас</a>
    </div>
</header>
<body>
<main>
    <div class="main-cart">
    </div>
    <div class="order">
        <button class="make-order">Заказать</button>
    </div>
</main>
<div id="json-data" style="display: none;"><?php echo $products; ?></div>
<script src="/js/jquery-3.7.1.js"></script>
<script src="/js/cart.js"></script>
<script src="/js/notify.js"></script>
</body>
</html>