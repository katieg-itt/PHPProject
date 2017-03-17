<?php 
    $current = 'stock';
    include ('header.php');

    if(isset($_GET['id'])) {
        $id = (int)$_GET['id'];
    } else {
        $id = 0;
    }

    if ($id == 0) {
        $stock_id = '';
        $description = '';
        $category = '';
        $quantity = '';
        $price = '';
        $id = 0;
    } else {
        $dbcnx = mysqli_connect("localhost", "root", "", "jewelry_store");
        if (mysqli_connect_errno($dbcnx )){
          echo "Failed to connect to MySQL: " .mysqli_connect_error();
          exit();
        }

        $sql = "select * from stock where Stock_id = $id";
        $res = mysqli_query($dbcnx, $sql);
        $row = mysqli_fetch_array($res);
      
        $stock_id = $row['Stock_id'];
        $description = $row['Description'];
        $category = $row['Category'];
        $quantity = $row['Quantity'];
        $price = $row['Price'];
    }
 ?> <table class='formtable'>
    <form action="stock.add.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <tr><td class='label'>Stock_id: </td><td> <input type="text" name="Stock_id" value="<?php echo $stock_id; ?>"></td></tr>
    <tr><td class='label'>Description: </td><td> <input type="text" name="Description" value="<?php echo $description; ?>" ></td></tr>
    <tr><td class='label'>Category: </td><td> <input type="text" name="Category" value="<?php echo $category; ?>"></td></tr>
    <tr><td class='label'>Quantity: </td><td> <input type="text" name="Quantity" value="<?php echo $quantity; ?>"></td></tr>
    <tr><td class='label'>Price: </td><td> <input type="text" name="Price" value="<?php echo $price; ?>"></td></tr>
    <tr><td class='button' colspan='2'><input type="submit" name="submitdetails" value="SUBMIT" /></td></tr>
</form>
</table>
<?php include ('footer.php'); ?>