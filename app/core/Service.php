<?php

class Service {
	
	protected $_db;
	
    public function __construct() {
        $this->_db = DatabaseConnection::GetDbConnection();
    }
    	
}

?>