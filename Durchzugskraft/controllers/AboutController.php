<?php

class AboutController
{
    public function actionAbout()
    {
        $page_title = 'О нас';
        $contentView = ROOT . "/views/site/about.php";
        include ROOT . '/views/layout/main.php';
        return true;
    }
}