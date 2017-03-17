<!DOCTYPE html>
<html lang='en'>
  <head>
    <title>My Project</title>
    <meta charset='utf-8'>
    <meta name='description' content=''>
    <meta name='keywords' content=''>
    <meta name='author' content=''>
    <meta name='robots' content='all'>
    <!-- <meta http-equiv='X-UA-Compatible' content='IE=edge'> -->
    <link href='/favicon.png' rel='shortcut icon' type='image/png'>
  </head>
  <body>
  <h1>My Project</h1>
 <div>
    <a href="index.php">Customers</a>
    <a href="orders.list.php">Orders</a>
    <a href="order_items.list.php">Order Items</a>
    <a href="stock.list.php">Stock</a>
  </div>
  <?php
  $dbcnx = mysqli_connect("localhost", "root", "", "jewelry_store");
  
  if (mysqli_connect_errno($dbcnx )){
echo "Failed to connect to MySQL: " .mysqli_connect_error();
exit();}
else {

$sql = "SELECT * from order_items";
$res = mysqli_query($dbcnx, $sql);
if ( !$res ) {
        echo('Query failed ' . $sql . ' Error:' . mysqli_error());
    exit();}
else
{
   if(mysqli_num_rows($res)< 1){
  //there are no order items
  echo "<p><em> No Order Items</em></p>";
exit();  }
else
{
echo ("<table border='1'>");
echo ("<tr><th>Order_id</th>");
echo ("<th>Stock_id</th>");
echo ("<th>Quantity</th>");
echo ("<th>Price</th></tr>");
while ( $row = mysqli_fetch_array($res) ) {
echo("<tr><td>". $row['Order_id']. "</td><td>".$row['Stock_id']. "</td><td>" .$row['Quantity']."</td>" ."<td>" .$row['Price'] ."</td><td><a href='order_items.form.php?id=".$row['Order_id']."'>Edit</a></td><td><a href='order_items.delete.php?id=".$row['Order_id']."'>Delete</a></td></tr>");
}
echo "<tr><td colspan='7'><center><a href='order_items.form.php'>Add Order Item</a></td></tr>";
echo "</table>";
}} 
//free results
mysqli_free_result($res);
  
mysqli_close($dbcnx);
}
  ?>
  </body>
</html>