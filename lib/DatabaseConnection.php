<?php

class DatabaseConnection {
	
	private static $_instance;
	private $_connection;
	
	private function __construct() {}
	
	private static function GetInstance() {
		if (self::$_instance == null) {
			$className = __CLASS__;
			self::$_instance = new $className;
		}
		return self::$_instance;
	}
	
	private static function InitConnection() {
		$db = self::GetInstance();
		$db->_connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		$db->_connection->set_charset('utf8');
		return $db;
	}
	
	public static function GetDbConnection() {
		try {
			$db = self::InitConnection();
			return $db->_connection;
		} catch (Exception $ex) {
			$errMsg = $ex->getMessage();
			Session::Set('error', $errMsg);
			echo "Unable to open database connection. ".$errMsg;
			return null;
		}
	}
	
	public function __clone() {
    	throw new Exception("Can't clone a singleton");
	}
	
}

?>