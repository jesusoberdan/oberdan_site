<?php

require dirname(__DIR__) . '/app/core/functions.php';

$base_path = base_path(__DIR__);
$app_path = app_path(__DIR__);


spl_autoload_register(fn($class)=> include $base_path . "/{$class}.php");


use App\Core\RouteBuilder;

include $base_path . "/routes/web.php";

$method = $_SERVER['REQUEST_METHOD'];


$routes = RouteBuilder::routes($method);

// Recibir la solicitud
$uri = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);


if(array_key_exists($uri,$routes)){

  require $base_path . "/app/controllers/$routes[$uri]Controller.php";
}
else{
  echo "PAGE NOT FOUND";
}


// Buscar el uri en las rutas

// llamar el archivo

// fin

