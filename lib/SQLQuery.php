<?php
	
class SQLQuery() {
	
	protected $_dbConnection;
	
	function __construct() {
		$this->_dbConnection = DatabaseConnection::getInstance();
	}
	
	function selectAll() {
		$query = 'select * from '.$this->_table;
	}
	
	function select() {
		
	}
	
}

?>