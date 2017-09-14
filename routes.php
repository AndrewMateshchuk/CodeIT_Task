<?php
//Инициализация всех доступных путей, с разделением по методам
$router->define([
    'GET' => [
        '' => 'controllers/index.php',
        'home' => 'controllers/index.php',
        'registration' => 'controllers/registration.php',
    ],
    'POST' => [
        'registration' => 'controllers/signUp.php',
        'signIn' => 'controllers/signIn.php',
    ]]
);