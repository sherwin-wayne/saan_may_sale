<?php session_start(); ?>

<?php
if(!isset($_SESSION['id'])){
  header ("Location:login.php?msg=2");
}    
   
if($_SESSION['role'] == "1"){
      $status = "Administrator";
    }else {
      $status = "User";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Records</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--THIS WAS THE MINTY THEME BOOTSWATCH IMPORTED IN PLACE OF THE USUAL BOOTSTRAP-->
    <link rel="stylesheet" href="https://bootswatch.com/4/cerulean/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<?php
if(isset($_GET['msg1'])){
  $errorMsg = $_GET['msg1'];
  $update = "<div class='alert alert-success alert-dismissable' role='alert'>
      <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>Success! Record Has Been Updated</div>";
}else{
  $update =" ";
  }
?>

<?php
if(isset($_GET['msg2'])){
  $errorMsg = $_GET['msg2'];
  $delete = "<div class='alert alert-success alert-dismissable' role='alert'>
    <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>Success! Record Has Been Deleted</div>";
}else{
  $delete =" ";
  }
?>

<!--THIS IS THE NAVIGATION AREA WHERE PHP ITEMS ARE TO BE INSERTED-->
<nav class="navbar navbar-default">
  <div class="container-fluid">

    <div class="navbar-header">
      <a class="navbar-brand" href="view_record2.php"><h1>SAAN MAY SALE? ADMIN PANEL</a></h1>
    </div>

<!--THIS IS WHERE THE PHP ITEM APPEARS-->
<?php echo  "<a class='navbar-brand'>You are logged in as $_SESSION[name]</span>";  ?>


    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">SETTINGS<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">

            <li><a href="#"><?php echo $status; ?></a></li>

            <li><a href="update_record.php">UPDATE RECORD</a></li>
            <li><a href="add_record.php">ADD NEW USER</a></li>
            <li><a href="list_users.php">LIST OF REGISTERED USERS</a></li>
            <li class="divider"></li>
            <li><a href="logout.php">LOGOUT</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

