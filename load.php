<?php

$connect =  new PDO('mysql:host=localhost;dbname=graph', 'root', '');

$data = array(); // associative array 

$query = "SELECT * FROM events ORDER BY id";
$result = $connect->query($query);
foreach($result as $row){
	$data[] = array(
		'id'		=>	$row["id"],
		'title'		=>	$row["title"],
		'start'		=>	$row["start_event"],
		'end'		=>	$row["end_event"]
	);
}

echo json_encode($data);

?>