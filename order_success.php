<?php 
session_start();

include("connection.php");
error_reporting(0);

if(!isset($_SESSION['customer']))
{
	header("location:index.php");
}

$cust= $_SESSION['customer'];
?>

<!DOCTYPE html>
<html>
<head>
<title>AK Grocery - Order Placed</title>
 <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<style>
 #loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

 .animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}
</style>
</head>
<body onload="myFunction()" style="margin:0;">

	 <?php 
		    $q2= "SELECT * FROM customers WHERE email= '$cust'";
			$data2= mysqli_query($conn, $q2);
			while($res2= mysqli_fetch_assoc($data2)){
				 $address= $res2['street'].", ".$res2['city'].", ".$res2['pincode'];
			}
			
		    ?>

	<div id="loader"></div>
	<div id= "myDiv" class="container" style="display:none;">
		<div class="row justify-content-center">
			<div class="table-responsive">
				<?php
				$somerand= "COD".mt_rand(100000000,999999999);
				$q2= "SELECT * FROM customers WHERE email='$cust'";
				$data2= mysqli_query($conn, $q2);
				$res2= mysqli_fetch_assoc($data2);

				 ?>
				<h2 class="text-center text-black mb-5" style="margin-top: 20px;"> Order Placed </h2>
						<table class="table table-bordered" style="margin-top: 40px;">
							<tr>
								<th>Purchased from</th>
								<td>AK Grocery </td>
							</tr>
							<tr>
								<th>Payment ID</th>
								<td><?php echo $somerand; ?></td>
							</tr>
							<tr>
								<th>Buyer Name</th>
								<td><?= $res2['username']; ?></td>
							</tr>
							<tr>
								<th>Buyer Phone No.</th>
								<td><?= $res2['phone']; ?></td>
							</tr>
							<tr>
								<th>Buyer Email</th>
								<td><?= $res2['email']; ?></td>
							</tr>
							<tr>
								<th>Buyer Address</th>
								<td><?= $address; ?></td>
							</tr>
							<tr>
								<th>Payment Status</th>
								<td>Pending</td>
							</tr>
							<tr>
								<th>Order Date</th>
								<td><?php 		    
								date_default_timezone_set('Asia/Baghdad');
								$date = date('d/m/Y H:i:s', time());
								echo $date;?></td>
							</tr>
						</table>

						<div class="text-center text-danger mb-2">
						<button name="order" class="btn btn-danger" onclick='window.location.href = "order.php"'>Track your Order</button>
						<button name="shopping" class="btn btn-success" onclick='window.location.href = "index.php"'>Continue Shoppping</button>
					</div>

					<?php 
						$spay_id= $somerand;
						$sbuyer_name= $res2['username'];
						$sbuyer_email= $res2['email'];
						$sbuyer_phone= $res2['phone'];
						$sstatus= "Cod";

						$allvalues= $_SESSION['karo'];
						$delivery= $_SESSION['del'];

						if($delivery ==1 )
						{
							$shipping= "Normal";
						}
						else{
							$shipping= "Express";
						}



						$some= json_decode($allvalues);
						$items = array();
						foreach($some as $arr) {
		    				foreach($arr as $key => $value) {
		        				$items[$key] = $value;
		    				}
		    				$sid= $items['id'];
		    				$stitle= $items['name']; 
		    				$sprice= $items['price'];  
		    				$sqty= $items['quantity']; 
		    				$simage= $items['image'];
		    				$sadmin='';

		    				$q2= "SELECT * FROM products WHERE product_id= $sid ";
							$data2= mysqli_query($conn, $q2);

							while($res2= mysqli_fetch_assoc($data2)){
								 $sadmin= $res2['admin_name'];
								 $q3= "SELECT * FROM admin WHERE email= '$sadmin' ";
								 $data3= mysqli_query($conn, $q3);
								 while($resource= mysqli_fetch_assoc($data3)){
								 	$sadmin_name= $resource['username'];
								 	$sadmin_address= $resource['street'].", ".$resource['city'];
								 	$sadmin_phone= $resource['phone'];
								 }
							}

							$q3= "INSERT INTO `orders`(`product_title`, `product_price`, `product_qty`, `product_image`, `admin_name`, `payment_id`, `payment_status`, `buyer_email`, `buyer_phone`, `buyer_name`,`order_date`,`delivery_status`,`shipping_method`, `buyer_address`) VALUES ('$stitle', '$sprice', '$sqty', '$simage', '$sadmin', '$spay_id', '$sstatus', '$sbuyer_email', '$sbuyer_phone', '$sbuyer_name','$date','ND','$shipping','$address')";
							if(mysqli_query($conn, $q3)){
 							}else {
							    echo "Error: " . $q3 . "<br>" . mysqli_error($conn);
							}
						}
					?>
			</div>
		</div>
	</div>

<script>
var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 3000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>
</body>
</html>