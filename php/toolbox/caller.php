<?php

class Caller
{
	private static function CallRelationships($all)
	{
		if($all === true)
		{
			require_once $_SERVER['DOCUMENT_ROOT'] . '/php/toolbox/debugger.php';
			require_once $_SERVER['DOCUMENT_ROOT'] . '/php/pattern/block_pattern.php';
			require_once $_SERVER['DOCUMENT_ROOT'] . '/php/database/work_with_database.php';
			require_once $_SERVER['DOCUMENT_ROOT'] . '/php/toolbox/sessioner.php';
		}
		// TODO: Написать разные виды зависимостей

	}

	public static function Call($startSession = 'start', $watchError = 1, $all = true)
	{
		self::callRelationships($all);
		Sessioner::SessionWorker($startSession);
		Debugger::WatchError($watchError);
	}
}