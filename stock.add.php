<?php
$Stock_id = $_POST['Stock_id'];
$Description = trim($_POST['Description']);
$Category = trim($_POST['Category']);
$Quantity = $_POST['Quantity'];
$Price = $_POST['Price'];
$id = (int)$_POST['id'];

if ($Stock_id == ''  or $Description == '' or $Category == '' or $Quantity == '' or $Price == ''){
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

    $Stock_id = mysqli_real_escape_string($dbcnx, $Stock_id);
    $Description = mysqli_real_escape_string($dbcnx, $Description);
    $Category = mysqli_real_escape_string($dbcnx, $Category);
    $Quantity = mysqli_real_escape_string($dbcnx, $Quantity);
    $Price = mysqli_real_escape_string($dbcnx, $Price);
    if($id == 0) {
      $sql = "INSERT INTO Stock(Stock_id,Description,Category,Quantity,Price) VALUES('$Stock_id', '$Description', '$Category', '$Quantity', '$Price')";
    } else {
      $sql = "UPDATE Stock SET Stock_id='$Stock_id',Description='$Description',Category='$Category',Quantity='$Quantity', Price='$Price' WHERE Stock_id=$id";
    }
    $res = mysqli_query($dbcnx, $sql);
    if ($res == 0) {
      echo("<p>Error registering: " . mysqli_error($dbcnx). "</p>");
    } else {
      header("Location: stock.list.php"); /* Redirect browser */
    }
  }
  mysqli_close($dbcnx);
}	
?>