<?php
//Авторизация
$email = $_POST['email'];
setcookie('login_email', $email);
$password = $_POST['password'];
User::login($pdo, ['email' => $email, 'password' => $password]);
setcookie('login_email', "", time() - 3600);
echo "<script>location.replace('home')</script>";