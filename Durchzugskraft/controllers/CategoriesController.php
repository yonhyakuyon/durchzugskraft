<?php

class CategoriesController
{
    public function actionView()
    {
        $page_title = 'Каталог';
        $contentView = ROOT . "/views/site/categories.php";
        include ROOT . '/views/layout/main.php';
        return true;
    }
    public function actionOpen($id)
    {
        $category_id = $id;
        $products = SiteModel::getProductsJS();
        $page_title = 'Каталог';
        $contentView = ROOT . '/views/layout/category.php';
        include ROOT . '/views/layout/main.php';
        return true;
    }
}