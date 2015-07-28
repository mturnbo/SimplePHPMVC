<?php

class Model  {
	
	protected $_model;
	protected $_table;
	
	public function __construct() {
		$this->_model = get_class($this);
		$this->_table = strtolower($this->_model);
	}
	
	public function SelectAll() {
		$query = 'select * from `'.$this->_table.'`';
        return $this->query($query);			
	}
	
	public function __destruct() {
		
	}
	
	
}

?>