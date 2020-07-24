<?php
session_start();

include("connection.php");
error_reporting(0);

$cust= $_SESSION['customer'];

    function f($res)
    {
         if($res == 'water_and_beverages'){
            $pname= $res;
            
        }
        if($res == 'fruits_and_vegetables'){
            $pname= $res;
            
        }
        if($res == 'staples'){
            $pname= $res;
            
        }
        if($res == 'branded_food'){
            $pname= $res;
            
        }
        if($res == 'breakfast_and_cereal'){
            $pname= $res;
            
        }
        if($res == 'snacks'){
           $pname= $res;
            
        }
        if($res == 'spices'){
            $pname= $res;
            
        }
        if($res == 'sweets'){
            $pname= $res;
            
        }
        if($res == 'pickle_and_condiment'){
            $pname= $res;
            
        }
        if($res == 'instant_food'){
            $pname= $res;
            
        }
        if($res == 'dryfruit'){
            $pname= $res;
            
        }
        if($res == 'tea_and_coffee'){
           $pname= 'water_and_beverages';
            
        }

        if($res == 'ayurvedic'){
           $pname= $res;
            
        }
        if($res == 'babycare'){
            $pname= $res;
            
        }
        if($res == 'cosmetics'){
            $pname= $res;
            
        }
        if($res == 'deo_and_perfumes'){
            $pname= $res;
            
        }
        if($res == 'haircare'){
            $pname= $res;
            
        }
        if($res == 'oralcare'){
            $pname= $res;
            
        }
        if($res == 'personal_hygiene'){
           $pname= $res;
            
        }
        if($res == 'skincare'){
            $pname= $res;
            
        }
        if($res == 'fashion_accessories'){
            $pname= $res;
            
        }
        if($res == 'grooming_tools'){
            $pname= $res;
            
        }
        if($res == 'shaving_needs'){
            $pname= $res;
            
        }
        if($res == 'sanitary_needs'){
            $pname= $res;
            
        }

        if($res == 'noodles_and_pasta'){
            $pname= $res;
            
        }
        if($res == 'breakfast_cereals'){
            $pname= 'breakfast_and_cereal';
            
        }
        if($res == 'biscuit_and_cookies'){
            $pname= $res;
            
        }
        if($res == 'sauces_and_ketchups'){
            $pname= $res;
            
        }
        if($res == 'chocolates_and_candies'){
            $pname= $res;
            
        }
        if($res == 'frozen_veggies'){
            $pname= $res;
            
        }
        if($res == 'snacks_and_namkeen'){
            $pname= 'snacks';
            
        }
        if($res == 'indian_mithai'){
            $pname= 'sweets';
            
        }

        if($res == 'breads_and_buns'){
            $pname= $res;
            
        }
        if($res == 'dairy'){
            $pname= $res;
            
        }
        if($res == 'cakes_and_pastries'){
            $pname= $res;
            
        }
        if($res == 'rusk_and_khari'){
            $pname= $res;
            
        }
        if($res == 'eggs'){
            $pname= $res;
            
        }
        if($res == 'poultry'){
            $pname= $res;
            
        }
        if($res == 'mutton_and_lamb'){
            $pname= $res;
            
        }
        if($res == 'fish_and_seafood'){
            $pname= $res;
            
        }
        if($res == 'pork_and_others'){
            $pname= $res;
            
        }
        if($res == 'icecream'){
           $pname= $res;
            
        }

        if($res == 'cleaning_accessories'){
           $pname= $res;
            
        }
        if($res == 'cookwear'){
           $pname= $res;
            
        }
        if($res == 'detergents'){
            $pname= $res;
            
        }
        if($res == 'gardening'){
            $pname= $res;
            
        }
        if($res == 'kitchen_and_dining'){
            $pname= $res;
            
        }
        if($res == 'kitchenwear'){
            $pname= $res;
            
        }
        if($res == 'petcare'){
           $pname= $res;
            
        }
        if($res == 'plasticwear'){
            $pname= $res;
            
        }
        if($res == 'pooja_needs'){
            $pname= $res;
            
        }
        if($res == 'safety_accessories'){
            $pname= $res;
            
        }
        if($res == 'festive_decoratives'){
            $pname= $res;
            
        }
        if($res == 'toys_and_gifts'){
            $pname= $res;
            
        }
    }

     if (isset($_GET['name']))
    {
        f($_GET['name']);
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>AK Grocery - Product </title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Vide" />
<meta name="keywords" content="Kitchen" />
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
           <a href="index.php"><img class="first-slide" src="images/ba.jpg" alt="First slide"></a>
       
        </div>
        <div class="item">
          <a href="index.php"> <img class="second-slide " src="images/ba1.jpg" alt="Second slide"></a>
         
        </div>
        <div class="item">
           <a href="index.php"><img class="third-slide " src="images/ba2.jpg" alt="Third slide"></a>
          
        </div>
      </div>
    
    </div>

        <div class="product">
        <div class="container">
            <div class="spec ">
                <h3>Products</h3>
                <div class="ser-t">
                    <b></b>
                    <span><i></i></span>
                    <b class="line"></b>
                </div>
            </div>
                <div class=" con-w3l agileinf">
                            <?php 


                               $qname= $_GET['name'];
                                $q2= "SELECT * FROM products WHERE product_cat =(SELECT cat_id FROM categories WHERE cat_name='$qname') ";
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


