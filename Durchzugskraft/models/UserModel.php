<?php



class UserModel
{
 public static function logOut(){
     //Выход из учётной записи
    unset($_SESSION["login"]);
    unset($_SESSION["password"]);
    $_SESSION['auth'] = 0;
 }
 public static function loadOrderInfo()
 {
     //получение данных о пользователе
     $login = $_SESSION["login"];
     $sql_user_id = "SELECT user_id FROM users WHERE user_login = '$login'";
     $user_id = DataBaseConnection::connect()->query($sql_user_id)->fetch_column();
     //получение данных о заказах пользователя
     $sql_order_info = "SELECT order_id, order_date, order_cart
    FROM orders
    INNER JOIN users ON orders.order_user_id = users.user_id
    WHERE users.user_id = '$user_id'";
     $sql_result = DataBaseConnection::connect()->query($sql_order_info)->fetch_all();
     return $sql_result;
 }
}