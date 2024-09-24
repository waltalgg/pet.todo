<?php
require_once($_SERVER['DOCUMENT_ROOT'].'\php\database\connect.php');
class WorkWithDatabase
{
    private static function SelectInDatabase($dbname, $table, $sql, $flag = '')
    {
		$connect = Connect::ConnectReturn($dbname);
        // TODO: Логика работы с БД, запрос SELECT
    }
    public static function AccessToDatabase($dbname = '', $table = '', $request = '') // TODO: По дефолту брать из конфига
    {
        $result = '';
        $sql = ''; // TODO: Организация sql запросов через отедльную функцию
        $flag = ''; // TODO: Флаги отдельной функцией
        switch ($request)
        {
            case 'select':
                $result = self::SelectInDatabase($dbname, $table, $sql, $flag);
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