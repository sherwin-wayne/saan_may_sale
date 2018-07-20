<?php include "../includes/verify.php";?>

<?php
if($_SESSION['role'] != "1"){
	header ("Location:view_record2.php");
}else{

}
?>

<body>
<div class = "container">

<?php


$host = "localhost";
$username = "root";
$password = "";
$dbname = "dbnightclass";

$conn = mysqli_connect($host, $username, $password, $dbname);
if(!$conn){
	die("Connection failed: ". mysqli_connect_error());
}

$sql = "SELECT * from users_table 
        WHERE role = 2 ";

$result = mysqli_query($conn, $sql);

$counter = 1;

echo "<div class='page-header'><h2>List of Registered Users</h2>";
echo "<table class='table table-striped'>";
echo "<thead>";
echo "<th>No</th>";
echo "<th>Name</th>";
echo "<th>Email</th>";
echo "<th>Role</th>";
echo "<th>Action</th>";
echo "</thead>";

if (mysqli_num_rows($result) > 0){
	//loops through it ONE BY ONE and display each record ONE AFTER ANOTHER;+
	while($row = mysqli_fetch_assoc($result))
	   {
		echo "<tr>
				<td>$counter</td>
				<td>$row[name]</td>
				<td>$row[email]</td>
				<td>$row[role]</td>
				<td> <a href='del_record.php?id=$row[id]'>Delete</a>    
				     <a href='update_record.php?id=$row[id]'>Edit</a> </td>
		</tr>";
		$counter ++; 
       }
}

?>

</div>
<script src="jquery-3.2.1.js"></script>

</body>
</html>
