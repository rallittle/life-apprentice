<?php 
//vote
$db = new database(new config);

$list = isset($_POST['List'])?$_POST['List']:"";
$result = "";
if(strtolower($list) == "global" || strtolower($list) == ""){
	$result = $db->query('select * from quote q where q.qAuth = 1 order by q.qVotes DESC');
}
else{
	$result = $db->query('select * from quote q where q.qLocale ="'.$list.'" and q.qAuth = 1 order by q.qVotes DESC');
}


$quotes = '';

while($record = $db->next_record()){
	$quotes .= '<div class="quote">'.$record['qText'].'</div>';
}

if(strlen($quotes) > 0){
	echo '<div id="quotebox">'.$quotes.'</div>';
}

?>
