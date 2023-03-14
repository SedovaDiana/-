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

<style>

.adm{
  height: auto;
  display: flex;
  padding: 30px;
  flex-wrap: wrap;
  flex-direction: column;
  align-content: space-around;
  justify-content: space-between;
}
.block{
  display: block;
  flex-wrap: wrap;
  margin: 10px;
  height: 150px;
  width: 400px;
  text-align: center;
  vertical-align: middle;
  border: 3px solid #eaeaea;
  box-shadow: 0 0 10px 5px rgba(221, 221, 221, 1);
}
.adm h2{
    width: 100%;
    font-size: 30px;
    font-weight: 800;
    text-align: center;
    margin: 0;
    padding-bottom: 30px;
}
.blocks{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    align-content: center;
}

</style>

</head>
  <body>
      <div class="border">
      <?php include 'header.php'; ?>
      <main>
          <?php include 'cat.php'; ?>

          <div class="adm fonts">
                <h2>Администраторская панель</h2>
                <div class="blocks">
                <div class="block">
                  <h3>Добавить товар</h3>
                </div>
                <div class="block">
                  <h3>Добавить категорию</h3>
                </div>
                <div class="block">
                  <h3>Редактировать товар</h3>
                </div>
                <div class="block">
                  <h3>Скрыть/удалить товар</h3>
                </div>
                <div class="block">
                  <h3>Просмотр заказов</h3>
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

</html>
