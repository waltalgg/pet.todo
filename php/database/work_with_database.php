<?php
require_once($_SERVER['DOCUMENT_ROOT'].'\php\database\connect.php');
class WorkWithDatabase
{
	private static $connect;

	private static function init($dbname = '')
	{
		self::$connect = Connect::ConnectReturn($dbname);
	}
	private static function CreateInDatabase($dbname, $table, $sql, $flag = '')
	{
		// TODO: Логика работы с БД, запрос CREATE
	}
    private static function SelectInDatabase($dbname, $table, $sql, $flag = '')
    {
        // TODO: Логика работы с БД, запрос SELECT
    }
	private static function UpdateInDatabase($dbname, $table, $sql, $flag = '')
	{
		// TODO: Логика работы с БД, запрос UPDATE
	}

	private static function DeleteInDatabase($dbname, $table, $sql, $flag = '')
	{
		// TODO: Логика работы с БД, запрос DELETE
	}

    public static function AccessToDatabase($dbname = '', $table = '', $request = '') // TODO: По дефолту брать из конфига
    {
		self::init($dbname); // инициализация self::$connect
        $result = '';
        $sql = ''; // TODO: Организация sql запросов через отдельную функцию
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