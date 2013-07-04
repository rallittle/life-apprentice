<?php 

class search extends controller{
var $data = array();
	function index(){
	
		$ControlName = "search";
		$Layout = "default";
		$View = "index";
		$Title = "Welcome";
		
		$this->data['search'] = isset($_POST['query'])? addslashes($_POST['query']): '';
		$this->RenderView($ControlName, $Layout, $View, $Title);
	}
		

	
}

?>
