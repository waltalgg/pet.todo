<?php

class Debugger
{
    public static function WatchError($watch = 0)
    {
        ini_set('display_errors', $watch);
        ini_set('display_startup_errors', $watch);
        $watch !== 0 ? error_reporting(-1): error_reporting($watch);
    }
}