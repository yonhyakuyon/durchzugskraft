<?php


class SiteController
{
    public function actionIndex()
    {
        $result = SiteModel::getProductsJS(); //отправка товаров в JSON
        require_once(ROOT . '/views/site/index.php');
        return true;
    }

    // Новый метод для сохранения JSON в сессии
    public function actionSaveJson()
    {
        require_once(ROOT . '/save_json.php');
        return true;
    }
//    public static  function actionIndexnsite(){
//        //почему то выдаёт ошибку, что такого метода нет(
//    }
//    public function actionIndexcsite()
//    {
//        //почему то выдаёт ошибку, что такого метода нет(
//    }
//    public function actionIndexlsite()
//    {
//        //почему то выдаёт ошибку, что такого метода нет(
//    }
//    public function actionIndexpsite()
//    {
//        //почему то выдаёт ошибку, что такого метода нет(
//    }
}
