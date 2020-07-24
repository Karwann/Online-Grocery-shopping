<?php session_start(); 
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
            include_once("../classes/Database.php");
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
    <?php
    $admin = $_SESSION['user'];
    ?>
    <script type="text/javascript">
    var admin = '<?php echo $_SESSION["user"]; ?>';
        </script>

<?php 
        if($admin !='karwan@gmail.com'){
      ?>


      <div class="row">
      	<div class="col-10">
      		<h2>Available Brands</h2>
      	</div>

      </div>
      
      

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
           </tr>
          </thead>
          <tbody id="brand_list">

          </tbody>
        </table>
      </div>

    <?php 
      }
    else{ 
      ?>

      <div class="row">
        <div class="col-10">
          <h2>Available Brands</h2>
        </div>
        <div class="col-2">
          <a href="#" data-toggle="modal" data-target="#add_brand_modal" class="btn btn-primary btn-sm">Add Brand</a>
        </div>
      </div>
      
            <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="brand_list">
           </tbody>
        </table>
      </div>

    <?php 
    }
    ?>
    </main>
  </div>
</div>



 <div class="modal fade" id="add_brand_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add-brand-form" enctype="multipart/form-data">
        	<div class="row">
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Brand Name</label>
		        		<input type="text" name="brand_title" class="form-control" placeholder="Enter Brand Name">
		        	</div>
        		</div>
        		<input type="hidden" name="add_brand" value="1">
        		<div class="col-12">
        			<button type="button" class="btn btn-primary add-brand">Add Brand</button>
        		</div>
        	</div>
        	
        </form>
      </div>
    </div>
  </div>
</div>
 <div class="modal fade" id="edit_brand_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit-brand-form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-12">
              <input type="hidden" name="brand_id">
              <div class="form-group">
                <label>Brand Name</label>
                <input type="text" name="e_brand_title" class="form-control" placeholder="Enter Brand Name">
              </div>
            </div>
            <input type="hidden" name="edit_brand" value="1">
            <div class="col-12">
              <button type="button" class="btn btn-primary edit-brand-btn">Update Brand</button>
            </div>
          </div>
          
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



<script type="text/javascript" src="js/brands.js"></script>