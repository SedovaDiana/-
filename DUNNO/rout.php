<?php
include 'db_connect.php';
$route = trim($_GET['route']);
$url = explode("/", $route);

$random = rand(10000,99999);

if(!isset($_COOKIE['basket_id'])){
setcookie("basket_id", "$random",time()+60*60*24*30);
}

if($url) {
} else {
  include 'index.php';
}

switch (count($url)) {
    case 0:
        include 'index.php';
        break;
    case 1:
        $result = $db->query("SELECT EXISTS(SELECT 1 FROM categories WHERE namean = '$url[0]')");
        $exists = $result->fetch();
            if($exists[0] == 1){
              include 'categorii.php';
              break;
            }
            if($url[0]=='about'){
              include 'about.php';
              break;
            }
            if($url[0]=='delivery-and-payment'){

            }
            if($url[0]=='basket'){
              include 'basket.php';
              break;
            }
            if($url[0]=='adminlog'){
              include 'admin_log.php';
              break;
            }
            if($url[0]=='adm-panel'){
              include 'adm-panel.php';
              break;
            }

    case 2:
        $result = $db->query("SELECT EXISTS(SELECT 1 FROM categories WHERE namean = '$url[0]')");
        $exists = $result->fetch();
          if($exists[0] == 1){
              $result = $db->query("SELECT EXISTS(SELECT * FROM products WHERE number = '$url[1]')");
              $exists = $result->fetch();
                if($exists[0] == 1){
                  include 'product.php';
                  break;
         }
       }

    default:
       include 'error404.php';
}

?>
