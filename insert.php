<?php

$connect =  new PDO('mysql:host=localhost;dbname=graph', 'root', '');

if(isset($_POST["title"])){
	
	$title = $_POST["title"];
	$start = $_POST["start"];
	$end = $_POST["end"];
	
	$query = "INSERT INTO events (title, start_event, end_event) VALUES ('$title', '$start', '$end')";
	$result = $connect->exec($query);
	
	
	/*
	$query = "INSERT INTO `events`(`title`, `start_event`, `end_event`) VALUES (:title, :start_event, :end_event)";
	$statement = $connect->prepare($query);
	$statement->execute(
		array(
			':title'		=> $_POST['title'],
			':start_event'	=> $_POST['start'],
			':end_event'	=> $_POST['end']
		)
	);
	*/
}

?>