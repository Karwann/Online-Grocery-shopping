<?php 
include("./connection.php");
error_reporting(0);




if(isset($_POST["id"])){

	$q = "SELECT * FROM orders WHERE order_id = '".$_POST["id"]."'";
	$data= mysqli_query($conn, $q);
	while($row = mysqli_fetch_array($data)){

		$sadmin= $row['admin_name'];
		$sid= $row['order_id'];
		$stitle= $row['product_title'];
		$sprice= $row['product_price'];
		$sqty= $row['product_qty'];
		$spay_id= $row['payment_id'];
		$spay_status= $row['payment_status'];
		$sdel_status= $row['delivery_status'];
		$sship= $row['shipping_method'];
		$scust= $row['buyer_email'];
		$scust_name= $row['buyer_name'];
		$scust_ph= $row['buyer_phone'];
		$scust_add= $row['buyer_address'];

		if($sdel_status == 'ND'){
			if($spay_status == 'Cod'){
				$q = "DELETE FROM orders WHERE order_id ='$sid'";
				$data= mysqli_query($conn, $q);

			}
			else{
				$q = "UPDATE orders SET delivery_status='Returned' WHERE order_id ='$sid'";
				$data= mysqli_query($conn, $q);
 			}
		}
		else{
			$q = "UPDATE orders SET delivery_status='Returned' WHERE order_id ='$sid'";
			$data= mysqli_query($conn, $q);
 		}
	}

}


?>
