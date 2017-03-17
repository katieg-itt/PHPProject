<?php
  $current ='orders';
  include ('header.php');

  $order_id = $_GET['id'];

  if ($order_id == '' or !is_numeric($order_id)){ 
    echo("Invalid order id <br />\n");
  } else {
    $dbcnx = mysqli_connect("localhost", "root", "", "jewelry_store"); 
    if (mysqli_connect_errno($dbcnx )){
      echo "Failed to connect to MySQL: " .mysqli_connect_error();
      exit();
    } else {
      $sql = "SELECT * from orders where Order_id=$order_id";
      $res = mysqli_query($dbcnx, $sql);
      if(mysqli_num_rows($res)) {
        $order_details = mysqli_fetch_array($res);
  
        $sql = "SELECT * from customer where Cust_id=".$order_details['Cust_id'];
        $res2 = mysqli_query($dbcnx, $sql);
        $customer_details = mysqli_fetch_array($res2);

        echo "<table style='margin:10px auto;'><tr><td><table class='ordertable' width='100%'>";
        echo "<tr><th width='50%'>Customer</th><th width='50%'>Order</th></tr>";
        echo "<tr><td><strong>".$customer_details['Name']."</strong><br />"
            . $customer_details['Phone_No']."<br />"
            . $customer_details['Email']."<br />"
            . $customer_details['Address']."</td>"
            ."<td style='text-align:right;vertical-align:top;'><strong>Order # :".$order_details['Order_id']."</strong><br />"
            . date('jS \of M Y', strtotime($order_details['Date']))."<br />"          //http://php.net/manual/en/function.strtotime.php Makes a time stamp from various date formats, that can be formatted with date().
            . "&euro;" . $order_details['Price']."</td></tr>";
        echo "</table></td></tr>";
      }

      $sql = "SELECT * from order_items, stock where Order_id=$order_id and order_items.Stock_id = stock.Stock_id";
      $res = mysqli_query($dbcnx, $sql);
      if ( !$res ) {
        echo('Query failed ' . $sql . ' Error:' . mysqli_error());
        exit();
      } else {
        if(mysqli_num_rows($res)< 1){
          //there are no order items
          echo "</table><p style='text-align: center;'><em> No Current Orders</em></p>";
        }  else {
          echo ("<tr><td><table class='ordertable'>");
          echo ("<tr><th>Item</th>");
          echo ("<th>Quantity</th>");
          echo ("<th>Price</th><th>Admin</th></tr>");
          while ( $row = mysqli_fetch_array($res) ) {
            echo("<tr><td>".$row['Description']. "</td>"
            ."<td>" .$row[2]."</td>" ."<td>&euro;" .$row[3] ."</td>"     //Because of join $row [price] will containe stock price, so have to use index instead.
            ."<td><a href='order_items.delete.php?order=".$row['Order_id']."&stock".$row['Order_id']."'>Remove</a></td></tr>");
          }
                  
        } 
        echo "<tr><td colspan='7'><center><a href='order_items.form.php?order=$order_id'>Add Order Item</a></td></tr>";
        echo "<tr><td colspan='7'><center><a href='orders.list.php?order=$order_id'>Back to orders</a></td></tr>";
          echo "</table></td></tr></table>";  
             
      }
      //free results
      mysqli_free_result($res);
      
      mysqli_close($dbcnx);
    }
  }

  include ('footer.php');?>