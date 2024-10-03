<?php

class Sessioner
{
	private static function LoadSession()
	{
		try
		{
			$options = [ 'cookie_lifetime' => 86400, 'read_and_close'  => true,];
			session_start($options);
		}

		catch(Exception $e)
		{
			echo $e->getMessage('Ошибка подключение сессии');
		}
	}
	private static function StopSession()
	{
		session_destroy();
	}

	private static function initSessionValue($initValue)
	{
		switch (strtolower($initValue))
		{
			case 'token_auth':
				$_SESSION['TOKEN_AUTH'] = true;
				break;

		}
	}
	public static function SessionWorker($onSession, $initValue = '')
	{
		switch(strtolower($onSession))
		{
			case 'start':
				self::LoadSession();
				break;

			case 'stop':
				self::StopSession();
				break;

			case 'init':
				self::initSessionValue($initValue);
		}
	}
}
