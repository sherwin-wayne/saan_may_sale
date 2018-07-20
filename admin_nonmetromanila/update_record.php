<?php include "../includes/verify.php";?>

<?php
if($_SESSION['role'] != "1"){
	header ("Location:view_record2.php");
}else{

}
?>


<?php

$id = $_GET['id'];

if(!isset($_GET['id'])){
  header ("Location:view_record2.php");
}  

$host = "localhost";
$username = "root";
$password = "";
$dbname = "saanmaysale";

$conn = mysqli_connect($host, $username, $password, $dbname);

if(!$conn){
	die("Connection failed: ". mysqli_connect_error());
}

$sql = "SELECT * from nonmetromanila WHERE id=$id";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

$id = $row["id"];	
$city = $row['city'];	
$mall = $row['mall'];
$developer = $row['developer'];	
$startdate = $row['start_date'];	
$enddate = $row['end_date'];	
$regionid = $row['region_id'];
?>	

<body>	

<?php
if(isset($_GET['msg'])){
	$errorMsg = $_GET['msg'];
        echo "<div class='alert alert-success alert-dismissable fade-in'>
        	  <a href='add_record.php'>
	          <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>Record Updated</div>";
}else{
	$msg=" ";
	}
?>



<div class="container">
	<div class="page-header">
        <h1>Update Mall Records [METRO MANILA]</h1>
    </div>    
</div>

<div class="container">
	<form class="form-horizontal" method="POST" action="update_record_exec.php">

	<input type="text" value="<?php echo $id ?>" hidden name="id">

	<div class="form-group">
	    <label class="control-label col-sm-2" for="region_id">REGION ID:</label>
	    <div class="col-sm-10">
	     <input type="text" class="form-control" name="city_id" value="<?php echo $regionid ?>" required>
	    </div>
	</div>


	<div class="form-group">
	    <label class="control-label col-sm-2" for="city">CITY:</label>
	    <div class="col-sm-10">
	     <input type="text" class="form-control" name="city" value="<?php echo $city ?>" required>
	    </div>
	</div>

	<div class="form-group">
	    <label class="control-label col-sm-2" for="mall">MALL/SHOPPING CENTER:</label>
	    <div class="col-sm-10">
	     <input type="text" class="form-control" name="mall" value="<?php echo $mall ?>" required>
	    </div>
	</div>	


	<div class="form-group">
	    <label class="control-label col-sm-2" for="developer">NAME OF MALL DEVELOPER:</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="developer" value="<?php echo $developer ?>" required>
	    </div>
	</div>
	
	<div class="form-group">
	    <label class="control-label col-sm-2" for="start_date">START DATE OF SALE:</label>
	    <div class="col-sm-10"> 
	      <input type="date" class="form-control" name="start_date" value="<?php echo $startdate ?>" required>
	    </div>
	</div>

	<div class="form-group">
	    <label class="control-label col-sm-2" for="end_date">END DATE OF SALE:</label>
	    <div class="col-sm-10"> 
	      <input type="date" class="form-control" name="end_date" value="<?php echo $enddate ?>" required>
	    </div>
	</div>

	 <div class="form-group"> 
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-default">Submit</button>
	   </div>
	 </div>
	 
	</form>

</div>

<script src="jquery-3.2.1.js"></script>
</body>
</html>
