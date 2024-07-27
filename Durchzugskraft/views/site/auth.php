<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Вход в учётную запись</title>
    <link rel="stylesheet" href="/style.css">
    <link rel="shortcut icon" href="/assets/images/logo.png" />
</head>
<header>
        <div class="topnav">
            <a href="index.php" >Главная</a>
            <a href="cart" >Корзина</a>
            <a href="pa">Личный кабинет</a>
            <a href="categories">Категории</a>
            <a href="about">О нас</a>
        </div>
</header>
<body>
<div class="auth-and-reg">
    <div class="auth-field">
        <p class="auth-title">Авторизироваться</p>
        <form class="auth-form" action="check" method="post">
            <label for="login">Введите ваш логин</label>
            <input type="text" name="login" id="login" placeholder="Ваш логин, к примеру '@yonhyakuyon'">
            <label for="password">Введите ваш пароль</label>
            <input type="password" name="password" id="password" placeholder="Введите ваш пароль">
            <button class="send-auth-info">Войти</button>
        </form>
        <div class="auth-redirect">
            <h7>Ещё нет аккаунта?</h7> <a class="registration" href="registration">Зарегистрироваться</a>
        </div>
    </div>
</div>

</body>
</html>
