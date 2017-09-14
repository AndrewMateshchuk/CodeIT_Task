<?php
                    //Класс с запросами в БД
class Query {
    protected static $queries = [
      'registration' => [
          'query' => 'INSERT INTO users (email, login, name, password, birthDate, country, timestamp) 
                               VALUES (:email, :login, :name, :password, :birthDate, :selectedCountry, :timestamp)',
          'error' => 'registration?error=database&errorValue=Упс, что-то пошло не так, регистрация не удалась'
      ],
      'checkCountry' => [
          'query' => 'SELECT country FROM countries WHERE country = ?',
          'error' => 'registration?error=database&errorValue=Упс, что-то пошло не так, регистрация не удалась'
      ],
      'checkUser' => [
          'query' => 'SELECT email, name FROM users  WHERE(login = :email OR email = :email) AND password = :password',
          'error' => 'home?error=Упс, что-то пошло не так, авторизация не удалась'
      ]
    ];
    public static function preparedQuery($pdo, $query, $data){
        $stmt = $pdo->prepare(self::$queries[$query]['query']);
        if(!$stmt->execute($data)) {
            echo "<script>location.replace(".self::$queries[$query]['error']."])</script>";
            die();
        }else{
            return $stmt->fetch();
        }
    }
    public static function registration($pdo, $userData) //Регистрация пользователя
    {
            self::preparedQuery($pdo, 'registration', $userData);
    }
    public static function checkCountry($pdo, $country){           //Проверить есть ли страна в БД
            return self::preparedQuery($pdo,'checkCountry', array($country))[0];
    }
    public static function checkUser($pdo, $userData){     //Проверка пользователя
            return self::preparedQuery($pdo, 'checkUser', $userData);
    }
    public static function checkUnique($pdo, $key, $value){         //Проверка уникльности для email или логина
        $stmt = $pdo->prepare('SELECT '.$key.' FROM users WHERE '.$key.' = ?');
        if($stmt->execute(array($value))){
            return $stmt->fetch()[0];
        }else{
            echo "<script>location.replace(".self::$queries['registration']['error'].")</script>";
            die();
        }
    }
    public static function getCountries($pdo, $selectedCountry){ //Получить список всех стран
        $countries = "";
        foreach($pdo->query('SELECT country from countries') as $country) {
            $countries .= $country[0] == $selectedCountry ? "<option value='$country[0]' selected>$country[0]</option>"
                : "<option value='$country[0]'>$country[0]</option>";
        }
        return $countries;
    }
}
