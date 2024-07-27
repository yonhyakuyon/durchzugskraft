<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><? echo $login?></title>
    <link rel="stylesheet" href="/style.css">
    <link rel="shortcut icon" href="/assets/images/logo.png" />
</head>
<header>
    <div class="topnav">
        <a href="index.php" >Главная</a>
        <a href="cart" >Корзина</a>
        <a href="pa" class="active">Личный кабинет</a>
        <a href="categories">Категории</a>
        <a href="about">О нас</a>
    </div>
</header>
<body>
<div class="orders-list">
<!--    --><?php //echo '<pre>';
//    print_r($orders_list); ?>
    <div class="order">

    </div>
</div>
<div id="orders-list" style="display: none;"><?php print_r($json); ?></div>
<div id="products" style="display: none;"><?php echo($products); ?></div>
<a class="logout" href="logout"><button class="logout" type="submit">Выйти из учётной записи</button></a>
<div class="ord-test"></div>
</body>
<script src="/js/jquery-3.7.1.js"></script>
<script src="/js/orders.js"></script>
</html>
