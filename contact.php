<?php 
session_start();

include("connection.php");
error_reporting(0);

$cust= $_SESSION['customer'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>AK Grocery - Contact Us</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Vide" />
<meta name="keywords" content="Contact Us" />
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
            <h1 ><a href="index.php"><b>T<br>H<br>E</b>AK Grocery<span>The Best of bests</span></a></h1>
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

 <div class="banner-top">
	<div class="container">
		<h3 >Contact</h3>
		<h4><a href="index.php">Home</a><label>/</label>Contact</h4>
		<div class="clearfix"> </div>
	</div>
</div>

 <div class="contact">
	<div class="container">
		<div class="spec ">
			<h3>Contact</h3>
				<div class="ser-t">
					<b></b>
					<span><i></i></span>
					<b class="line"></b>
				</div>
		</div>
		<div class=" contact-w3">	

			<div class="col-md-7 contact-left">
				<h4>Contact Information</h4>
				<p> .............. </p>
				<ul class="contact-list">
					<li> <i class="fa fa-map-marker" aria-hidden="true"></i> Address .... </li>
					<li><i class="fa fa-envelope" aria-hidden="true"></i><a href="karwan@mail.com">karwan@gmail.com</a></li>
					<li> <i class="fa fa-phone" aria-hidden="true"></i>07504474667</li>
				</ul>
				<div id="container">
 					<div id="parentHorizontalTab">
						<ul class="resp-tabs-list hor_1">
							<li><i class="fa fa-envelope" aria-hidden="true"></i></li>
							<li> <i class="fa fa-phone" aria-hidden="true"></i> </span></li>
 						</ul>
						<div class="resp-tabs-container hor_1">
							<div>
								<form action="#" method="post">
									<input type="text" value="Name" name="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
									<input type="email" value="Email" name="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
									<textarea name="Message..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
									<input type="submit" value="Submit" >
								</form>
							</div>
							<div>
								<div class="map-grid">
								<h5>Contact Me Through</h5>
									<ul>
                                        <li>Mobile No : 07504474667</li>
									</ul>
								</div>
							</div>

						</div>
					</div>
				</div>
				
 				<script type="text/javascript">
				$(document).ready(function() {
 					$('#parentHorizontalTab').easyResponsiveTabs({
						type: 'default',
						width: 'auto',
						fit: true,
						tabidentify: 'hor_1',
						activate: function(event) {
							var $tab = $(this);
							var $info = $('#nested-tabInfo');
							var $name = $('span', $info);
							$name.text($tab.text());
							$info.show();
						}
					});

 					$('#ChildVerticalTab_1').easyResponsiveTabs({
						type: 'vertical',
						width: 'auto',
						fit: true,
						tabidentify: 'ver_1',
						activetab_bg: '#fff',
						inactive_bg: '#F5F5F5',
						active_border_color: '#c1c1c1',
						active_content_border_color: '#5AB1D0'
					});

 					$('#parentVerticalTab').easyResponsiveTabs({
						type: 'vertical',
						width: 'auto',
						fit: true,
						closed: 'accordion',
						tabidentify: 'hor_1',
						activate: function(event) {
							var $tab = $(this);
							var $info = $('#nested-tabInfo2');
							var $name = $('span', $info);
							$name.text($tab.text());
							$info.show();
						}
					});
				});
			</script>
				
			</div>
			
		<div class="clearfix"></div>
	</div>
	</div>
</div>

 <?php include_once("footer.php"); ?>
 <script src="admin/js/easyResponsiveTabs.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$('#horizontalTab').easyResponsiveTabs({
			type: 'default',
			width: 'auto',
			fit: true
			});
		});				
	</script>
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