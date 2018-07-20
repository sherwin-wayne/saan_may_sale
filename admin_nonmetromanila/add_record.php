<?php include "../includes/verify.php";?>

<?php
if($_SESSION['role'] != "1"){
	header ("Location:view_record2.php");
}else{

}
?>

<body>	

<?php
if(isset($_GET['msg'])){
	$errorMsg = $_GET['msg'];
        echo "<div class='alert alert-success alert-dismissable fade-in>
        	  <a href='add_record.php'>
	          <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>Record Added</div>";
}else{
	$msg=" ";
	}

if(isset($_GET['error'])){
	$errorAdd = $_GET['error'];
        echo "<div class='alert alert-danger alert-dismissable fade-in>
        	  <a href='add_record.php'>
	          <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>Email Already Exists</div>";
}else{
	$msg=" ";
	}
?>


<div class="container">
	<div class="page-header">
        <h1>Add Another Mall/Shopping Complex</h1>
    </div>    
</div>

<div class="container">
	<form class="form-horizontal" method="POST" action="add_record_exec.php">


	<div class="form-group">
	    <label class="control-label col-sm-2" for="region_id">REGION ID:</label>
	    <div class="col-sm-10">
	     <input type="text" class="form-control" name="region_id" placeholder="Enter The Assigned REGION ID:" required>
	    </div>
	</div>


	<div class="form-group">
	    <label class="control-label col-sm-2" for="city">CITY/MUNICIPALITY:</label>
	    <div class="col-sm-10">
	     <input type="text" class="form-control" name="city" placeholder="Enter Name of City or Municipality" required>
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