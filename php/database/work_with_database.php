<?php

class WorkWithDatabase
{
    private static function SelectInDatabase($database, $table, $sql, $flag = '')
    {
        // TODO: Логика работы с БД, запрос SELECT
    }
    public static function AccessToDatabase($database = '', $table = '', $request = '') // TODO: По дефолту брать из конфига
    {
        $result = '';
        $sql = ''; // TODO: Организация sql запросов через отедльную функцию
        $flag = ''; // TODO: Флаги отдельной функцией
        switch ($request)
        {
            case 'select':
                $result = self::SelectInDatabase($database, $table, $sql, $flag);
                break;
            case 'update':
                break;
            case 'delete':
                break;
            case 'edit':
                break;
            case 'create':
                break;
        }
        return $result;

    }

}