<?php
  $current ='customer';
  include('header.php'); 

  echo ("<img src='images/banners/customer.jpg' alt='customer' class='headerimg' />");      //images gotten from a google search for customer.
  
  $dbcnx = mysqli_connect("localhost", "root", "", "jewelry_store");
  
  if (mysqli_connect_errno($dbcnx )){
    echo "Failed to connect to MySQL: " .mysqli_connect_error();
    exit();
  } else {
    $sql = "SELECT * from customer";
    $res = mysqli_query($dbcnx, $sql);
    if ( !$res ) {
      echo('Query failed ' . $sql . ' Error:' . mysqli_error());
      exit();
    } else {
      if(mysqli_num_rows($res)< 1){
        //there are no customer
        echo "<p><em> No customers</em></p>";
        exit();  
      } else {
        echo ("<table class='datatable'>");
        echo ("<tr><th>Custid</th>");
        echo ("<th>Name</th>");
        echo ("<th>Address</th>");
        echo ("<th>Phone No</th>");
        echo ("<th>Email</th>");
        echo ("<th colspan='2'>Admin</th></tr>");
        while ( $row = mysqli_fetch_array($res) ) {
          echo("<tr><td>". $row['Cust_id']. "</td>"
              ."<td>". stripslashes($row['Name']). "</td>"
              ."<td>" .substr($row['Address'],0,15)."...</td>"
              ."<td>" .$row['Phone_No'] ."</td>"
              ."<td>" .$row['Email'] ."</td>"
              ."<td><a href='customer.form.php?id=".$row['Cust_id']."'>Edit</a></td>"
              ."<td><a href='customer.delete.php?id=".$row['Cust_id']."'>Delete</a></td></tr>");
        }
        echo "<tr><td colspan='7'><center><a href='customer.form.php'>Add Customer</a></td></tr>";
        echo "</table>";
      }
    } 
    //free results
    mysqli_free_result($res);
      
    mysqli_close($dbcnx);
  }
  ?>
<?php include('footer.php'); ?>