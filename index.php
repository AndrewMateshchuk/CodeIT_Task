<?php
require "core/bootstrap.php";

$router = new Router;

require "routes.php";

$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');//Получаем uri и форматируем для
$uri = trim(strstr($uri, '/'), '/');// использования в роутере(второе если сайт не в корне)
$method = $_SERVER['REQUEST_METHOD'];
require $router->direct($uri, $method);//Подключаем файл который укажет роутер