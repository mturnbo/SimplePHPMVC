<?php

define('DS', 	DIRECTORY_SEPARATOR);
define('ROOT', 	dirname(dirname(__FILE__)));

require_once(ROOT.DS.'app/init.php');

Session::Init();

$app = new App();

?>
