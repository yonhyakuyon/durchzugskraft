<?php

class Authentication
{
    public static function checkUser()
    {
        //получаем введённые данные
        $login = $_SESSION['login'];
        $password = $_SESSION['password'];
        //запрашиваем пароль из БД
        $sql_password = "SELECT user_password FROM users WHERE user_login = '$login'";
        $db_password = DataBaseConnection::connect()->query($sql_password)->fetch_column();
        //проверяем совпадают ли пароли
        if ($db_password != $password){
            $_SESSION['auth'] = 0;
        }else{
            $_SESSION['auth'] = 1;
        }
    }
}