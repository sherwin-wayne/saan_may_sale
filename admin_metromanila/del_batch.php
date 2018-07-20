<?php include "../includes/verify.php";?>

<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "saanmaysale";
$conn = mysqli_connect($host, $username, $password, $dbname);

if(!$conn){
	die("Connection failed: ". mysqli_connect_error());
}


$selectbox = $_POST['selectbox'];
$batchdelete = implode(",",$selectbox);


$sql = "DELETE from metromanila 
        WHERE id IN($batchdelete)";


if(mysqli_query($conn, $sql)) {
	$affectedrows = mysqli_affected_rows($conn);    
	header("Location: view_record2.php?msg3=$affectedrows");
}else{
	echo "Error: ". $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>