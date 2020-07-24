<?php session_start();
ini_set('display_errors', 1);
  if (!isset($_SESSION['user'])) {
  header("location:admin.php");
}
 ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Admin Page</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/dashboard/">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


    <style>
        .fa-trash-alt,.fa-pencil-alt{
            color: #fff;
        }
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>
<nav class="navbar navbar-dark  bg-dark flex-sm-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">AK Grocery</a>
    <ul class="navbar-nav px-3">

        <?php
        if (isset($_SESSION['user'])) {
            ?>
            <li class="nav-item ">
                <a class="nav-link" href="./admin-logout.php">Sign out</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#change">Change Password</a>
            </li>
            <?php
        }

        ?>

        <div class="modal fade" id="change" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="update_del" enctype="multipart/form-data" method="post">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="col-12">
                                            <input type="password" name="old_password" placeholder="Enter Current Password">
                                        </div>
                                        <br>
                                        <div class="col-12">
                                            <input type="password" name="new_pass" placeholder="Enter New Password">
                                        </div>
                                        <br>
                                        <div class="col-12">
                                            <input type="password" name="c_new_pass" placeholder="Confirm New Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <input name="ch" type="submit" class="btn btn-primary add-category" value="Change Password">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
        if(isset($_POST['ch']))
        {
            include_once("./classes/Database.php");
            $db = new Database();
            $con = $db->connect();

            $uname= $_SESSION['user'];
            $old_pass= $_POST['old_password'];
            $new_pass= $_POST['new_pass'];
            $c_new_pass= $_POST['c_new_pass'];

            if($new_pass == $c_new_pass){
                $q2= $con->query("UPDATE admin SET password='$new_pass' WHERE email='$uname'");
                echo "<script type='text/javascript'>alert('Password Updated');</script>";
            }
            else{
                echo "<script type='text/javascript'>alert('Passwords Not Matched');</script>";
            }
        }

        ?>
    </ul>
</nav>
<div class="container-fluid">
  <div class="row">

      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
              <ul class="nav flex-column">

                  <?php


                  $uri = $_SERVER['REQUEST_URI'];
                  $uriAr = explode("/", $uri);
                  $page = end($uriAr);
                  $uname= $_SESSION['user'];

                  if($uname == 'karwan@gmail.com'){

                      ?>


                      <li class="nav-item">
                          <a class="nav-link <?php echo ($page == '' || $page == 'admin-index.php') ? 'active' : ''; ?>" href="./admin-index.php">
                              <span data-feather="home"></span>
                              Dashboard <span class="sr-only">(current)</span>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link <?php echo ($page == 'customer_orders.php') ? 'active' : ''; ?>" href="./customer_orders.php">
                              <span data-feather="file"></span>
                              Orders
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link <?php echo ($page == 'products.php') ? 'active' : ''; ?>" href="./products.php">
                              <span data-feather="shopping-cart"></span>
                              Products
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link <?php echo ($page == 'brands.php') ? 'active' : ''; ?>" href="./brands.php">
                              <span data-feather="shopping-cart"></span>
                              Brands
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link <?php echo ($page == 'categories.php') ? 'active' : ''; ?>" href="./categories.php">
                              <span data-feather="shopping-cart"></span>
                              Categories
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link <?php echo ($page == 'customers.php') ? 'active' : ''; ?>" href="./customers.php">
                              <span data-feather="users"></span>
                              Customers
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link <?php echo ($page == 'delivery.php') ? 'active' : ''; ?>" href="./delivery.php">
                              <span data-feather="truck"></span>
                              Deliveries
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link <?php echo ($page == 'payments.php') ? 'active' : ''; ?>" href="./payments.php">
                              <span data-feather="dollar-sign"></span>
                              Payments
                          </a>
                      </li>
                  <?php }
                  else {?>

                      <li class="nav-item">
                          <a class="nav-link <?php echo ($page == '' || $page == 'admin-index.php') ? 'active' : ''; ?>" href="./admin-index.php">
                              <span data-feather="home"></span>
                              Dashboard <span class="sr-only">(current)</span>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link <?php echo ($page == 'customer_orders.php') ? 'active' : ''; ?>" href="./customer_orders.php">
                              <span data-feather="file"></span>
                              Orders
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link <?php echo ($page == 'products.php') ? 'active' : ''; ?>" href="./products.php">
                              <span data-feather="shopping-cart"></span>
                              Products
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link <?php echo ($page == 'brands.php') ? 'active' : ''; ?>" href="./brands.php">
                              <span data-feather="shopping-cart"></span>
                              Brands
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link <?php echo ($page == 'categories.php') ? 'active' : ''; ?>" href="./categories.php">
                              <span data-feather="shopping-cart"></span>
                              Categories
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link <?php echo ($page == 'delivery.php') ? 'active' : ''; ?>" href="./delivery.php">
                              <span data-feather="truck"></span>
                              Deliveries
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link <?php echo ($page == 'customers.php') ? 'active' : ''; ?>" href="./customers.php">
                              <span data-feather="users"></span>
                              Customers
                          </a>
                      </li>
                  <?php } ?>
              </ul>


          </div>
      </nav>


      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <h1 class="h2">Hello <?php echo $_SESSION['user']; ?></h1>

          </div>
      <div class="row">
      	<div class="col-10">
      		<h2>Orders</h2>
      	</div>
        <?php 
        include_once("./classes/Database.php");
        $uname= $_SESSION['user'];
        $db = new Database();
        $con = $db->connect();
        if($uname != 'karwan@gmail.com'){
        $query = $con->query("SELECT product_qty, product_price FROM orders WHERE admin_name='$uname' AND  delivery_status !='Returned'");
        $total= 0;
        if (@$query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {
          $total= $total + $row['product_qty']*$row['product_price'];
        }
      }
    }
    else{
      $query = $con->query("SELECT product_qty, product_price, shipping_method FROM orders WHERE delivery_status !='Returned'");
        $total= 0;
        if (@$query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {
          if($row['shipping_method'] == 'Normal'){$var= 50;}
          elseif ($row['shipping_method'] == 'Express') {$var= 100;}
          $total= $total + $row['product_qty']*$row['product_price'] + $var;
        }
      }
    }
        ?>
       <div class="col-1">
          <h2>Total <?php echo $total; ?></h2>
        </div>
      </div>



      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Image</th>
              <th>Product Name</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Order Id</th>
              <th>Payment Status</th>
              <th>Order Date</th>
              <th>admin Name</th>
              <th>Buyer Name</th>
              <th>Buyer Phone</th>
              <th>Shipping Method</th>
              <th>Delivery Status</th>
            </tr>
          </thead>
          <tbody id="customer_order_list">
           
          </tbody>
        </table>
        <?php if($uname != 'karwan@gmail.com'){?>
        <div class="text-center text-danger mb-5">
          <form method="post">
        <button name="deliver" class="btn btn-success" onclick="deliver()">Request Delivery</button>
        <a href="#" data-toggle="modal" data-target="#update" class="btn btn-info btn-md">Update Delivery</a>
      </form>
      </div>
        <?php }?> 
      </div>
    </main>
  </div>
</div>

<?php
$q3= "SELECT * FROM admin WHERE email='$uname'";
$data3= mysqli_query($con, $q3);
while($res3= mysqli_fetch_assoc($data3)){
  $sname= $res3['username'];
  $sphone= $res3['phone'];
}
if(isset($_POST['deliver'])){
  $q2= "SELECT * FROM delivery ";
  $data2= mysqli_query($con, $q2);
  while($res2= mysqli_fetch_assoc($data2)){
    $del= $res2['email'];
   }
}
?>
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Delivery</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="update_del" enctype="multipart/form-data" method="post">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label>Select Order ID</label>
                <select class="form-control brand_list" name="order_id">
                  <?php $q2= "select distinct(payment_id) from orders where admin_name='$uname' and delivery_status = 'ND'";
                  $data2= mysqli_query($con, $q2);
                  while($res2= mysqli_fetch_assoc($data2)){
                ?>
                  <option value=<?php echo $res2['payment_id']; ?>><?= $res2['payment_id']; ?></option>
                <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Select Delivery Boy/Company</label>
                <select class="form-control brand_list" name="del_guy">
                  <?php $q2= "SELECT * FROM delivery ";
                  $data2= mysqli_query($con, $q2);
                  while($res2= mysqli_fetch_assoc($data2)){
                ?>
                  <option value=<?php echo $res2['username']; ?>><?= $res2['username']; ?></option>
                <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-12">
              <input name="deli" type="submit" class="btn btn-primary add-category" value="Update Delivery">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php 
if(isset($_POST['deli']))
{
  $order_id= $_POST['order_id'];
  $name= $_POST['del_guy'];

  $q2= $con->query("UPDATE orders SET delivery_status='$name' WHERE payment_id='$order_id' AND admin_name='$uname'");
  echo "<script type='text/javascript'>alert('Delivery Updated');</script>";
}

?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



<script type="text/javascript" src="js/customers.js"></script>