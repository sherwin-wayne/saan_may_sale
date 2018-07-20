<?php include "../includes/verify.php";?>


<?php

if(!isset($_GET['id'])){
  header ("Location:view_record2.php");
}  
$id = $_GET['id'];
$host = "localhost";
$username = "root";
$password = "";
$dbname = "saanmaysale";

$conn = mysqli_connect($host, $username, $password, $dbname);

if(!$conn){
	die("Connection failed: ". mysqli_connect_error());
}

$sql = "SELECT * from metromanila WHERE id=$id";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

$id = $row["id"];	
$city = $row['city'];	
$mall = $row['mall'];
$developer = $row['developer'];	
$startdate = $row['start_date'];	
$enddate = $row['end_date'];	
$cityid = $row['city_id'];

?>	

<body>	

<?php
if(isset($_GET['msg'])){
	$errorMsg = $_GET['msg'];
        echo "<div class='alert alert-success alert-dismissable fade-in'>
        	  <a href='add_record.php'>
	          <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>Record Added</div>";
}else{
	$msg=" ";
	}
?>



<div class="container">
	<div class="page-header">
        <h1>Individual Mall Record</h1>
    </div>    
</div>

<div class="container">
	<form class="form-horizontal" method="POST" action="update_record_exec.php">
	<input type="text" value="<?php echo $id ?>" hidden name="id">

	<div class="form-group">
	    <label class="control-label col-sm-2" for="city">CITY</label>
	    <div class="col-sm-10"><?php echo $city ?></div>
	</div>

	<div class="form-group">
	    <label class="control-label col-sm-2" for="mall">MALL/SHOPPING COMPLEX</label>
	    <div class="col-sm-10"><?php echo $mall ?></div>
	</div>

	  <div class="form-group">
	    <label class="control-label col-sm-2" for="developer">DEVELOPER</label>
	    <div class="col-sm-10"><?php echo $developer ?></div>
	</div>
	
	<div class="form-group">
	    <label class="control-label col-sm-2" for="start_date">START DATE OF SALE</label>
	    <div class="col-sm-10"><?php echo $startdate ?></div>
	</div>

	  <div class="form-group">
	    <label class="control-label col-sm-2" for="end_date">END DATE OF SALE</label>
	    <div class="col-sm-10"><?php echo $enddate ?></div>
	</div>

	 
	</form>

</div>

<script src="jquery-3.2.1.js"></script>
</body>
</html>
