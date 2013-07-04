<?php 

class approve extends controller{
	function index(){	
		$ControlName = "approve";
		$Layout = "default";
		$View = "login";
		$Title = "Welcome";
		
		$this->RenderView($ControlName, $Layout, $View, $Title);
	}
	
	function login(){
		$user = isset($_POST['user'])?$_POST['user']:'';
		$pass = isset($_POST['pass'])?$_POST['pass']:'';
		
		$db = new database(new config);
		$result = $db->queryScalar('select a.aID from admin_user a where a.aUserName ="'.addslashes($user).'" and a.aPassword="'.addslashes($pass).'"', 0);
		//echo 'select a.aID from admin_user a where a.aUserName ="'.addslashes($user).'" and a.aPassword="'.addslashes($pass).'"';
		//die();
		if($result != 0){
			$config = new config;
			$_SESSION['AdminID'] = $result;
			header('location: '.$config->BaseDir.'/approve/showlist');
		}
		else{
			$ControlName = "approve";
			$Layout = "default";
			$View = "login";
			$Title = "Welcome";
			$this->RenderView($ControlName, $Layout, $View, $Title);
		}
		
	}
	
	function showlist(){
		$ControlName = "approve";
		$Layout = "default";
		$View = "index";
		$Title = "Welcome";
		$this->RenderView($ControlName, $Layout, $View, $Title);
	}
	
	function deletequote(){
		$AdminID = isset($_SESSION['AdminID'])?$_SESSION['AdminID']:0;
		$qID = isset($_POST['qID'])?$_POST['qID']:0;
		if($AdminID != 0){
			if($qID != 0){
				$db = new database(new config);
				$result = $db->query('delete from quote where qID ='.$qID);	
			}
		}
		
	}
	
	function approvequote(){
		$AdminID = isset($_SESSION['AdminID'])?$_SESSION['AdminID']:0;
		$qID = isset($_POST['qID'])?$_POST['qID']:0;
		if($AdminID != 0){
			if($qID != 0){
				$db = new database(new config);
				$result = $db->query('update quote set qAuth=1 where qID ='.$qID);	
			}
		}

	}

	

	
}

?>
