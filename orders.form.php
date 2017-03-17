<?php
  $current = 'orders';
  include ('header.php');
  if(isset($_GET['id'])) {
    $id = (int)$_GET['id'];
  } else {
    $id = 0;
  }
  
  $dbcnx = mysqli_connect("localhost", "root", "", "jewelry_store");
  if (mysqli_connect_errno($dbcnx )){
    echo "Failed to connect to MySQL: " .mysqli_connect_error();
    exit();
  }

  if ($id == 0) {
    $order_id = '';
    $cust_id = '';
    $date = '';
    $price = '';
    $id = 0;
  } else {

    $sql = "select * from orders where Order_id = $id";
    $res = mysqli_query($dbcnx, $sql);
    $row = mysqli_fetch_array($res);
  
    $cust_id = $row['Cust_id'];
    $order_id = $row['Order_id'];
    $date = $row['Date'];
    $price = $row['Price'];
  }
    $sql = "SELECT * FROM customer";
    $res = mysqli_query($dbcnx, $sql);
      
 ?> <table class='formtable'>
    <form action="orders.add.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <tr><td class='label'>Customer: </td><td> <select name="Cust_id">
      <?php
        while ( $row = mysqli_fetch_array($res) ) {
          echo "<option value='".$row['Cust_id']."'";
          if($row['Cust_id'] == $cust_id) {
            echo " selected='selected'";              //pre selects the correct entry when editing
          }
          echo ">".$row['Name']."</option>";
        }
      ?>
    </select></td></tr>
    <tr><td class='label'>Date : </td><td> <input type="text" name="Date" value="<?php echo $date; ?>"></td></tr>
    <tr><td class='button' colspan='2'><input type="submit" name="submitdetails" value="SUBMIT" /></td></tr>
</form>
</table>
<?php include ('footer.php')?>