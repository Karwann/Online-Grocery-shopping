<?php
session_start();
include("connection.php");
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>AK Grocery - Register</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Vide" />
<meta name="keywords" content="Registration" />
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
            <h1 ><a href="index.php"><b>T<br>H<br>E</b>AK Grocery</a></h1>
        </div>


        <div class="head-t pull-right">

            <ul class="card">

                <li><a href="login.php" ><i class="fa fa-user" aria-hidden="true"></i>Login</a></li>
                <li><a href="register.php" ><i class="fa fa-arrow-right" aria-hidden="true"></i>Register</a></li>
            </ul>
        </div>

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
		<h3 >Register</h3>
		<h4><a href="index.php">Home</a><label>/</label>Register</h4>
		<div class="clearfix"> </div>
	</div>
</div>


	<div class="login">
		<div class="main-agileits">
				<div class="form-w3agile form1">
					<h3>Register</h3>
					<form action="" method="get">
						<div class="key">
							<i class="fa fa-user" aria-hidden="true"></i>
							<input  type="text" value="Username" name="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}" required="true">
							<div class="clearfix"></div>
						</div>
						<div class="key">
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<input  type="text" value="Email" name="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="true">
							<div class="clearfix"></div>
						</div>
						<div class="key">
							<i class="fa fa-phone" aria-hidden="true"></i>
							<input  type="text" value="Phone" name="Phone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Phone';}" required="true">
							<div class="clearfix"></div>
						</div>
						<div class="key">
							<i class="fa fa-user" aria-hidden="true"></i>
							<input  type="text" value="Street Address" name="Street" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Street';}" required="true">
							<div class="clearfix"></div>
						</div>
						<div class="key">
							<i class="fa fa-user" aria-hidden="true"></i>
							<input  type="text" value="City" name="City" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'City';}" required="true">
							<div class="clearfix"></div>
						</div>
						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input  type="password" value="Password" name="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="true">
							<div class="clearfix"></div>
						</div>
						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input  type="password" value="Confirm Password" name="ConfirmPassword" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Confirm Password';}" required="true">
							<div class="clearfix"></div>
						</div>
						<input type="submit" name="submit" value="Submit">
					</form>

					<?php
						if($_GET['submit']){

							$uname= $_GET['Username'];
							$email= $_GET['Email'];
							$phone= $_GET['Phone'];
							$street= $_GET['Street'];
							$city= $_GET['City'];
 							$passwd= $_GET['Password'];
							$cpasswd= $_GET['ConfirmPassword'];


						if($uname != "" && $email != "" && $phone != "" && $city != "" && $passwd != ""){

							if($passwd == $cpasswd){

								$query= "INSERT INTO customers values (DEFAULT,'$uname','$email','$street','$city','$passwd','$phone')";
								$data= mysqli_query($conn, $query);

								if($data == false){
									echo " All Fields Required ";
								}
								else{
									$_SESSION['customer']= $email;
									echo "<script type='text/javascript'>  window.location='user-index.php'; </script>";
								}

							}
							else{
								echo "Passwords don't Match";
							}
						}
						else{
							echo " All Fields Required ";
						}
					}

					?>


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

</body>
</html>