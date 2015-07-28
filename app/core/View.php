<?php
	
class View {
	
    protected $_view;
     
    public function __construct($view="") {
		 $this->SetView($view);
    }
 
    /** Display Template **/
    public function Render($view, $pageVars=array()) {
		$this->GetHeader();
		if (file_exists(VIEW_PATH.$view.EXT)) {
			require_once(VIEW_PATH.$view.EXT);
		} else {
			require_once($this->_view);
		}
		$this->GetFooter();
    }
    
    public function GetHeader() {
		if (file_exists(VIEW_PATH.$this->_view."/header.php")) {
			include(VIEW_PATH.$this->_view.'/header.php');
		} else {
			include(VIEW_PATH.'header.php');
		}	    
    }
    
    public function GetFooter() {
	    if (file_exists(VIEW_PATH.$this->_view."/footer.php")) {
			include(VIEW_PATH.$this->_view.'/footer.php');
		} else {
			include(VIEW_PATH.'footer.php');
		}
    }
 	
 	public function SetView($view) {
	    if ($view && file_exists(VIEW_PATH.$view.EXT)) {
			$this->_view = VIEW_PATH.$view.EXT;  
	    } else {
		    $this->_view = VIEW_PATH.'default'.EXT;
	    }	 	
 	}
 	
}

?>