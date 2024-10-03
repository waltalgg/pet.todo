<?php

class Caller
{
	private static function CallRelationships()
	{
		require_once($_SERVER['DOCUMENT_ROOT'] . '/php/toolbox/debugger.php');
		require_once($_SERVER['DOCUMENT_ROOT'] . '/php/pattern/block_pattern.php');
		require_once($_SERVER['DOCUMENT_ROOT'] . '/php/database/work_with_database.php');
		require_once($_SERVER['DOCUMENT_ROOT'] . '/php/toolbox/sessioner.php');
	}

	public static function Call($startSession = 'start', $watchError = 1)
	{
		self::callRelationships();
		Sessioner::SessionWorker($startSession);
		Debugger::WatchError($watchError);
	}
}