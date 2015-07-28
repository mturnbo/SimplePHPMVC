<?php

class Controller {
	
	protected $_model;
    protected $_controller;
    protected $_view;
    protected $_debugOutput = "";
    protected $_pageVars = array();
	
	public function __construct($model="") {
        if ($model == "") {
	        $this->_model = str_replace("Controller", "", get_class($this));
		} else {
	        $this->_model = $model;
		}
        $view = strtolower($this->_model);
		$this->_view = new View($view);
		$this->_pageVars = array('page' => $view);		
    }
 
	protected function Model() {
		require_once(MODEL_PATH.$this->_model.EXT);
		return new $this->_model();
	}
	
	protected function Render($view, $data=null) {
		$this->_view->Render($view, $data);
	}
 
	protected function GetPageVars() {
		return $this->_pageVars;
	}
 
	protected function SetPageVar($key, $val) {
		$this->_pageVars[$key] = $val;
	} 
 
	protected function ResetPageVars($page=null) {
		if ($page) {
			$this->_pageVars = array('page' => $page);
		} else {
			$this->_pageVars = array();
		}
	}
 
    function __destruct() {

    }	
		
}

?>