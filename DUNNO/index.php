<?php
include "db_connect.php";

$type=0;
$sections=[];
// Загружаем разделы
if ($query = $db->query("SELECT * FROM categories ORDER BY name")){
    $sections = $query->fetchAll(PDO::FETCH_ASSOC);
} else {
    print_r($db->errorInfo());}

    $url = $_SERVER['REQUEST_URI'];
    $url = explode('/', $url);
    $Page = $url[1];

    foreach ($sections as $section):
      if (strcasecmp($section['namean'], $Page) == 0){
        $PageTitle = $section['name'];
        $SectionNum = $section['num'];
        $SectionNameAn = $section['namean'];
      }
    endforeach;

  // Загружаем товары

  if ($query = $db->query(" SELECT * FROM products WHERE  hide = 1 ORDER BY name_prod ")){
      $products = $query->fetchAll(PDO::FETCH_ASSOC);
  } else {
      print_r($db->errorInfo());
  }

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <link rel="stylesheet" href="/style.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Bellota:ital,wght@1,300&family=Comfortaa:wght@400;500&display=swap" rel="stylesheet">
<title>Канцелярский магазин "DUNNO"</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
  <body>
      <div class="border">
      <?php include 'header.php'; ?>
      <main>
          <?php include 'cat.php'; ?>

          <div class="content fonts">
                <h2><?php echo $PageTitle ?></h2>
              <div class="content_item">
                <?php foreach ($products as $product):
                  $prod_num = $product['num'];
                  if ($query = $db->query(" SELECT namean FROM categories WHERE num = '$prod_num' ")){
                      $cat = $query->fetchAll(PDO::FETCH_ASSOC);
                  } else {
                      print_r($db->errorInfo());
                  }
                    ?>
                <div class="product fonts">
                  <?php foreach ($cat as $cat):?>
                      <a href="<?php echo $cat['namean']; ?>/<?php echo $product['number']; ?>" class="links">
                       <?php endforeach?>

                  <div class="pr_op" style="display: flex; align-items: center;">
                      <div class="photo">
                        <?php if (!is_null($product['photo'])) { ?>
                            <img src="<?php echo $product['photo']; ?>" alt="">
                      <?php  } else { ?>
                          <img src="/image/no-image.jpg" alt="">
                        <?php  } ?>

                    </div>
                      <h3> <?php echo $product['name_prod']; ?></h3>
                </div>
              </a>

                <div class="but_pri">
                <div class="fronts">
                <input id="add-to-cart" class="button" type="submit" value="Добавить в корзину" name="Button" data-number= "<?php echo $product['number']; ?>">
                </div>
                <div class="price">
                  <a>  <?php echo $product['retail_price'] ?> руб. </a>
                </div>
              </div>
                </div>
              <?php endforeach; ?>
              </div>
          </div>

      </main>
      </div>
       <div class= "background">
           <div class="bg-left"></div>
           <div class="bg-right"></div>
      </div>
      <?php include 'footer.php'; ?>
  </body>
  <script>
  $('.button').click(function(){
    number =  $(this).attr('data-number');

    $.ajax({
    url:"/rout-basket.php",
    type: "POST",
    data: {
      action: "add-to-basket",
      basketid: <?php echo $_COOKIE['basket_id'] ?>,
      number: number
    }
  });
      console.log(number);
  });
  </script>
</html>
