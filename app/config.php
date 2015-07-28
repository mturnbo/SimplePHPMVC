<?php


// ERROR REPORTING
 	error_reporting(E_ALL);
 	ini_set("display_errors", 1); 
 	ini_set("session.gc_maxlifetime", 60*60*4);


// CACHE
  	header('Cache-Control: no-cache');
  	header('Pragma: no-cache');	

	
// AUTOLOAD
	spl_autoload_register(function ($className) {
	    if (file_exists(LIB_PATH.$className.EXT)) {
	        require_once(LIB_PATH.$className.EXT);
	    } else if (file_exists(CONTROLLER_PATH.$className.EXT)) {
	        require_once(CONTROLLER_PATH.$className.EXT);
	    } else if (file_exists(MODEL_PATH.$className.EXT)) {
	        require_once(MODEL_PATH.$className.EXT);
	    } else if (file_exists(SERVICE_PATH.$className.EXT)) {
	        require_once(SERVICE_PATH.$className.EXT);	        
	    } else {
	        /* Error Generation Code Here */
	    }
	});

	
// DATABASE
	require_once(CONFIG_PATH.'db.php');
	
?>
