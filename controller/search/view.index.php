<?php 
//vote
$db = new database(new config);

//echo var_dump($this->data);

$result = "";
if(strlen(trim($this->data['search'])) == 0 ){
	$result = $db->query('select * from quote q where q.qAuth = 1 order by q.qVotes DESC');
}
else{
	$result = $db->query('select * from quote q where q.qText like "%'.$this->data['search'].'%" and q.qAuth = 1 order by q.qVotes DESC');
}

echo 'You searched for "'.stripslashes($this->data['search']).'"';
$quotes = '';

while($record = $db->next_record()){
	$quotes .= '<div class="quote">'.$record['qText'].'<div class="vote"><a class="vote-up">up</a><a class="vote-down">down</a></div></div>';
}

if(strlen($quotes) > 0){
	echo '<div id="quotebox">'.$quotes.'</div>';
}

?>
