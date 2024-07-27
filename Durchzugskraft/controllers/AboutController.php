<?php

class AboutController
{
    public function actionAbout()
    {
        require_once(ROOT . '/views/site/about.php');
        return true;
    }
}