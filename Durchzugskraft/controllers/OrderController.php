<?php

class OrderController
{
    public function actionViewOrder()
    {
        $order = OrderModel::getOrder();
        require_once(ROOT . '/views/site/order.php');
        return true;
    }
}