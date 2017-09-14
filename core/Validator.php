<?php
class Validator {                                          //Класс для валидации данных пользователя
    public static function test($pdo, $type, $value)
    {
        switch ($type) {                     //Если данные не валидны -> возвращает ошибку и описание
            case 'email':
            case 'login':
                $isChecked = Query::checkUnique($pdo, $type, $value);
                if ($isChecked == "") {
                    if ($type == 'email') {
                        if (preg_match('/^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i', $value)
                            && strlen($value) > 7 && strlen($value) < 51) return "";
                    } else {
                        if (!preg_match('/([^a-zA-Z0-9-_])|[0-9-_]{2,}/', $value)
                            && strlen($value) > 4 && strlen($value) < 31) return "";
                    }
                } else {
                    return "Пользователь с таким $type уже существует!";
                }
                break;
            case 'name':
                if(strlen($value) > 4 && strlen($value) < 31
                   && !preg_match('/([^a-zA-Z0-9-_])/', $value)) return "";
                break;
            case 'password':
                if(strlen($value) > 7 && strlen($value) < 31
                   && !preg_match('/([^a-zA-Z0-9-_])|[-_]{2,}/', $value)) return "";
                break;
            case 'birthDate':
                if(preg_match('(\d\d\d\d-\d\d-\d\d)', $value)) return "";
                break;
            case 'selectedCountry':
                if(Query::checkCountry($pdo, $value) != "") return "";
                break;
            case 'timestamp': return "";
        }
        return "Некорректный $type";
    }
    public static function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}