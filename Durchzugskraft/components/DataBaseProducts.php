<?php

class DataBaseProducts
{

    public static function getProducts()
    {
        //подключение БД
        $sql_products = "SELECT * from products";
        $sql_products_result = DataBaseConnection::connect()->query($sql_products)->fetch_all();
        //массив с товарами
        $products = array();
        foreach ($sql_products_result as $item) {
            $itemId = $item[0];
            $products[$itemId] = array(
                'name' => $item[1],
                'price' => $item[2],
                'description' => $item[3],
                'order' => $item[4],
                'image' => $item[5],
                'category' => $item[6]
            );
        }
        //создание JSON
        $result = json_encode($products,JSON_UNESCAPED_UNICODE|JSON_FORCE_OBJECT|JSON_PRETTY_PRINT);
        //запись в Session
        $_SESSION['products'] = $result;
    }

}