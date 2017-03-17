<?php
  $Stock_id = (int)$_GET['stock'];
  $Order_id = (int)$_GET['order'];
  
  if ($Stock_id == 0 or $Order_id == 0){
    echo("You did not complete the insert form correctly <br>");
    exit();
  } else {
    $dbcnx = mysqli_connect("localhost", "root", "", "jewelry_store");
    // Check connection
    if (mysqli_connect_errno($dbcnx )) {
      echo "Failed to connect to MySQL: " .mysqli_connect_error();
      exit();
    }
    
    // Find the stock item they want
    $sql = "SELECT Quantity, Price FROM stock WHERE Stock_id = $Stock_id";
    $res = mysqli_query($dbcnx, $sql);
    
    if(mysqli_num_rows($res)) {   // if there is at least one result
      $stock_details = mysqli_fetch_array($res);
      
      // Check to see if item is in stock
      if($stock_details['Quantity'] <= 0) {
        echo("Sorry, that item is out of stock");
        exit();
      } else {
        $price = $stock_details['Price'];
        $quantity = $stock_details['Quantity'];
        // Update stock table to reduce quantity by one
        $quantity = $quantity - 1;
        $sql = "UPDATE stock SET Quantity=$quantity WHERE Stock_id=$Stock_id";
        $res = mysqli_query($dbcnx, $sql);
        
        // Does this person already have one of these items in their order?
        $sql = "SELECT Quantity FROM order_items WHERE Order_id=$Order_id AND Stock_id=$Stock_id";
        $res = mysqli_query($dbcnx, $sql);
    
        $order_quantity = 1;
        if(mysqli_num_rows($res)) { // if there is at least one result, just update the quantity and price
          $row = mysqli_fetch_array($res);
          $order_quantity = $row['Quantity'] + 1;
          $price = $order_quantity * $price;  // price should be total for that quantity
          $sql = "UPDATE order_items SET Quantity=$order_quantity, Price=$price WHERE Order_id=$Order_id AND Stock_id=$Stock_id";
          $res = mysqli_query($dbcnx, $sql);
        } else { // otherwise do an insert
          $sql = "INSERT INTO order_items (Order_id, Stock_id, Quantity, Price) VALUES ($Order_id, $Stock_id, 1, '$price')";  
          $res = mysqli_query($dbcnx, $sql);
        }
          
        // Finally, add the value of all the order items, and update the order
        $sql = "SELECT SUM(Price) AS new_total FROM order_items WHERE Order_id = $Order_id";    
        $res = mysqli_query($dbcnx, $sql);
        $row = mysqli_fetch_array($res);
        $new_total = $row['new_total'];
        $sql = "UPDATE Orders SET Price =$new_total WHERE Order_id =$Order_id";
        $res = mysqli_query($dbcnx, $sql);
      }
    }
  
  mysqli_close($dbcnx);
}	

header("Location: orders.details.php?id=".$Order_id); /* Redirect browser */
?>