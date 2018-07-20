<?php

	$cityid = $_POST['city_id'];	
	$city = $_POST['city'];	
	$mall = $_POST['mall'];
	$developer = $_POST['developer'];	
	$startdate = $_POST['start_date'];	
	$enddate = $_POST['end_date'];	

require_once "../includes/dbconnect.php";

$sql2 = "SELECT * FROM metromanila WHERE mall = '$mall' ";

$result = mysqli_query($conn,$sql2);

if(mysqli_num_rows($result) > 0){
	header("Location: add_record.php?error=2");
}else{

		$sql = "INSERT INTO metromanila(city_id, city,mall,developer,start_date,end_date) 
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

<div class="container">
	<div class="page-header">
        <h1>Add Another Mall/Shopping Complex</h1>
    </div>    
</div>

<div class="container">
	<form class="form-horizontal" method="POST" action="add_record_exec.php">


	<div class="form-group">
	    <label class="control-label col-sm-2" for="city_id">CITY ID:</label>
	    <div class="col-sm-10">
	     <input type="text" class="form-control" name="city_id" placeholder="Enter The Assigned City ID:" required>
	    </div>
	</div>


	<div class="form-group">
	    <label class="control-label col-sm-2" for="city">CITY:</label>
	    <div class="col-sm-10">
	     <input type="text" class="form-control" name="city" placeholder="Enter Name of City" required>
	    </div>
	</div>

	<div class="form-group">
	    <label class="control-label col-sm-2" for="mall">MALL/SHOPPING CENTER:</label>
	    <div class="col-sm-10">
	     <input type="text" class="form-control" name="mall" placeholder="Enter Name of Mall" required>
	    </div>
	</div>	


	<div class="form-group">
	    <label class="control-label col-sm-2" for="developer">NAME OF MALL DEVELOPER:</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="developer" placeholder="Enter Name of Developer" >
	    </div>
	</div>
	
	<div class="form-group">
	    <label class="control-label col-sm-2" for="start_date">START DATE OF SALE:</label>
	    <div class="col-sm-10"> 
	      <input type="date" class="form-control" name="start_date" placeholder="Enter start date of sale" required>
	    </div>
	</div>

	<div class="form-group">
	    <label class="control-label col-sm-2" for="end_date">END DATE OF SALE:</label>
	    <div class="col-sm-10"> 
	      <input type="date" class="form-control" name="end_date" placeholder="Enter end date of sale" required>
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
