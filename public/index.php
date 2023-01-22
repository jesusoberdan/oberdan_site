<?php

require dirname(__DIR__) . '/app/core/functions.php';

$base_path = base_path(__DIR__);
$app_path = app_path(__DIR__);


spl_autoload_register(fn($class)=> include $base_path . "/{$class}.php");


//require $base_path . '\bootstrap.php';


use App\Core\App;
use App\Core\RouteBuilder;
use App\Core\Database;

$app = new App(dirname(__DIR__));
$app->run();


//$db = new Database("mysql:host=127.0.0.1;dbname=blog;port=3306",'root','');

$posts = $app->db->query("select * from posts")
                                   ->all();
foreach($posts as $post)
{
    echo $post['title'] . PHP_EOL;
}




// Buscar el uri en las rutas

// llamar el archivo

// fin

