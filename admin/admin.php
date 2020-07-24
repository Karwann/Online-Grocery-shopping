<?php
session_start();
if(isset($_SESSION['user']))
{
	header("location:admin-index.php");
}
 include("../connection.php");
error_reporting(0);
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin Login</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Vide" />
<meta name="keywords" content="Admin Page" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
 <link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
 <link href="../css/style.css" rel='stylesheet' type='text/css' />
    <script src="js/jquery-1.11.1.min.js"></script>
 <script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
 <link href="../css/font-awesome.css" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>

</head>
<body>
 <div class="header">

		<div class="container">
			
			<div class="logo ">
				<h1 ><a href="../index.php"><b>T<br>H<br>E</b>AK Grocery <span>The Best of bests</span></a></h1>
			</div>



			<div class="head-t">
				<ul class="card">
 					<li><a href="admin-index.php" ><i class="fa fa-user" aria-hidden="true"></i>Admin Login</a></li>
 				</ul>
			</div>

				</div>
					
				</div>			
</div>
 <div class="banner-top">
	<div class="container">
		<h3 >Admin Login</h3>
		<h4><a href="../index.php">Home</a><label>/</label>Admin Login</h4>
		<div class="clearfix"> </div>
	</div>
</div>

	<div class="login">
	
		<div class="main-agileits">
				<div class="form-w3agile">
					<h3>Admin Login</h3>
					<form action="" method="post">
						<div class="key">
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<input  type="text" value="Email" name="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="true">
							<div class="clearfix"></div>
						</div>
						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input  type="password" value="Password" name="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="true">
							<div class="clearfix"></div>
						</div>
						<input class="center-block" type="submit" name="submit" value="Login">
					</form>

					<?php

						if(isset($_POST['submit']))
						{
						$email= $_POST['Email'];
						$passwd= $_POST['Password'];

						if($email != "" && $passwd != ""){
							$query= "SELECT * from admin where email='$email' && password='$passwd'";
							$data= mysqli_query($conn, $query);
							$total= mysqli_num_rows($data);
							if($total == 1){
									$_SESSION['user']= $email;
									echo "<script type='text/javascript'>  window.location='admin-index.php'; </script>";
							}
							else{
								echo "Invalid Username or Password";
							}
						}
						else{
							echo "All Fields Required";
						}
					}

					?>



				</div>

			</div>
		</div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>