<?php

class OrderModel
{
    public static function getOrder()
    {
        // //обновление БД
        self::updateDataBase();
        $sql_order_id = "SELECT MAX(order_id) FROM orders";
        $order_id = DataBaseConnection::connect()->query($sql_order_id)->fetch_column();
        $sql_get_order = "SELECT order_id, order_date FROM orders WHERE order_id = '$order_id'";
        $order =DataBaseConnection::connect()->query($sql_get_order)->fetch_all();
        //открытие JSON-файла
        $json = $_SESSION['products'];
        $json = json_decode($json, true);
        // создание массива с нужной для вывода информацией
        $result =  '<p1 class="result-order-number"> Номер заказа:'.$order[0][0].'</p1>'; //номер заказа
        $result .= '<div class="result-order">';//итог заказа в str
        $cart = $_SESSION["json_data"]; // корзина -> $cart
        $sum = 0; //итоговая стоимость
        // echo '<pre>';
        // print_r($json);
        foreach ($cart  as $id=>$count){ //$id - id товара, $count - кол-во товара
            $result .= 'Артикул :'.$id;
            $result .= ' Название :'.$json[$id]['product_title'];
            $result .= ' Количетво :'.$count;
            $result .= ' Сумма :'.$count*$json[$id]['characteristics']['Price'];
            $sum += $count*$json[$id]['characteristics']['Price'];
            $result .= '<br>';
        }
        $result .= 'Всего: '.$sum.'₽';
        $result .= '</div>';
        //update order
        $sql_add_sum = "UPDATE orders SET order_sum = '$sum' WHERE order_id = '$order_id';";
        DataBaseConnection::connect()->query($sql_add_sum);
        return $result;
        
    }
    public static function updateDataBase()
    {
        //get user id
        $order_user_id = self::getOrderUserId();
        //подключение к БД
        $sql = new mysqli('localhost','root','','durchzugskraft');
        //создание заказа
        $sql_insert = "INSERT INTO orders (order_date, order_user_id) VALUES (current_date, '$order_user_id')";
        $sql->query($sql_insert);
        //получение корзины    
        $sql_order_id = "SELECT MAX(order_id) FROM orders";
        $order_id = $sql->query($sql_order_id)->fetch_column();
        // echo $order_id;
        $cart = $_SESSION["json_data"];
        // var_dump($cart);
        $sum = 0;
        foreach($cart as $id=>$count){
            // echo 'id:'.$id;
            // echo 'count:'.$count;
            $price = self::getCurrentPrice($id);
            // print $price;
            $sum += $price * $count;
            $sql_insert_order = "INSERT INTO `order_product` (`order_id`, `order_product_id`, `product_count`, `product_price`) VALUES ('$order_id', '$id', '$count', '$price');";
            $sql->query($sql_insert_order);
        }
        // echo 'sum:'.$sum;
        
    }
    public static function getOrderUserId()
    {
        if ($_SESSION['login'] != NULL){
            $login = $_SESSION['login'];
            $sql = "SELECT user_id FROM users WHERE user_login = '$login'";
            return DataBaseConnection::connect()->query($sql)->fetch_column();
        }
    }
    public static function getCurrentPrice($id){
        $sql = "SELECT pc.pc_char_content AS product_price 
        FROM product_chars pc 
        JOIN characteristics c ON pc.pc_char_id = c.id 
        WHERE pc.pc_product_id = " . (int)$id . " 
        AND c.char_name = 'Price'";
        return DataBaseConnection::connect()->query($sql)->fetch_column();
    }
}