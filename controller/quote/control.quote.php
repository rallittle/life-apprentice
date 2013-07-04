<?php 

class quote extends controller{
	
	function index(){
	
		$ControlName = "quote";
		$Layout = "default";
		$View = "index";
		$Title = "Welcome";

		if(isset($_SESSION['UserID'])){
			$this->RenderView($ControlName, $Layout, $View, $Title);
		}
		else{
			//$this->RenderView($ControlName, $Layout, $View, $Title);
			//echo var_dump($_SESSION);
			//die();

			header("location: /la/signin");				
		}
		
	}
	
	function submit(){
		$quote = $_POST['quote'];
		$uID = isset($_SESSION['UserID'])? $_SESSION['UserID'] : 0;
		
		$db = new database(new config);
		
		//$db->queryScalar('','');
		
		if($db->query('INSERT INTO quote (qText,uID,qAuth) VALUES ("'.addslashes($quote).'",'.$uID.',1)')){
			//successful
			if(isset($_SESSION['IDProvider'])){
				switch ($_SESSION['IDProvider']){
					case "Facebook":
						//if user is signed in with facebook account....
						$pagename = "Life-Apprentice";
						$caption = "my new quote";
						$pictureURL = "";
						$link = "http://rallittle.nzfusion.com"; //"http://localhost:69/la/vote";
						$this->facebookfeedpost($quote, $pagename, $caption, $pictureURL, $link);
						break;
					case "Twitter":
						//if user is signed in with twitter account....
						$this->twitterstatuspost($quote);
						break;	
					case "Google":
					
						break;	
				
				}
				
				
			}
			
			header("location: /la/quote/success");
		}	
		else{
			header("location: /la/quote/failure");

		}	
		
	}
	
	function success(){
	
		$ControlName = "quote";
		$Layout = "default";
		$View = "success";
		$Title = "Quote Saved";
		
		$this->RenderView($ControlName, $Layout, $View, $Title);
	}
	
	function failure(){
	
		$ControlName = "quote";
		$Layout = "default";
		$View = "failure";
		$Title = "Quote did not save";
		
		$this->RenderView($ControlName, $Layout, $View, $Title);
	}

	

}

?>
