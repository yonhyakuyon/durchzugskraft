<?php

class DataBaseProducts
{

    public static function getProducts()
    {
        $db = DataBaseConnection::connect();
        //подключение БД
        $sql_products = "SELECT * from products";
        $sql_products_result = $db->query($sql_products);
        // $sql_products_result = $db->query($sql_products)->fetch_all();
        //массив с товарами
        $products = array();
        // foreach ($sql_products_result as $item) {
        //     $itemId = $item[0];
        //     $products[$itemId] = array(
        //         'name' => $item[1],
        //         'price' => $item[2],
        //         'description' => $item[3],
        //         'order' => $item[4],
        //         'image' => $item[5],
        //         'category' => $item[6]
        //     );
        // }
        // Основные данные о товарах
        $sql_products = "SELECT 
            p.product_id,
            p.product_title,
            p.product_image
            FROM products p";
        $products_result = $db->query($sql_products);
        while ($product = $products_result->fetch_assoc()) {
            $productId = $product['product_id'];
            
            // Получаем характеристики из product_chars
            $sql_chars = "SELECT 
                c.char_name,
                pc.pc_char_content 
                FROM product_chars pc
                JOIN characteristics c ON pc.pc_char_id = c.id
                WHERE pc.pc_product_id = $productId";
            
            $chars_result = $db->query($sql_chars);
            
            // Формируем массив характеристик
            $characteristics = [];
            while ($char = $chars_result->fetch_assoc()) {
                $characteristics[$char['char_name']] = $char['pc_char_content'];
            }
            
            // Формируем структуру товара
            $products[$productId] = [
                'product_title' => $product['product_title'],
                'product_image' => $product['product_image'],
                'characteristics' => $characteristics
            ];
        }
        
        //создание JSON
        $result = json_encode($products,JSON_UNESCAPED_UNICODE|JSON_FORCE_OBJECT|JSON_PRETTY_PRINT);
        //запись в Session
        $_SESSION['products'] = $result;
    }

}