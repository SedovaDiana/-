<?php

    include('db_connect.php');
    if (isset($_POST['login'])) {
        $admin = $_POST['admin'];
        $password = $_POST['password'];
        $query = $connection->prepare("SELECT `login`, `pass` FROM admin WHERE admin=:admin");
        $query->bindParam("admin", $admin, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            echo '<p class="error">Неверные пароль или имя пользователя!</p>';
        } else {
            if (password_verify($password, $result['password'])) {
                $_COOKIE['cookie'] = $result['id'];
                echo '<p class="success">Поздравляем, вы прошли авторизацию!</p>';
            } else {
                echo '<p class="error"> Неверные пароль или имя пользователя!</p>';
            }
        }
    }
?>
