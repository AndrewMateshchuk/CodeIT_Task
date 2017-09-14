<?php
//Регистрация пользователя

$user = new User([              //Обьект пользователя
    'email' => Validator::test_input($_POST['email']),
    'login' => Validator::test_input($_POST['login']),
    'name' => Validator::test_input($_POST['name']),
    'password' => Validator::test_input($_POST['password']),
    'birthDate' => Validator::test_input($_POST['birthDate']),
    'selectedCountry' => Validator::test_input($_POST['selectedCountry']),
    'timestamp' => ""
]);
// Все ошибки храним в ассоциативном массиве
$errors = [
    'database' => "",
    'email' => "",
    'login' => "",
    'name' => "",
    'password' => "",
    'birthDate' => "",
    'country' => "",
];
try {
    $errors = $user->validate($pdo, $errors);
}catch (Exception $e){
    $errors['database'] = 'Что-то пошло не так, регистрация не удалась)';
}
foreach ($errors as $error => $val ) {
    if($val != ""){
        echo "<script>location.replace('registration?error=".$error."&errorValue=".$val."')</script>";
        die();
    }
}
$user->registrate($pdo);