<?php
$Name = trim($_POST['Name']);
$Address = trim($_POST['Address']);
$Phone_No = trim($_POST['Phone_No']);
$Email = $_POST['Email'];
$id = (int)$_POST['id'];

if ($Name == ''  or $Address == '' or $Phone_No == '' or $Email == ''){
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

    $Name = mysqli_real_escape_string($dbcnx, $Name);
    $Email = mysqli_real_escape_string($dbcnx, $Email);
    if($id == 0) {
      $sql = "INSERT INTO customer(Name,Address, Phone_No, Email) VALUES('$Name', '$Address', '$Phone_No', '$Email')";
    } else {
      $sql = "UPDATE customer SET Name='$Name',Address='$Address', Phone_No='$Phone_No', Email='$Email' WHERE Cust_id=$id";
    }
    $res = mysqli_query($dbcnx, $sql);
    if ($res == 0) {
      echo("<p>Error registering: " . mysqli_error($dbcnx). "</p>");
    } else {
      header("Location: customer.list.php"); /* Redirect browser */
    }
  }
  mysqli_close($dbcnx);
}	
?>