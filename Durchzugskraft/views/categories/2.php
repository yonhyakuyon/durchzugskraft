<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Визуальные запчасти</title>
    <link rel="stylesheet" href="/style.css">
    <link rel="shortcut icon" href="/assets/images/logo.png" />
    <base href="http://durchzugskraft/">
</head>
<header>
    <div class="topnav">
        <a href="index.php" >Главная</a>
        <a href="cart" >Корзина</a>
        <a href="pa">Личный кабинет</a>
        <a href="categories" class="active">Категории</a>
        <a href="about">О нас</a>
    </div>
</header>
<body>
<div class="show-products"></div>
<div id="category-id" style="display: none;"><?php echo $category_id; ?></div>
<div id="products" style="display: none;"><?php echo $products; ?></div>
<script src="/js/jquery-3.7.1.js"></script>
<script src="/js/categories.js"></script>
</body>
</html>
