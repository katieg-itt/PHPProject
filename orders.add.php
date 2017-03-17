<?php
$Cust_id = $_POST['Cust_id'];
$Date = $_POST['Date'];
$id = (int)$_POST['id'];

if ( $Cust_id == '' or $Date == ''){
  echo("You did not complete the insert form correctly <br>");
  exit();
} else {
  $dbcnx = mysqli_connect("localhost", "root", "", "jewelry_store");
  // Check connection
  if (mysqli_connect_errno($dbcnx )) {
    echo "Failed to connect to MySQL: " .mysqli_connect_error();
    exit();
  }
  if ($_POST['submitdetails'] == "SUBMIT") {

    $Cust_id = mysqli_real_escape_string($dbcnx, $Cust_id);
    $Date = mysqli_real_escape_string($dbcnx, $Date);
    $Price = 0;
    if($id == 0) {
      $sql = "INSERT INTO orders (Cust_id, Date, Price) VALUES( '$Cust_id', '$Date', '$Price')";
    } else {
      $sql = "UPDATE orders SET Cust_id='$Cust_id', Date='$Date' WHERE Order_id=$id";
    }
    $res = mysqli_query($dbcnx, $sql);
    if ($res == 0) {
      echo("<p>Error registering: " . mysqli_error($dbcnx). "</p>");
    } else {
      header("Location: orders.list.php"); /* Redirect browser */
    }
  }
  mysqli_close($dbcnx);
}	
?>