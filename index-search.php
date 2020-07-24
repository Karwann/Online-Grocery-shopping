<?php 
session_start();


include("connection.php");
error_reporting(0);
$cust= $_SESSION['customer'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>AK Grocery</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Vide" />
<meta name="keywords" content="Grocery Store" />
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



<div class="product">
		<div class="container">
			<div class="spec ">
				<h3>Searched Products</h3>
				<div class="ser-t">
					<b></b>
					<span><i></i></span>
					<b class="line"></b>
				</div>
			</div>
				<div class=" con-w3l agileinf">
					<?php 
						if (isset($_POST['search'])){
							$search= $_POST['search'];
						}
								$q2= "SELECT p.product_id, p.product_title, p.product_price,p.product_qty, p.product_desc, p.product_image, c.cat_title, c.cat_id, b.brand_id, b.brand_title FROM products p JOIN categories c ON c.cat_id = p.product_cat JOIN brands b ON b.brand_id = p.product_brand WHERE p.product_title LIKE '%$search%' OR p.product_desc LIKE '%$search%' OR  c.cat_title LIKE '%$search%' OR b.brand_title LIKE '%$search%'";
								$data2= mysqli_query($conn, $q2);
								$total2= mysqli_num_rows($data2);
								
								if($total2 > 0){
								while($res2= mysqli_fetch_assoc($data2)){
						?>
							<div class="col-md-3 pro-1">
								<div class="col-m">								
									<a href="#" data-toggle="modal" data-target="#myModal1" class="offer-img" id="<?php echo $res2['product_id']; ?>">
										<?php echo "<img src='images/".$res2['product_image']."'>";?> 
									</a>
									<div class="mid-1">
										<div class="women">
											<h6>
												<?php echo $res2['product_title'];?>
											</h6>							
										</div>
										<div class="mid-2">
											<p ><label> Dinnar <?php echo $res2['product_price'] +20;?></label><em class="item_price"> Dinnar <?php echo $res2['product_price'];?></em></p>

											<div class="clearfix"></div>
										</div>
										<?php 
										$s= "images/";
										$ext= $res2['product_image'];
										$image= $s.$ext;
										?>
										<div class="add">
										   <button class="btn btn-danger my-cart-btn my-cart-b " data-id="<?php echo $res2['product_id']; ?>" data-name= "<?php echo $res2['product_title'];?>"data-summary="summary 1" data-price="<?php echo $res2['product_price'];?>" data-quantity="1" data-image="<?php echo $image; ?>">Add to Cart</button>
										</div>
										
									</div>
								</div>
							</div>
							<?php 
								}
							}
							else{
								?>
								<?php 

								$q2= "SELECT * FROM products LIMIT 8";
								$data2= mysqli_query($conn, $q2);
								$total2= mysqli_num_rows($data2);
								
								while($res2= mysqli_fetch_assoc($data2)){
						?>
							<div class="col-md-3 pro-1">
								<div class="col-m">								
									<a href="#" data-toggle="modal" data-target="#myModal1" class="offer-img" id="<?php echo $res2['product_id']; ?>">
										<?php echo "<img src='images/".$res2['product_image']."'>";?> 
									</a>
									<div class="mid-1">
										<div class="women">
											<h6>
												<?php echo $res2['product_title'];?>
											</h6>							
										</div>
										<div class="mid-2">
											<p ><label> Rs <?php echo $res2['product_price'] +20;?></label><em class="item_price"> Rs <?php echo $res2['product_price'];?></em></p>
											  <div class="block">
												<div class="starbox small ghosting"> </div>
											</div>
											<div class="clearfix"></div>
										</div>
										<?php 
										$s= "images/";
										$ext= $res2['product_image'];
										$image= $s.$ext;
										?>
										<div class="add">
										   <button class="btn btn-danger my-cart-btn my-cart-b " data-id="<?php echo $res2['product_id']; ?>" data-name= "<?php echo $res2['product_title'];?>"data-summary="summary 1" data-price="<?php echo $res2['product_price'];?>" data-quantity="1" data-image="<?php echo $image; ?>">Add to Cart</button>
										</div>
										
									</div>
								</div>
							</div>
							<?php 
								}	
							?>
						<?php 
						}
						?>	
							<div class="clearfix"></div>
						 </div>
		</div>
	</div>
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


			<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body modal-spa" id="item_detail">
								
							</div>
						</div>
					</div>
				</div>

		<script>  
			 $(document).ready(function(){  
			      $('.offer-img').click(function(){ 
		/*	      console.log("what"); */
		           var id = $(this).attr("id");
		           console.log(id);   
		           $.ajax({  
		                url:"select.php",  
		                method:"post",  
		                data:{id:id},  
		                success:function(data){ 
		                     $('#item_detail').html(data);  
		                     $('#myModal1').modal("show");  
	        				}  
				        });  
				    });  
			    });  
 		</script>

	</body>
</html>
