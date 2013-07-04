<?php 
//vote
$db = new database(new config);

$list = isset($_POST['List'])?$_POST['List']:"";
$result = "";
if(strtolower($list) == "global" || strtolower($list) == ""){
	$result = $db->query('select * from quote q where q.qAuth = 0');
}
else{
	$result = $db->query('select * from quote q where q.qLocale ="'.$list.'" and q.qAuth = 0');
}


$quotes = '';

while($record = $db->next_record()){
	$quotes .= '<div class="quote">'.$record['qText'].'<div class="controls"><a class="btnApprove btn" rel="'.$record['qID'].'">Approve</a><a class="btn btnDel" rel="'.$record['qID'].'">Delete</a></div></div>';
}

if(strlen($quotes) > 0){
	echo '<div id="quotebox">'.$quotes.'</div>';
}

?>

<script type="text/javascript" language="javascript">
	
	$(function(){
		$('.btnApprove').click(function(){
			var quoteID = $(this).attr('rel');
			$.post("/la/approve/approvequote", { qID: quoteID}, function(data){
				//hide working gif. and remove the element that you approved
				$('a[rel="' + quoteID + '"]').parent().parent().hide();
			});
		});
		
		
		
		$('.btnDel').click(function(){
			var quoteID = $(this).attr('rel');
			$.post("/la/approve/deletequote", { qID: quoteID}, function(data){
				//hide working gif. and remove the element that you deleted
				$('a[rel="' + quoteID + '"]').parent().parent().hide();
			});
		});
	
	
	});

</script>


