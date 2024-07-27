<?php

class PersonalAreaController
{
    public static function actionViewPA()
    {
        //проверка входа пользователя в акк
        if ($_SESSION['auth'] == 1){
            //при успешном входе редирект на ЛК
            $products = SiteModel::getProductsJS();
            $orders_list = UserModel::loadOrderInfo(); //получаем данные заказов
            $login = $_SESSION['login']; //получаем логин пользователя
            $json = json_encode($orders_list);
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
        self::actionViewPA();
    }
}