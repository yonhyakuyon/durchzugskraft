<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>
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
    <div class="registration-field">
        <p class="auth-title">Зарегистрироваться</p>
        <form action="newacc" class="auth-form" method="post">
            <label for="reg-login">Введите логин</label>
            <input type="text" name="reg-login" id="reg-login" placeholder="например, 'example'">
            <label for="reg-email">Введите вашу электронную почту</label>
            <input type="email" name="reg-email" id="reg-email" placeholder="например, 'example@chsu.ru'">
            <label for="reg-phone">Введите ваш номер телефона</label>
            <input type="number" name="reg-phone" id="reg-phone" placeholder="например, '86669995517'">
            <label for="reg-pass">Придумайте пароль</label>
            <input type="password" name="reg-pass" id="reg-pass" placeholder=":)">
            <button class="send-reg-info">Зарегистрироваться</button>
        </form>
        <div class="auth-redirect">
            <h7>Уже есть аккаунт</h7> <a class="auth" href="auth">Войти в свой акк</a>
        </div>
    </div>
</div>

</body>
</html>
