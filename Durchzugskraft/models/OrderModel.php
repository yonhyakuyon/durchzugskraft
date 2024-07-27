<?php

class OrderModel
{
    public static function getOrder()
    {
        //обновление БД
        self::updateDataBase();
        $sql_order_id = "SELECT MAX(order_id) FROM orders";
        $order_id = DataBaseConnection::connect()->query($sql_order_id)->fetch_column();
        $sql_get_order = "SELECT order_id, order_date, order_cart FROM orders WHERE order_id = '$order_id'";
        $order =DataBaseConnection::connect()->query($sql_get_order)->fetch_all();
        //открытие JSON-файла
        $json = $_SESSION['products'];
        $json = json_decode($json, true);
        // создание массива с нужной для вывода информацией
        $result =  '<p1 class="result-order-number"> Номер заказа:'.$order[0][0].'</p1>'; //номер заказа
        $result .= '<div class="result-order">';//итог заказа в str
        $cart = $_SESSION["json_data"]; // корзина -> $cart
        $sum = 0; //итоговая стоимость
        foreach ($cart  as $id=>$count){ //$id - id товара, $count - кол-во товара
            $result .= 'Артикул :'.$id;
            $result .= ' Название :'.$json[$id]['name'];
            $result .= ' Количетво :'.$count;
            $result .= ' Сумма :'.$count*$json[$id]['price'];
            $sum += $count*$json[$id]['price'];
            $result .= '<br>';
        }
        $result .= 'Всего: '.$sum.'₽';
        $result .= '</div>';
        return $result;
    }
    public static function updateDataBase()
    {
        $order_user_id = self::getOrderUserId();
        //подключение к БД
        $sql = new mysqli('localhost','root','','durchzugskraft');
        //получение корзины
        $cart = $_SESSION["json_data"];
        $order_cart = json_encode($cart); //array -> JSON
        //запись заказа в БД
        $sql_insert = "INSERT INTO orders (order_date, order_cart, order_user_id) VALUES (current_date,'$order_cart', '$order_user_id')";
        $sql->query($sql_insert);
    }
    public static function getOrderUserId()
    {
        $login = $_SESSION['login'];
        $sql = "SELECT user_id FROM users WHERE user_login = '$login'";
        return DataBaseConnection::connect()->query($sql)->fetch_column();
    }
}