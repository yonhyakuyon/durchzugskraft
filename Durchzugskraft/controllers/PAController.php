<?php

class PAController
{
    public function actionIndex()
    {
        //проверка входа пользователя в акк
        if ($_SESSION['auth'] == 1){
            //при успешном входе редирект на ЛК
            $acc_info = UserModel::loadOrderInfo(); //получаем данные заказов
            $login = $_SESSION['login']; //получаем логин пользователя
            require_once(ROOT . '/views/site/pa.php');
            return true;
        }else{
            //в противном случае редирект на форму регистрации/входа
            echo '<meta http-equiv = "refresh" content = "0; url = auth" />'; //редирект на auth
            return true;
        }

    }
    public static function actionLogOut()
    {
        UserModel::logOut();
    }
}