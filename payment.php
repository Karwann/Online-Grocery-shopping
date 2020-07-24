<?php
session_start();

$cust_name= $_POST['cust_name'];
$allvalues= $_SESSION['karo'];
$total= $_POST['total_price'];
$delivery= $_POST['delivery'];


$some= json_decode($allvalues);

$sent= array();

$items = array();
foreach($some as $arr) {
    foreach($arr as $key => $value) {
        $items[$key] = $value;
    }

}
if($delivery == 1){
    $total= $total + 50;
}
elseif($delivery == 2) {
    $total= $total + 150;
}

$_SESSION['del']= $delivery;


    header("location:order_success.php");

?>