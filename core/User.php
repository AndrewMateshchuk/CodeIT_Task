<?php

class User                                      //Класс для работы с пользователем
{
    protected $userData = [];
    public function __construct($userData)
    {
        $this->userData = $userData;
    }
    public function get(){
        return $this->userData;
    }
    public function validate($pdo, $errors){   //Валидация данных
        foreach ($this->userData as $key => $value) {
            $errors[$key]  = Validator::test($pdo, $key, $value);
            if($key == 'password' || $key == 'timestamp') continue;
            setcookie("$key", Validator::test_input($_POST["$key"]));
        }
        return $errors;
    }
    public function registrate($pdo){           //Регистрация
        $this->userData['timestamp'] = time();
        $this->userData['password'] = md5(md5($this->userData['password']));
        Query::registration($pdo, $this->userData); //Обращение к БД
        session_start();
        $_SESSION['email'] = $this->userData['email'];  //Авторизация
        $_SESSION['name'] = $this->userData['name'];
        foreach ($this->userData as $key => $value){    //Убираем куки
            if($key == 'password' || $key == 'timestamp') continue;
            setcookie("$key", "", time() - 3600);
        }
        echo "<script>location.replace('home')</script>"; //"Личный кабинет"
    }
    public static function login($pdo, $data){ //Авторизация
        $data['password'] = md5(md5($data['password']));
        $result = Query::checkUser($pdo, $data);
        if($result[0] != "" && $result[1] != ""){
            session_start();
            $_SESSION['email'] = $result['email'];
            $_SESSION['name'] = $result['name'];
        }else{
            echo "<script>location.replace('home?error=Неверные данные')</script>";
        }
    }
}