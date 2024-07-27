<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        <? echo "$product_name"; ?>
    </title>
    <link rel="stylesheet" href="/style.css">
    <link rel="shortcut icon" href="/assets/images/logo.png" />
    <base href="http://durchzugskraft/">
</head>

<body>
    <main>
        <div class="topnav">
            <a href="">Главная</a>
            <a href="cart">Корзина</a>
            <a href="pa">Личный кабинет</a>
            <a href="categories">Категории</a>
            <a href="about">О нас</a>
        </div>
    </main>

    <div class="show-product">
        <div class="prod-img"></div>
        <div class="prod-name"></div>
        <div class="prod-description"></div>
        <div class="prod-price"></div>
        <div class="btn-cont"></div>
    </div>

    <div id="product" style="display: none;"><?php echo $product; ?></div>
    <div id="prod-id" style="display: none;"><?php echo $prod_id; ?></div>

    <script src="/js/jquery-3.7.1.js"></script>
    <script src="/js/notify.js"></script>
    <script src="/js/product.js"></script>
</body>

</html>