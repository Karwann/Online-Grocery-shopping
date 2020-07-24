<?php 
session_start();
 include("connection.php");
error_reporting(0);


$cust= $_SESSION['customer'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>AK Grocery - Order Page</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Vide" />
<meta name="keywords" content="Personal Care" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
 <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
 <link href="css/style.css" rel='stylesheet' type='text/css' />
    <script src="admin/js/jquery-1.11.1.min.js"></script>
 <script type="text/javascript" src="admin/js/move-top.js"></script>
<script type="text/javascript" src="admin/js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
 <link href="css/font-awesome.css" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>

</head>
<body>
<div class="header">

    <div class="container">

        <div class="logo pull-left">
            <h1 ><a href="index.php"><b>T<br>H<br>E</b>AK Grocery<span>The Best of Bests</span></a></h1>
        </div>

        <?php
        if(isset($_SESSION['customer']))
        {

            ?>
            <div class="header pull-left">
                <b>Welcome </b><b style="color: green;"><?php echo $cust; ?></b>
            </div>

            <div class="head-t pull-right">
                <ul class="card">
                    <li><a href="order.php" ><i class="fa fa-arrow-right" aria-hidden="true"></i>Orders</a></li>
                    <li><a href="user-logout.php" ><i class="fa fa-user" aria-hidden="true"></i>Logout</a></li>
                </ul>
            </div>

            <?php
        }

        else{
            ?>

            <div class="head-t pull-right">
                <ul class="card">
                    <li><a href="login.php" ><i class="fa fa-user" aria-hidden="true"></i>Login</a></li>
                    <li><a href="register.php" ><i class="fa fa-arrow-right" aria-hidden="true"></i>Register</a></li>
                </ul>
            </div>

            <?php
        }

        ?>
        <div class="header-ri">
            <div class="search-form">
                <form action="index-search.php" method="post">
                    <label>
                        <input type="text" placeholder="Search" name="search">
                    </label>
                    <input type="submit" value=" ">
                </form>
            </div>

        </div>
        <div class="clearfix"></div>


        <?php include_once("top.php"); ?>

    </div>

</div>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
       <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <a href="index.php"><img class="first-slide" src="images/ba1.jpg" alt="First slide"></a>
       
        </div>
        <div class="item">
          <a href="index.php"><img class="second-slide " src="images/ba.jpg" alt="Second slide"></a>
         
        </div>
        <div class="item">
          <a href="index.php"><img class="third-slide " src="images/ba2.jpg" alt="Third slide"></a>
          
        </div>
      </div>
    
    </div>

		<div class="product">
		<div class="container">
			<div class="spec ">
				<h3>Order Page</h3>
				<div class="ser-t">
					<b></b>
					<span><i></i></span>
					<b class="line"></b>
				</div>
			</div>
			<div class=" con-w3l agileinf">
							<?php 

								$q2= "SELECT * FROM orders WHERE buyer_email= '$cust' ORDER BY order_id DESC";
								$data2= mysqli_query($conn, $q2);
								$total2= mysqli_num_rows($data2);

								while($res2= mysqli_fetch_assoc($data2)){
									$ven= $res2['admin_name'];
									$q4= "SELECT * FROM admin WHERE email= '$ven'";
									$data4= mysqli_query($conn, $q4);
									while($res4= mysqli_fetch_assoc($data4)){
										$ven_ph= $res4['phone'];
										$ven_name= $res4['username'];
										$ven_address= $res4['street'].", ".$res4['city'];
									}

									$del= $res2['delivery_status'];
									if($del != 'ND' && $del != 'Returned'){
									$q3= "SELECT * FROM delivery WHERE username= '$del'";
									$data3= mysqli_query($conn, $q3);
									while($res3= mysqli_fetch_assoc($data3)){
										$sdel= $res3['email'];
										$sdel2= $res3['phone'];
									
						?>
							<div class="col-md-3 pro-1">
								<div class="col-m">								
									<a href="#" data-toggle="modal" data-target="#myModal1" class="offer-img" id="<?php echo $res2['order_id']; ?>">
										<?php echo "<img src='".$res2['product_image']."'>";?> 
									</a>
									<div class="mid-1">
										<div class="women">
											<h6>
												<?php echo $res2['product_title'];?>
											</h6>							
										</div>
										<div class="mid-2">
											<p ><em class="item_price"> Price <?php echo $res2['product_price'];?></em></p>
											<div class="clearfix"></div>
										</div>
										<div class="mid-3">
											<p ><em class="item_qty"> Qty <?php echo $res2['product_qty'];?></em></p>
											<div class="del_name"><b>Delivery Name:</b> <?php echo $del; ?></div>
											<div class="del_ph"><b>Delivery Phone:</b> <?php echo $sdel2; ?></div>
											<div class="clearfix"></div>
										</div>
										<div class="mid-2">
											<p ><em class="pay_id"> <b>Order ID: </b> <?php echo $res2['payment_id'];?></em></p>
											<p ><em class="pay_stat"> <b>Payment Status: </b> <?php echo $res2['payment_status'];?></em></p>
											<p ><em class="ven_name"> <b>Admin Name: </b> <?php echo $ven_name;?></em></p>
											<p ><em class="ven_ph"> <b>Admin Phone No: </b> <?php echo $ven_ph;?></em></p>
											<p ><em class="ven_address"> <b>Admin Address: </b> <?php echo $ven_address;?></em></p>
											<div class="clearfix"></div>
										</div>
                                        <div class="del_ph"><b>Order confirmed or you can return the order</b> </div>

                                        <button class="btn btn-danger" id="<?php echo $res2['order_id']; ?>"> Return Order </button>
									</div>
								</div>
							</div>
							<?php 
							}
								}
								elseif ($del == 'Returned') { ?>
									<div class="col-md-3 pro-1">
								<div class="col-m">								
									<a href="#" data-toggle="modal" data-target="#myModal1" class="offer-img" id="<?php echo $res2['order_id']; ?>">
										<?php echo "<img src='".$res2['product_image']."'>";?> 
									</a>
									<div class="mid-1">
										<div class="women">
											<h6>
												<?php echo $res2['product_title'];?>
											</h6>							
										</div>
										<div class="mid-2">
											<p ><em class="item_price"> Price <?php echo $res2['product_price'];?></em></p>
											<div class="clearfix"></div>
										</div>
										<div class="mid-3">
											<p ><em class="item_qty"> Qty <?php echo $res2['product_qty'];?></em></p>
											<div class="del_name"><b>Delivery Name:</b> Order Returned </div>
											<div class="del_ph"><b>Delivery Phone:</b> Order Returned </div>
											<div class="clearfix"></div>
										</div>
										<div class="mid-2">
											<p ><em class="pay_id"> <b>Order ID: </b> <?php echo $res2['payment_id'];?></em></p>
											<p ><em class="pay_stat"> <b>Payment Status: </b>Order Returned </em></p>
											<p ><em class="ven_name"> <b>admin Name: </b> <?php echo $ven_name;?></em></p>
											<p ><em class="ven_ph"> <b>admin Phone No: </b> <?php echo $ven_ph;?></em></p>
											<p ><em class="ven_address"> <b>admin Address: </b> <?php echo $ven_address;?></em></p>
											<div class="clearfix"></div>
										</div>
										<button class="btn btn-secondary" id="">Order Returned</button>
									</div>
								</div>
							</div>

								<?php }
								else{
									?>
									<div class="col-md-3 pro-1">
								<div class="col-m">								
									<a href="#" data-toggle="modal" data-target="#myModal1" class="offer-img" id="<?php echo $res2['order_id']; ?>">
										<?php echo "<img src='".$res2['product_image']."'>";?> 
									</a>
									<div class="mid-1">
										<div class="women">
											<h6>
												<?php echo $res2['product_title'];?>
											</h6>							
										</div>
										<div class="mid-2">
											<p ><em class="item_price"> Price <?php echo $res2['product_price'];?></em></p>
											<div class="clearfix"></div>
										</div>
										<div class="mid-3">
											<p ><em class="item_qty"> Qty <?php echo $res2['product_qty'];?></em></p>
											<div class="women"><b>Delivery Name:</b> Yet to Deliver</div>
											<div class="women"><b>Delivery Status:</b> Yet to Deliver</div>
											<div class="clearfix"></div>
										</div>
										<div class="mid-2">
											<p ><em class="pay_id"> <b>Order ID: </b> <?php echo $res2['payment_id'];?></em></p>
											<p ><em class="pay_stat"> <b>Payment Status: </b> <?php echo $res2['payment_status'];?></em></p>
											<p ><em class="ven_name"> <b>admin Name: </b> <?php echo $ven_name;?></em></p>
											<p ><em class="ven_ph"> <b>admin Phone No: </b> <?php echo $ven_ph;?></em></p>
											<p ><em class="ven_address"> <b>admin Address: </b> <?php echo $ven_address;?></em></p>
											<div class="clearfix"></div>
										</div>
										<button class="btn btn-danger" id="<?php echo $res2['order_id']; ?>">Cancel Order</button>
									</div>
								</div>
							</div>

									<?php
								}
							}
							?>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>


<script>  
	 $(document).ready(function(){  
	      $('.btn-danger').click(function(){ 
	      	if(confirm("Are you sure?")){
	           var id = $(this).attr("id");
 	           $.ajax({
	                url:"return-order.php",  
	                method:"post",  
	                data:{id:id},  
	                success:function(data){ 
	                    alert("Order Cancelled");
	                    window.location.reload();
	                	}  
			        });
		        }  
		    });  
	    });  
</script>



 <?php include_once("footer.php"); ?>

 	<script type="text/javascript">
		$(document).ready(function() {

		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
 		<script src="admin/js/bootstrap.js"></script>
 <script type='text/javascript' src="admin/js/jquery.mycart.js"></script>
  <script type="text/javascript">
  $(function () {

    var goToCartIcon = function($addTocartBtn){
      var $cartIcon = $(".my-cart-icon");
      var $image = $('<img width="30px" height="30px" src="' + $addTocartBtn.data("image") + '"/>').css({"position": "fixed", "z-index": "999"});
      $addTocartBtn.prepend($image);
      var position = $cartIcon.position();
      $image.animate({
        top: position.top,
        left: position.left
      }, 500 , "linear", function() {
        $image.remove();
      });
    }

    $('.my-cart-btn').myCart({
      classCartIcon: 'my-cart-icon',
      classCartBadge: 'my-cart-badge',
      affixCartIcon: true,
      checkoutCart: function(products) {
        $.each(products, function(){
          console.log(this);
        });
      },
      clickOnAddToCart: function($addTocart){
        goToCartIcon($addTocart);
      },
      getDiscountPrice: function(products) {
        var total = 0;
        $.each(products, function(){
          total += this.quantity * this.price;
        });
        return total * 1;
      }
    });

  });
  </script>
</body>
</html>