<?php session_start(); ?>

<?php
if(isset($_GET['msg'])){
	    $message = $_GET['msg'];

	    if($message == "1"){
		echo "<h2>You've been logged out</h2>";
	    }
		if($message == "2"){
		echo "<h2>Access Denied</h2>";
		}
		if($message == "3"){
		echo "<h2>Update Successful, Please Login Again With Your New User and Password</h2>";
		}
		else{
			$message = "";
		}
	}	
?>

<?php	


if (isset($_POST['submit'])){
	$email = $_POST['email'];	
	$pw = $_POST['pw'];	

require_once "../includes/dbconnect.php";	

$sql = "SELECT * FROM users_table WHERE email = '$email' AND password = '$pw'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result))
	{
		$_SESSION['id'] = $row['id'];
		$_SESSION['name'] = $row['name'];	
		$_SESSION['email'] = $row['email'];
		$_SESSION['password'] = $row['password'];
		$_SESSION['role'] = $row['role'];			
	}
	header("Location:view_record2.php");
}
else{
echo "<div class='container'>
	  <div class='page-header'>
      <h3>Invalid username and password, Please try again</h3>
      </div>
      </div>";
}
}

?>

	
<!DOCTYPE html>
<html >
<head>
  <title>Login Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="login.css">  
</head>

<body>


<div class="container">
	<div class="background">
	    <div class="row">
	        <div class="form_bg2">
	        <!--IN THIS EXERCISE I DID NOT MAKE USE OF LOGIN_EXEC.PHP NOR LOGIN_EXEC2.PHP-->
				<form method = "POST" action="login.php">
				    <h3 class = "align-center">Please Login</h3><br>
				    <div class="align-center">
					    <input type="email" name="email" class="form-control" placeholder="Email Address"><br><br>
					</div> 

					<div class="align-center">
					    <input type="password" name="pw" class="form-control" placeholder="Password"><br><br>
					</div> 
					<div class="align-center">
					    <button type="submit" name="submit" class="btn btn-default">SUBMIT</button>
					</div>    
					<h3 class = "align-center"></h3>
				</form>
	        </div>
	    </div>
	</div>    
</div>

</body>
</html>
