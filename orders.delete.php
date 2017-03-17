<?php
	$Order_id = $_GET['id'];
	if ($Order_id == '' or !is_numeric($Order_id)) {
		echo("You did not complete the delete form correctly <br />\n");
	} else {
		$dbcnx = mysqli_connect("localhost", "root", "", "jewelry_store");
		if (mysqli_connect_errno($dbcnx )){
			echo "Failed to connect to MySQL: " .mysqli_connect_error();
			exit();
		}

		$sql = "DELETE from orders where Order_id = $Order_id";
		$res = mysqli_query($dbcnx, $sql);
		if($res && mysqli_affected_rows($dbcnx)){
			header("Location: orders.list.php"); /* Redirect browser */
        } else {
        	echo "No such record deleted";
        }
        mysqli_close($dbcnx);
    }
?>
<a href="index.php">Back</a>