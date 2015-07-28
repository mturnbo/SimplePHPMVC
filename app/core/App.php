<?php

class App {

	protected $_controller = 'home';
	protected $_method = 'index';
	protected $_params = array();
	protected $_debugOutput = "";

	public function __construct() {
		$this->Route();
	}

	private function Route() {
		$this->_debugOutput .= "App Instantiated <br />\n";
		$url = $this->ParseUrl();
		$this->_debugOutput .= "<pre>".print_r($url, true)."</pre>\n";

		// define model
		$model = ucwords(strtolower($url[0]));

		// define controller
		$controller = $model.'Controller';
		$controllerPath = CONTROLLER_PATH.$controller.EXT;
		$this->_debugOutput .= $controller."<br />\n";
		if (file_exists($controllerPath)) {
			$this->_controller = $controller;
			unset($url[0]);

			require_once($controllerPath);
			$this->_controller = new $this->_controller;

			// check method
			if (isset($url[1])) {
				if (method_exists($this->_controller, $url[1])) {
					$this->_method = $url[1];
					unset($url[1]);
				}
			}

			// set parameters
			$this->_params = $url ? array_values($url) : array();
			call_user_func_array(array($this->_controller, $this->_method), $this->_params);
		}

	}

	public function ParseUrl() {
		if (isset($_GET['url'])) {
			return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
		} else {
			return $url = array('home');
		}
	}

}

?>
