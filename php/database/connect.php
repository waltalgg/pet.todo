<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/php/config/configDatabase');
class Connect
{
	private static function TryToConnect($dbname = '')
	{
		if (!isset($dbname)) $dbname = ConfigDatabase::GetParam('dbnameDefolt');

		$host = ConfigDatabase::GetParam('host');
		$username = ConfigDatabase::GetParam('username');
		$password = ConfigDatabase::GetParam('password');

		if (empty($host) || empty($username) || empty($password)) {
			die("Error: Ошибка подключения к базе данных!");
		}
		try
		{
			$connect = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
			$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $connect;
		}
		catch (PDOException $e)
		{
			echo "Ошибка подключения: " . $e->getMessage();
			die();
		}
	}
	public static function Connect($dbname)
	{
		self::TryToConnect($dbname);
	}
}