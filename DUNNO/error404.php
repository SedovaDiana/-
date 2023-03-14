<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <link rel="stylesheet" href="/style.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Bellota:ital,wght@1,300&family=Comfortaa:wght@400;500&display=swap" rel="stylesheet">
<title>Цветочный магазин "Lilium"</title>
<style>
.error{
  display: flex;
  position: relative;
  margin: 30px 150px auto 150px;
  height: 500px;
  width: 900px;
  border: 3px solid #f1f1f1;
  box-shadow: 0 0 10px 5px rgba(221, 221, 221, 1);
  text-align: center;
  flex-direction: column;
  justify-content: space-evenly;
  background: #f1f1f1;
}
.error h1{
  text-align: center;
  font-size: 60px;
  text-decoration: underline #fc6c85;
}
</style>

</head>
  <body>
      <div class="border">
      <?php include 'header.php'; ?>
      <main>
        <div class="error fonts">
        <h1>Ошибка 404</h1>
        <h2>
          Ошибка 404 означает, что страница, которую Вы запрашиваете, не существует.
          <br>Возможно, она была удалена, возможно, Вы набрали неправильный адрес.
        </h2>
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
