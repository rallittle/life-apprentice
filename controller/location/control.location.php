<?php 

class location extends controller{
	function index(){
	
		$ControlName = "location";
		$Layout = "default";
		$View = "index";
		$Title = "Welcome";
		
		$this->RenderView($ControlName, $Layout, $View, $Title);
	}
	
}

?>
