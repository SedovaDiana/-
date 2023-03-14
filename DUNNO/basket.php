  <?php
  include "db_connect.php";

  $basketid = $_COOKIE['basket_id'];

  $query = $db->query(" SELECT * FROM basket WHERE  id_basket = '$basketid' ");
  $products = $query->fetchAll(PDO::FETCH_ASSOC);


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
    <style>
    .basket h1{
      border-bottom: 2px #20b2aa solid;
      margin-bottom: 15px;
    }
  </style>
  </head>
  <body>
    <div class="border">
      <?php include 'header.php'; ?>
      <main>
        <div class="basket fonts">
          <h1>Корзина</h1>
          <div class="basket_item" >
            <table class="pr_qua_del">
              <tbody>
                <?php foreach ($products as $product):
                  $number = $product['number'];
                  $query = $db->query(" SELECT * FROM `products` WHERE number =  '$number' ");
                  $InfoProduct = $query->fetchAll(PDO::FETCH_ASSOC);
                  foreach ($InfoProduct as $InfoProduct):  ?>
                  <tr id="<?php echo $InfoProduct['number'];  ?>">
                    <td>
                      <div class="item_photo" style="width: 200px; margin: 10px;">
                        <?php if (!is_null($InfoProduct['photo'])) { ?>
                          <img href="/<?php echo $SectionNameAn; ?>/<?php echo $InfoProduct['number']; ?>" src="<?php echo $InfoProduct['photo']; ?>" alt="">
                        <?php  } else {?>
                          <img src="/image/no-image.jpg" alt="">
                        <?php  } ?>
                      </div>
                    </td>
                    <td>
                      <div class="name_num">
                        <h2><?php echo $InfoProduct['name_prod']; ?></h2>
                        <span class="item_number">АРТ:
                          <span class="number" itemprop="number"><?php echo $InfoProduct['number']; ?></span>.
                        </span>
                      </div>
                    </td>
                    <td class="prise" style="width: 90px;">
                      <a><?php echo $InfoProduct['retail_price'] ?> руб.</a>
                    </td>
                   <td class="add">
                    <lable class="basker_kol" style="float: left; width: 75px;"><input class="inp_price" id="amount" type="text" value="1"/>шт.</lable>
                  </td>
                  <td class="del">
                    <input id="del-to-cart" class="button" type="submit" value="Удалить" name="Button" data-number= "<?php echo $InfoProduct['number']; ?>">
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endforeach; ?>
        </tbody>
      </table>

    </div>
    <div>
      <input id="add-orders" class="button" type="submit" value="Оформить заказ" name="Button" data-number= "<?php echo $InfoProduct['number']; ?>">

      <div class="left">
                    <h2>Данные заказчика</h2>
                    <div class="row">
                        <label>
                            ФИО заказчика
                          <input id="name" style="margin-top: 0; margin-bottom: 8px; width:100%; height:30px;"class="input_box" type="text" name="name">
                        </label>
                    </div>
                    <div class="row">
                        <label>
                              Телефон заказчика
                             <input id="number" style="margin-top: 0; margin-bottom: 8px; width:100%; height:30px;"class="input_box" type="text" name="number">
                        </label>
                    </div>
                    <div class="row">
                        <label>
                            E-mail заказчика
                            <input id="email" style="margin-top: 0; margin-bottom: 8px; width:100%; height:30px;"class="input_box" type="email" name="address" autocomplete="on">
                        </label>
                    </div>


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
    console.log(number);
    $.ajax({
      url:"/rout-basket.php",
      type: "POST",
      data: {
        action: "del-to-basket",
        basketid: <?php echo $_COOKIE['basket_id']; ?>,
        number: number
      }
    });
    var myElement = document.getElementById(number);
    myElement.remove();


  });
  $('.button').click(function(){
    number =  $(this).attr('data-number');
    console.log(number);
    UsName = form.elements['name'].value;
    UsNumber = form.elements['number'].value;
    Email = form.elements['email'].value;

    $.ajax({
      url:"/rout-basket.php",
      type: "POST",
      data: {
        action: "add-orders",
        basketid: <?php echo $_COOKIE['basket_id'] ?>,
        number: number,
        usname: UsName,
        usnumber: UsNumber,
        email: Email,
      }
    })
  });

  </script>
  </html>
