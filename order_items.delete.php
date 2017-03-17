<?php
$Order_id = $_GET['order'];
$Stock_id = $_GET['stock'];
if ($Order_id == '' or !is_numeric($Order_id))
{
echo("You did not complete the delete form correctly <br />\n");
} 
else
{
$dbcnx = mysqli_connect("localhost", "root", "", "jewelry_store");
if (mysqli_connect_errno($dbcnx )){
echo "Failed to connect to MySQL: " .mysqli_connect_error();
exit();
}

$sql = "DELETE FROM order_items WHERE Order_id = $Order_id AND Stock_id = $Stock_id";  // change this query to delete order_items by order_id and stock_id.
$res = mysqli_query($dbcnx, $sql);
if($res && mysqli_affected_rows($dbcnx) ){
$sql = "SELECT SUM(Price) AS new_total FROM order_items WHERE Order_id = $Order_id AND Stock_id = $Stock_id"; //put SUM SELECT here.

             echo("Your Order Item" . " ". $Order_id. " " . "has been deleted successfully\n");
             }
             else{
             
             echo "No such record deleted";
             }
  mysqli_close($dbcnx);		
}
?>

<a href="orders.list.php">Back</a>