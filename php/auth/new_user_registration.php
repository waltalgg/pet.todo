<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/php/toolbox/caller.php';
Caller::Call(); // подключение всех зависимостей

class NewUserRegistration
{
	private $login;
	private $email;
	private $password;
	public function __construct($login, $email, $password)
	{
		$this->login = $login;
		$this->email = $email;
		$this->password = $password;

		$this->CheckData();
	}

	private function CheckData()
	{

	}

}
$login = $_POST['login_registration'];
$email = $_POST['email_registration'];
$password = $_POST['password_registration'];
$newUser = new NewUserRegistration($login, $email, $password);