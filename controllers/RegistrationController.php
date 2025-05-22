<?php

class RegistrationController
{
    public static function actionReg()
    {
        $page_title = 'Регистрация';
        $contentView = ROOT . "/views/site/registration.php";
        include ROOT . '/views/layout/main.php';
        return true;
    }
    public static function actionCreateAcc()
    {
        $login= $_POST['reg-login'];
        $password = $_POST['reg-pass'];
        $email = $_POST['reg-email'];
        $sql = "INSERT INTO users (user_login, user_password, user_email) VALUES ('$login','$password','$email')";
        DataBaseConnection::connect()->query($sql);
        echo '<meta http-equiv = "refresh" content = "0; url = pa" />'; //редирект на PA
        return true;
    }
}