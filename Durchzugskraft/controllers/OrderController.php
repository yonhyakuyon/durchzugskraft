<?php

class OrderController
{
    public function actionViewOrder()
    {
        // $order = OrderModel::getOrder();
        $order = OrderModel::getOrder();
        $page_title = 'Ваш заказ';
        $contentView = ROOT . "/views/site/order.php";
        include ROOT . '/views/layout/main.php';
        return true;
    }
}