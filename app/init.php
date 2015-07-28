<?php

define('APP_PATH',			ROOT.DS.'app'.DS);
define('CONFIG_PATH',		ROOT.DS.'config'.DS);
define('LIB_PATH',			ROOT.DS.'lib'.DS);
define('MODEL_PATH',		APP_PATH.'models'.DS);
define('CONTROLLER_PATH',	APP_PATH.'controllers'.DS);
define('SERVICE_PATH',		APP_PATH.'services'.DS);
define('VIEW_PATH',			APP_PATH.'views'.DS);
define('TEMPLATE_PATH',		APP_PATH.'templates'.DS);
define('TMP_PATH',			ROOT.DS.'tmp'.DS);
define('EXT',				'.php');
define('APP_ENV',			'DEV');

require_once('config.php');
require_once('core/App.php');
require_once('core/Controller.php');
require_once('core/Model.php');
require_once('core/View.php');
require_once('core/Service.php');

?>
