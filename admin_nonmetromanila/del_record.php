<?php
//This file will get the ID from the View Record form and use that ID to issue a delete statement.

//Redirect to View Records

if($_SESSION['role'] != "1"){
	header ("Location:view_record2.php");
}else{

}
	$id= $_GET['id'];

//DB CONFIGURATION
	$host = "localhost";
	$username = "root";
	$password = "";
	$dbname = "saanmaysale";
//CREATE CONNECTION
	$conn = mysqli_connect($host, $username, $password, $dbname);
//CHECK CONNECTION
	if(!$conn){
		die("Connection failed: ". mysqli_connect_error());
	}
		
$sql = "DELETE FROM nonmetromanila 
        WHERE id = '$id'";


    
if(mysqli_query($conn, $sql)) {
	echo "Record Has Been Deleted";
	header("Location: view_record2.php?msg2=2");
}else{
	echo "Error: ". $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);


?>	





 
