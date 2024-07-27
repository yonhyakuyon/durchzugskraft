<?php

return array(
    /*
     * Для примера оставил как могут выглядеть ссылки с переменной в адресе
    // Товар:
    'product/([0-9]+)' => 'product/view/$1', // actionView в ProductController
    // Каталог:
    'catalog' => 'catalog/index', // actionIndex в CatalogController
    'index.php' => 'site/index', // actionIndex в SiteController
    */
    //О нас
    'about'=>'about/about',
    //Товар
    'product/([0-9]+)' => 'product/productsview/$1', // actionView в ProductController
    // Категории товаров
    'categories' => 'categories/view',
    'categ/([0-9]+)' => 'categories/open/$1',
    //Регистрация/вход
    'auth'=>'auth/auth',
    'check' => 'auth/check',
    'registration' => 'registration/reg',
    'newacc' => 'registration/createacc',
    //Личный кабинет
    'pa'=> 'personalarea/viewpa',
    'logout'=>'personalarea/logout',
    // Заказ
    'order' => 'order/vieworder',
    // Корзина
    'cart' => 'cart/viewcart', // actionIndex в CartController
    // Главная страница
    'index.php' => 'site/index',
    'save_json.php' => 'site/save_json',
    '' => 'site/index', // actionIndex в SiteController
);
