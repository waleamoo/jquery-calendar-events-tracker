<?php

$connect =  new PDO('mysql:host=localhost;dbname=graph', 'root', '');

if(isset($_POST["id"])){
	
	$id = $_POST["id"];
	$title = $_POST["title"];
	$start = $_POST["start"];
	$end = $_POST["end"];
	
	$query = "UPDATE events SET title = '$title', start_event = '$start', end_event = '$end' WHERE id = '$id'";
	$result = $connect->exec($query);
}

?>