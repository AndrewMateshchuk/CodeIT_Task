<?php

class Router       //Класс для редиректа
{
    protected $routes = [];
    public function define($routes){
        $this->routes = $routes;
    }
    public function direct($uri, $method){
        if(array_key_exists($uri, $this->routes[$method])){
            return $this->routes[$method][$uri];             //Возвращает страницу по запрошеному адресу
        }
        echo "<h2 style='text-align: center'>Запрашиваемая Вами страница не найдена</h2>";
        echo "<h2 style='text-align: center'><a href='home'>Домой</a></h2>";
        die();
    }
}