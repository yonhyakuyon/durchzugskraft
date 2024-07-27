<?php

class DataBaseConnection
{
    public static function connect()
    {
        //подключение к БД
        $sql = new mysqli('localhost', 'root', '', 'durchzugskraft');
        return $sql;
    }
}