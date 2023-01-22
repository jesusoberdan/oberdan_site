<?php

use App\Core\Container;
use App\Core\Database;

$container = new Container();

$container->bind('App\Core\Database', function(){
   return  new Database("mysql:host=127.0.0.1;dbname=blog;port=3306",'root','');
});

$db= $container->resolve('App\Core\Database');

$posts = $db->query("select * from posts")
                                   ->all();
foreach($posts as $post)
{
    echo $post['title'] . PHP_EOL;
}

dd($db);