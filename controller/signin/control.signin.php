<?php 

class signin extends controller{
	function index(){
	
		$ControlName = "signin";
		$Layout = "default";
		$View = "index";
		$Title = "Welcome";
		//$auth = $this->authorised();
		
		if(isset($_SESSION['UserID'])){
			$View = "fail"; //already signed in
			$Title = "You are already signed in as ".$_SESSION['DisplayName'];
			$this->RenderView($ControlName, $Layout, $View, $Title);
		}
		else{
			$View = "index"; //need to sign in
			$Title = "Select an online ID to sign in with";
			$this->RenderView($ControlName, $Layout, $View, $Title);			
		}
		
	}
	
	function facebook(){
		if($this->authorised('Facebook')){
			header("location: /la/signin/success");
		}
		else{
			header("location: /la/signin/failure");
		}
	}
	
	function google(){
		if($this->authorised('Google')){
			header("location: /la/signin/success");
		}
		else{
			header("location: /la/signin/failure");
		}
	
	}

	function openid(){
		if($this->authorised('OpenID')){
			header("location: /la/signin/success");
		}
		else{
			header("location: /la/signin/failure");
		}

	}
	
	function failure(){
	
		$ControlName = "signin";
		$Layout = "default";
		$View = "failure";
		$Title = "signin failed";
		
		$this->RenderView($ControlName, $Layout, $View, $Title);			
	}

	function success(){
	
		$ControlName = "signin";
		$Layout = "default";
		$View = "success";
		$Title = "signin succeeded";
		
		$this->RenderView($ControlName, $Layout, $View, $Title);			
	}



	
	

	

}

?>
