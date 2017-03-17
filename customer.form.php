<?php 
  $current = "customer";
  include ('header.php');

  if(isset($_GET['id'])) {
    $id = (int)$_GET['id'];
  } else {
    $id = 0;
  }

  if ($id == 0) {
    $name = '';
    $email = '';
    $address = '';
    $phone = '';
    $id = 0;
  } else {
    $dbcnx = mysqli_connect("localhost", "root", "", "jewelry_store");
    if (mysqli_connect_errno($dbcnx )){
      echo "Failed to connect to MySQL: " .mysqli_connect_error();
      exit();
    }

    $sql = "select * from customer where Cust_id = $id";
    $res = mysqli_query($dbcnx, $sql);
    $row = mysqli_fetch_array($res);
  
    $name = $row['Name'];
    $address = $row['Address'];
    $phone = $row['Phone_No'];
    $email = $row['Email'];
  }
 ?><table class='formtable'>
    <tr><th colspan='2'>Add Customer</th></tr>
    <form action="customer.add.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <tr><td class='label'>Name:</td><td> <input type="text" name="Name" value="<?php echo $name; ?>"></td></tr>
    <tr><td class='label'>Address:</td><td> <input type="text" name="Address" value="<?php echo $address; ?>" ></td></tr>
    <tr><td class='label'>Phone.No:</td><td> <input type="text" name="Phone_No" value="<?php echo $phone; ?>"></td></tr>
    <tr><td class='label'>Email:</td><td> <input type="text" name="Email" value="<?php echo $email; ?>"></td></tr>
    <tr><td class='button' colspan='2'><input type="submit" name="submitdetails" value="SUBMIT" /></td></tr>
</form>
</table>

<?php include ('footer.php');?>