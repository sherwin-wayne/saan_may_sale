
<?php

	$regionid = $_POST['region_id'];	
	$city = $_POST['city'];	
	$mall = $_POST['mall'];
	$developer = $_POST['developer'];	
	$startdate = $_POST['start_date'];	
	$enddate = $_POST['end_date'];	

require_once "../includes/dbconnect.php";

$sql2 = "SELECT * FROM nonmetromanila WHERE mall = '$mall' ";

$result = mysqli_query($conn,$sql2);

if(mysqli_num_rows($result) > 0){
	header("Location: add_record.php?error=2");
}else{

		$sql = "INSERT INTO nonmetromanila(region_id, city,mall,developer,start_date,end_date) 
		        values ('$cityid', '$city', '$mall', '$developer', '$startdate', '$enddate')";
		      
		if(mysqli_query($conn, $sql)) {
			// echo " New record created successfully";
			header("Location: add_record.php?msg=1");
		}else{
			echo "Error: ". $sql . "<br>" . mysqli_error($conn);
		}

}

mysqli_close($conn);
?>

