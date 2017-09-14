<?php
    session_start();   //Для выхода, отправляем запрос на унитожение сессии, через GET по ссылке
    if($_GET['session'] == 'destroy' && isset($_SESSION['email']) && isset($_SESSION['name'])){
        session_destroy();
        echo "<script>location.replace('home');</script>";
        die();
    }else{
        require "views/index.view.php";
    }
?>