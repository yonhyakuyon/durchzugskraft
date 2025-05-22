<?php

class ProductController
{
    public function actionProductsView($id)
    {
        $prod_id = $id;
        $product = self::getProduct($id);
        // require_once(ROOT . '/views/site/products.php');
        // return true;
        $contentView = ROOT . "/views/site/products.php";
        include ROOT . '/views/layout/main.php';
        return true;
    }

    public static function getProduct($id)
    {
        $products = SiteModel::getProductsJS();
        $json = json_decode($products,true);
        $result = $json[$id];
        $result = json_encode($result, JSON_UNESCAPED_UNICODE|JSON_FORCE_OBJECT|JSON_PRETTY_PRINT);
        return $result;
    }
}