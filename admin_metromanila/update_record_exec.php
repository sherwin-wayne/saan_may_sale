<?php
//ESTABLISH ALL VARIABLES FROM ALL THE VALUES ENTERED TO THE UPDATE FORM
	$id= $_POST['id'];
	$cityid = $_POST['city_id'];	
	$city = $_POST['city'];	
	$mall = $_POST['mall'];
	$developer = $_POST['developer'];	
	$startdate = $_POST['start_date'];	
	$enddate = $_POST['end_date'];

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
$sql = "UPDATE metromanila 
		SET city = '$city', 
		    mall = '$mall', 
		    developer = '$developer', 
		    start_date = '$startdate', 
		    end_date = '$enddate'
		WHERE id = '$id' ";
    
if(mysqli_query($conn, $sql)) {
	echo "Record Updated";
	header("Location: view_record2.php?msg1=1");
}else{
	echo "Error: ". $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);


?>	

