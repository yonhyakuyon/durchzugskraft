<?php

class CategoriesController
{
    public function actionView()
    {
        require_once(ROOT . '/views/site/categories.php');
        return true;
    }
    public function actionOpen($id)
    {
        $category_id = $id;
        $products = SiteModel::getProductsJS();
        $file = ROOT . '/views/categories/' . $id . '.php';
        if (file_exists($file)) {
            require_once($file);
        } else {
            // Обработка ошибки, если файл не найден
            echo "Файл не найден!";
        }
        return true;
    }
}