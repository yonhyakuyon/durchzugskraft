<?php

class SiteModel
{
    public static function getProductsJS()
    {
        //подгрузка JSON с товарами
        DataBaseProducts::getProducts(); //запуск getProducts()
        $products = $_SESSION['products'];
        return $products;
    }
}