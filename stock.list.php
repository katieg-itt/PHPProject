<?php
  $current ='stock';
  include ('header.php');

  echo ("<img src='images/banners/stock.jpg' alt='stock' class='headerimg' />");  //images from google search for stock.
  $dbcnx = mysqli_connect("localhost", "root", "", "jewelry_store");
  
  if (mysqli_connect_errno($dbcnx )){
    echo "Failed to connect to MySQL: " .mysqli_connect_error();
    exit();
  } else {
    $sql = "SELECT * from stock";
    $res = mysqli_query($dbcnx, $sql);
    if ( !$res ) {
      echo('Query failed ' . $sql . ' Error:' . mysqli_error());
      exit();
    } else {
      if(mysqli_num_rows($res)< 1){
        //there are no Stock
        echo "<p><em> No Stock</em></p>";
        exit();  
      } else {
        echo ("<table class='datatable'>");
        echo ("<tr><th>Stockid</th>");
        echo ("<th>Description</th>");
        echo ("<th>Category</th>");
        echo ("<th>Quantity</th>");
        echo ("<th>Price</th><th colspan='3'>Admin</th></tr>");
        while ( $row = mysqli_fetch_array($res) ) {
          echo("<tr><td>". $row['Stock_id']. "</td>"
              ."<td>". stripslashes($row['Description']). "</td>"
              ."<td>" .$row['Category']."</td>"
              ."<td>" .$row['Quantity'] ."</td>"
              ."<td>");
              
          if ($row['Quantity'] == 0){
            echo ('Out Of Stock');
          } else {
            echo("&euro;" . $row['Price']);
          }
              
          echo("</td>"
              ."<td><a href='stock.form.php?id=".$row['Stock_id']."'>Update</a></td>"
              ."<td><a href='stock.delete.php?id=".$row['Stock_id']."'>Delete</a></td></tr>");
              
        }
        
        echo "<tr><td colspan='7'><center><a href='stock.form.php'>Add Stock Item</a></td></tr>";
        echo "</table>";
      } 
      //free results
      mysqli_free_result($res);
      
      mysqli_close($dbcnx);
    }
  }
  include ('footer.php');
?>