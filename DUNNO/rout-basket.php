<?php
include "db_connect.php";

$basketid = $_POST['basketid'];
$action = $_POST['action'];
$number = $_POST['number'];
$num_orders = rand(100,999);

if (!strcmp($action,"add-to-basket")){
  $db->exec("INSERT INTO `basket` (`id_basket`, `number`, `count`, `stat`) VALUES ('$basketid','$number','0', '1')");
}

if (!strcmp($action,"del-to-basket")){
  $db->exec("DELETE FROM `basket` WHERE id_basket = '$basketid' AND number = '$number'");
}

// if (!strcmp($action,"add-orders")){
//   $OrderName = $_POST['usname'];
//   $OrderNumber = $_POST['usnumber'];
//   $Email = $_POST['email']
//
// //   $db->exec("INSERT INTO `orders`(`num_orders`,`id_basket`, `data`,`user_name`, `user_phone`, `user_email`) VALUES ('$num_orders','$basketid', CURRENT_TIMESTAMP(),'Анастасия','89669996699','anastasia6585@mail.ru')");
// }

 ?>
