<?php

class ExampleController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function Index() {
		$this->Render('example/index');
	}

}

?>
