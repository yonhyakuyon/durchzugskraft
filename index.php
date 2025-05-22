<?php

// FRONT CONTROLLER

// Общие настройки
ini_set('display_errors',1);
error_reporting(E_ALL);

session_start();

// Подключение файлов системы
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/Router.php');
require_once(ROOT.'/components/DataBaseConnection.php');
require_once(ROOT.'/components/DataBaseProducts.php');
require_once(ROOT.'/components/Authentication.php');
require_once(ROOT.'/models/UserModel.php');
require_once(ROOT.'/models/OrderModel.php');
require_once(ROOT.'/models/SiteModel.php');
// Вызов Router
$router = new Router();
$router->run();