<?php 

class vote extends controller{
	function index(){
	
		$ControlName = "vote";
		$Layout = "default";
		$View = "index";
		$Title = "Welcome";
		
		$this->RenderView($ControlName, $Layout, $View, $Title);
	}
	
	function showlist(){
	
		$ControlName = "vote";
		$Layout = "default";
		$View = "index";
		$Title = "Welcome";
		
		$this->RenderView($ControlName, $Layout, $View, $Title);
	}
	

	
}

?>
