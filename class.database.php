<?php

class mysql{
	
	private static $instance = null;
	private static  $osDatabase;
	
	private function __construct() {}
	private function __clone() {}
	
	public static function getInstance(){
		if(!self::$instance instanceof self){
			self::$instance = new self;
			self::openConnection();
		}
		return self::$instance;
	}

	public static function	getStaticDatabase(){
		return self::$osDatabase;
	}
	
	public static function	openConnection(){
		self::$osDatabase = new mysqli("localhost", "root", "welkompamela", "demo");
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
	}
}