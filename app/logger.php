<?php
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

if( Config::get('app.debug') === true ){		

	DB::listen(function($sql, $bindings, $time){

    	$logFile = storage_path('logs/query.log');
		 
		$monolog = new Logger('log');
		 
		$monolog->pushHandler(new StreamHandler($logFile), Logger::INFO);

		$monolog->info($sql, compact('bindings', 'time'));

	});

}