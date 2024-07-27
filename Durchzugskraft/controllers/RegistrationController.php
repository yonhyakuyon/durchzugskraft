<?php

class RegistrationController
{
    public static function actionReg()
    {
        require_once(ROOT . '/views/site/registration.php');
        return true;
    }
    public static function actionCreateAcc()
    {
        $login= $_POST['reg-login'];
        $password = $_POST['reg-pass'];
        $email = $_POST['reg-email'];
        $phone = $_POST['reg-phone'];
        $sql = "INSERT INTO users (user_login, user_password, user_email, user_phone) VALUES ('$login','$password','$email','$phone')";
        DataBaseConnection::connect()->query($sql);
        echo '<meta http-equiv = "refresh" content = "0; url = pa" />'; //редирект на PA
        return true;
    }
}