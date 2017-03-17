<?php
  $current ='orders'; 
  include ('header.php');

  echo ("<img src='images/banners/orders.jpg' alt='orders' class='headerimg' />");       //images from a google image search for orders.
  $dbcnx = mysqli_connect("localhost", "root", "", "jewelry_store");
  
  if (mysqli_connect_errno($dbcnx )){
    echo "Failed to connect to MySQL: " .mysqli_connect_error();
    exit();
  } else {
    $sql = "SELECT * from orders,customer where orders.Cust_id = customer.Cust_id";
    $res = mysqli_query($dbcnx, $sql);
    if ( !$res ) {
      echo('Query failed ' . $sql . ' Error:' . mysqli_error());
      exit();
    } else {
      if(mysqli_num_rows($res)< 1){
        //there are no orders
        echo "<p><em> No Orders</em></p>";
        exit();  
      } else {
        echo ("<table class='datatable'>");                                    
        echo ("<tr><th>Order id</th>");
        echo ("<th>Customer</th>");
        echo ("<th>Date</th>");
        echo ("<th>Price</th>");
        echo ("<th colspan='3'>Admin</th></tr>");
        while ( $row = mysqli_fetch_array($res) ) {
          echo("<tr><td>". $row['Order_id']. "</td>"
              ."<td>".$row['Name']. "</td>"
              ."<td>" .$row['Date']."</td>"
              ."<td>&euro;" .$row['Price'] ."</td>"
              ."<td><a href='orders.details.php?id=".$row['Order_id']."'>View</a></td>"
              ."<td><a href='orders.form.php?id=".$row['Order_id']."'>Update</a></td>"
              ."<td><a href='orders.delete.php?id=".$row['Order_id']."'>Delete</a></td></tr>");
        }
        echo "</table>";
      }
      echo "<p colspan='8'><center><a href='orders.form.php'>Add Customer to Order</a></p>";
    } 
    //free results
    mysqli_free_result($res);
  
    mysqli_close($dbcnx);
  }
  include ('footer.php');
?>