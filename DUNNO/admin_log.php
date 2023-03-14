<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <link rel="stylesheet" href="/style.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Bellota:ital,wght@1,300&family=Comfortaa:wght@400;500&display=swap" rel="stylesheet">
<title>Канцелярский магазин "DUNNO"</title>
<style>
.login{
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

.form__login {
    width: 50%;
    border-radius: 25px;
    background-color: #fff;
    margin: 5px;
}

.form__login::placeholder {
    color: rgba(0, 0, 0, .4); /* подсказка в поле login */
}

.form__pass {
    width: 50%;
    border-radius: 25px;
    border: 1px solid rgba(255, 255, 255, .5);
    margin: 5px;
}

.form__checkbox {
    margin-top: 20px;
    display: flex;
    justify-content: center;
}
.form__toggle {
    position: absolute;
    opacity: 0;
    margin: 10px 0 0 20px;
}
.form__toggle + .form__label {
     position: relative;
     padding: 0 0 0 50px;
}
.form__toggle + .form__label:before {
    content: '';
    position: absolute;
    top: -4px;
    left: 0;
    border-radius: 25px;
    border: 1px solid #fff;
}
.form__toggle + .form__label:after {
    content: '';
    position: absolute;
    top: 1px;
    left: 5px;
    border-radius: 25px;
    background: rgba(255,255,255,.3);
}

.form__btn {
    width: 151px;
    height: 48px;
    margin: 25px auto;
    text-align: center;
    border-radius: 25px;
    border: 1px solid rgba(0, 0, 0, .3);
    background-color: transparent;
    font-size: 12px;
    text-align: center;
    color: rgba(0, 0, 0, .3);
    text-transform: uppercase;
    cursor: pointer;
    letter-spacing: 3px;
}

</style>

</head>
  <body>
      <div class="border">
      <?php include 'header.php'; ?>
      <main>
        <div class="login fonts">
        <h1>Вход</h1>
        <div class="form__inner">
      <input class="form__login" name="admin" id="admin" type="admin" placeholder="admin">
      <input class="form__pass" name="pass" type="password" minlength="5" maxlength="8" placeholder="Пароль" required title="минимально 5 символов">
      <div class="form__button">
              <input class="form__btn" type="submit" value="Войти" onclick="window.location.href = 'http://dunno/adm-panel';">
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
