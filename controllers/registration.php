<?php
//Форма регистрации
    $formData = [                               //Данные для заполнения формы
        'email' => $_COOKIE['email'],
        'login' => $_COOKIE['login'],
        'name' => $_COOKIE['name'],
        'birthDate' => $_COOKIE['birthDate'],
        'selectedCountry' => $_COOKIE['selectedCountry'],
        'countries' => Query::getCountries($pdo, $_COOKIE['selectedCountry']),
    ];
    require "views/registration.view.php";


