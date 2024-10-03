<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/php/config/config_links.php');
class HelpmateBlockPattern
{
	private static function ReturnLink($namePage)
	{
		$config = new ConfigLinks($namePage);
		return $config->ReturnConfigLink();
	}

	private static function isAuthenticated()
	{
		return isset($_SESSION['AUTH_TOKEN']) && $_SESSION['AUTH_TOKEN'] === true;
	}

	public static function ReturnHelpmate($request, $value = '')
	{

		switch(strtolower($request))
		{
			case 'returnlink':
				if(isset($value)) return self::ReturnLink($value);
				break;

			case 'isauthtoken':
				return self::isAuthenticated();
		}
	}
}