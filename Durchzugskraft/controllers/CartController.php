<?php

class CartController
{
    public function actionViewCart()
    {
        //отправляем список товаров в JSON
        $products = SiteModel::getProductsJS();
        $page_title = 'Корзина';
        // require_once(ROOT . '/views/site/about.php');
        $contentView = ROOT . "/views/site/cart.php";
        include ROOT . '/views/layout/main.php';
        return true;
    }
    public function getLogin(){
        
    }
}