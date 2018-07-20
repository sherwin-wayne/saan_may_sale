<?php include "../includes/verify.php"; ?>


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

<?php
if(isset($_GET['msg3'])){
  $affectedrows = $_GET['msg3'];
  echo "<div class='alert alert-success alert-dismissable' role='alert'>
    <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>$affectedrows Record Deleted! </div>";
}else{
  $delete =" ";
  }
?>




<script = "text/javascript">
  function delMe(){
     var x = confirm ("Are You Sure?");
     if (x){
       return true;
     }else{
       return false;
     } 
}
</script>

<div class = "container">

<?php 
$host = "localhost";
$username = "root";
$password = "";
$dbname = "saanmaysale";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

 $sql = "SELECT * from metromanila";
 $result = mysqli_query($conn, $sql);
 $counter = 1;

if($_SESSION['role'] == "1"){
    echo "<div class='page-header'><h2>View Records</h2>";
    echo $update;
    echo $delete;
    echo "<form method='POST' action='del_batch.php'>";
    echo "<table class='table table-striped'>";
    echo "<thead>";
    echo "<th>Select</th>";
    echo "<th>No</th>";
    echo "<th>CITY</th>";
    echo "<th>MALL</th>";
    echo "<th>START DATE OF SALE</th>";
    echo "<th>END DATE OF SALE</th>";    
    echo "<th>Action</th>";
    echo "</thead>";
}else if ($_SESSION['role'] == "2"){
    echo "<div class='page-header'><h2>View Records</h2>";
    echo "<form method='POST' action='del_batch.php'>";
    echo "<table class='table table-striped'>";
    echo "<thead>";
    echo "<th>No</th>";
    echo "<th>CITY</th>";
    echo "<th>MALL</th>";
    echo "<th>START DATE OF SALE</th>";
    echo "<th>END DATE OF SALE</th>";    
    echo "<th>Action</th>";
    echo "</thead>";
}



if (mysqli_num_rows($result) > 0){
  //loops through it ONE BY ONE and display each record ONE AFTER ANOTHER;+
  while($row = mysqli_fetch_assoc($result))
     {
    echo "<tr>
    <td><input type='checkbox' name='selectbox[]' value='$row[id]'></td>
    <td>". $counter. ")".
    
    "</td><td>". $row["city"].
    "</td><td>". $row["mall"].   
    "</td><td>". $row["start_date"].
    "</td><td>". $row["end_date"].    
    "</td><td>";

      if($_SESSION['role'] == "1"){
      echo 
         "<a href='view_mall.php?id=$row[id]'type='button' class='btn btn-info'>View</button></a>
          <a href='update_record.php?id=$row[id]' type='button' class='btn btn-info'>Edit</button></a>
          <a href='del_record.php?id=$row[id]' type='button' class='btn btn-info' onclick = 'return delMe()'>Del</button></a></td></tr>";
           $counter ++; 
      }else{
        echo "<a href='view_mall.php?id=$row[id]' type='button' class='btn btn-info'>View</button></a></td></tr>";

      } $counter ++;

    } echo "</table>";
      echo "<button type='submit' onclick = 'return delMe()'>DELETE</button>";
      echo "</form>";

}
else{
  echo "0 result";
}


?>

</div>

<script src="jquery-3.2.1.js"></script>
</body>
</html>

<!-- https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_table_striped&stacked=h -->