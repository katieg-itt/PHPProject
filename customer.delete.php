<?php
	$Cust_id = $_GET['id'];
	if ($Cust_id == '' or !is_numeric($Cust_id)) {
		echo("You did not complete the delete form correctly <br />\n");
	} else {
		$dbcnx = mysqli_connect("localhost", "root", "", "jewelry_store");
		if (mysqli_connect_errno($dbcnx )){
			echo "Failed to connect to MySQL: " .mysqli_connect_error();
			exit();
		}

		$sql = "DELETE from customer where Cust_id = $Cust_id";
		$res = mysqli_query($dbcnx, $sql);
		if($res &&  mysqli_affected_rows($dbcnx)){
			header("Location: customer.list.php"); /* Redirect browser */
        } else {
        	echo "No customer found :o";
        }
  		mysqli_close($dbcnx);		
	}
?>