<?php

class CartController
{
    public function actionViewCart()
    {
        //отправляем список товаров в JSON
        $products = SiteModel::getProductsJS();
        require_once(ROOT . '/views/site/cart.php');
        return true;
    }
}