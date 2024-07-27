<?php

class AuthController
{
    public static function actionAuth()
    {
        require_once(ROOT . '/views/site/auth.php');
        return true;
    }
    public static function actionCheck()
    {
        $login= $_POST['login'];
        $password = $_POST['password'];
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $password;
        Authentication::checkUser();
        echo '<meta http-equiv = "refresh" content = "0; url = pa" />'; //редирект на PA
        return true;
    }
}