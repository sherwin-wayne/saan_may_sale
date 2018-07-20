<?php
//DB CONFIGURATION
	$host = "localhost";
	$username = "root";
	$password = "";
	$dbname = "saanmaysale";

//DB CONFIGURATON FOR THE LIVE SERVER
	// $host = "localhost";
	// $username = "id5647150_sherwin";
	// $password = "Au5573lvsme";
	// $dbname = "id5647150_saanmaysale";


//CREATE CONNECTION
	$conn = mysqli_connect($host, $username, $password, $dbname);
//CHECK CONNECTION
	if(!$conn){
		die("Connection failed: ". mysqli_connect_error());
	}	

?>