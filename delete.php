<?php

if(isset($_POST["id"])){
	$connect =  new PDO('mysql:host=localhost;dbname=graph', 'root', '');
	
	$id = $_POST["id"];
	
	$query = "DELETE FROM events WHERE id = '$id'";
	$result = $connect->exec($query);
	
}


?>