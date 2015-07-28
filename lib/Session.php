<?php

class Session {
	
	public static function Init() {
		if (session_id() == '') {
			session_start();
		}
 	}
 	
 	public static function Set($key, $val) {
	 	if ($key == 'status' || $key == 'error') {
		 	$_SESSION[$key][] = $val;
	 	} else {
		 	$_SESSION[$key] = $val;
		 }
 	}
 	
 	public static function Get($key) {
	 	if (isset($_SESSION[$key])) {
		 	if ($_SESSION[$key] == "") {
			 	return null;
		 	} else {
			 	return $_SESSION[$key];
			}
	 	} else {
		 	return null;
	 	}
 	}
 	
 	public static function ShowVar($key, $class) {
	 	if (isset($_SESSION[$key]) and $_SESSION[$key] != '') { 
			if ($key == 'status' || $key == 'error'){ 	
			 	echo "<div id=\"".$class."\">\n";
			 	foreach ($_SESSION[$key] as $msg) {
				 	echo $msg."<br />\n";
			 	}
			 	echo "</div>\n";			
			} else {
			 	echo "<div id=\"".$class."\">".$_SESSION[$key]."</div>\n";
			}
		}
 	}
 	
 	public static function Clear() {
	 	unset($_SESSION['status']);
	 	unset($_SESSION['error']);
 	}
 	
 	public static function Destroy() {
	 	session_destroy();
 	}
	
}	
	
?>