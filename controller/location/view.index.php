<?php 
//location
$db = new database(new config);

$result = $db->query('select * from quote');

while($record = $db->next_record()){
	echo $record['qText'];
}

?>
