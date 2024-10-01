<?php

require_once($_SERVER['DOCUMENT_ROOT'].'\php\config\config_links.php');
class HelpmateBlockPattern
{
	private static function ReturnLink($namePage)
	{
		$config = new ConfigLinks($namePage);
		return $config->ReturnConfigLink();
	}

	public static function ReturnHelpmate($request, $value)
	{

		switch(strtolower($request))
		{
			case 'returnlink':
				return self::ReturnLink($value);

			case '':
				break;

		}
	}
}