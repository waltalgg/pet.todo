<?php

class ConfigLinks
{
	private $pageName;
	public function __construct($pageName)
	{
		$this->pageName = $pageName;
	}
	public function ReturnConfigLink()
	{
		$prefix = 'pages/../'; // TODO: Разобраться с ссылками
		switch(mb_strtolower($this->pageName, 'UTF-8'))
		{
			case 'главная':
				return $prefix.'homespace.php';

			case 'мой профиль':
				return $prefix.'myprofile.php';

			case 'мои заметки':
				return $prefix.'mynotes.php';

		}
	}
}