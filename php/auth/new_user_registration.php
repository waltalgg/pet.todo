<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/php/toolbox/caller.php';
Caller::Call(); // подключение всех зависимостей
class NewUserRegistration
{
	private $login;
	private $email;
	private $password;
	private $db;

	public function __construct($login, $email, $password)
	{
		$this->login = $login;
		$this->email = $email;
		$this->password = $password;

		$this->connectDB();
		$this->ProcessRegistration();
	}

	private function connectDB()
	{
		$this->db = Connect::ConnectReturn('todobase');
	}

	private function ProcessRegistration()
	{
		if ($this->isValidEmail($this->email) &&
			$this->isValidLogin($this->login) &&
			$this->isValidPassword($this->password) &&
			$this->isStrongPassword($this->password) &&
			$this->CheckData())
		{
			$this->RegisterUser();
		}
		else
		{
			echo json_encode(['error' => 'Ошибка валидации данных.']);
		}
	}

	private function CheckData()
	{
		$stmt = $this->db->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
		$stmt->execute([$this->email]);
		$count = $stmt->fetchColumn();
		return $count === 0; // if count === 0 -> true
	}

	private function RegisterUser()
	{
		$hashedPassword = password_hash($this->password, PASSWORD_BCRYPT);
		$stmt = $this->db->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
		if ($stmt->execute([$this->login, $this->email, $hashedPassword]))
		{
			echo json_encode(['success' => 'Пользователь успешно зарегистрирован.']);
			// TODO: Дополнительно можно отправить подтверждение на email
		}
		else
		{
			echo json_encode(['error' => 'Ошибка регистрации.']);
		}
	}

	private function isValidEmail($email)
	{
		return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
	}

	private function isValidLogin($login)
	{
		return strlen($login) >= 3;
	}

	private function isValidPassword($password)
	{
		return strlen($password) >= 6;
	}

	private function isStrongPassword($password)
	{
		return preg_match('/[A-Z]/', $password) &&
			preg_match('/[0-9]/', $password) &&
			preg_match('/[\W_]/', $password);
	}
}

?>
