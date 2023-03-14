<?php
include 'db_connect.php';

    $type=0;
    $sections=[];

    if ($query = $db->query("SELECT * FROM categories ORDER BY name")){
      $infoProduct = $query->fetchAll(PDO::FETCH_ASSOC);
    } else {
      print_r($db->errorInfo());}


    // Загружаем разделы
    if ($query = $db->query("SELECT namean, name, num FROM categories ORDER BY name")){
        $sections = $query->fetchAll(PDO::FETCH_ASSOC);
    } else {
        print_r($db->errorInfo());}

        $url = $_SERVER['REQUEST_URI'];
        $url = explode('/', $url);
        $Number = $url[2];

        foreach ($sections as $section):
          if (strcasecmp($section['namean'], $Page) == 0){
            $PageTitle = $section['name'];
            $SectionNum = $section['num'];
          }
        endforeach;

        // Загружаем товар
        if ($query = $db->query(" SELECT * FROM products WHERE number = ".$Number." ")){
            $products = $query->fetchAll(PDO::FETCH_ASSOC);
        } else {
            print_r($db->errorInfo());}


?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="/style.css" type="text/css">
<link href="https://fonts.googleapis.com/css2?family=Bellota:ital,wght@1,300&family=Comfortaa:wght@400;500&display=swap" rel="stylesheet">
<title>Цветочный магазин "Lilium"</title>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script>
function change(objName, min, max, step) {
var obj = document.getElementById(objName);
var tmp = +obj.value + step;
if (tmp<min) tmp=min;
if (tmp>max) tmp=max;
obj.value = tmp;

}

</script>

</head>
  <body>
      <div class="border">
      <?php include 'header.php'; ?>
      <main>
          <?php include 'cat.php'; ?>

          <div class="content fonts">
              <div class="product_item">
                <?php foreach ($products as $product): ?>
                    <h2><?php echo $product['name_prod']; ?></h2>
                <div class="prod">
                <div class="prod_photo_info">
                  <?php if (!is_null($product['photo'])) { ?>
                      <img href="<?php echo $SectionNameAn; ?>/<?php echo $product['number']; ?>" src="<?php echo $product['photo']; ?>" alt="">
                <?php  } else {?>
                    <img src="/image/no-image.jpg" alt="">
                  <?php  } ?>
              </div>

            </div>
            <div class="but_pri">

              <input id="add-to-cart" class="button" type="submit" value="Добавить в корзину" name="Button" data-number= "<?php echo $product['number']; ?>">

            <div class="price">
              <a>  <?php echo $product['retail_price'] ?> руб. </a>
            </div>


            </div>
          </div>
              </div>
              <?php endforeach; ?>
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
    console.log(number);
    $.ajax({
    url:"/rout-basket.php",
    type: "POST",
    data: {
      action: "add-to-basket",
      basketid: <?php echo $_COOKIE['basket_id'] ?>,
      number: number
    }
  });
  });
  </script>
</html>
