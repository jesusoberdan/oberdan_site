<?php

declare(strict_types=1);

namespace App\Core;

use App\Core\RouteBuilder;
use App\Core\Container;
use App\Core\Database;

class App
{
    protected string $base_path;
    protected Container $container;
    public Database $db;

    public function __construct($path)
    {
        $this->base_path = $path;
        $this->container = new Container();

    }
    

    public function run(): void
    {
        $this->setContainer();
        $this->serve_routes();
    }

    private function setContainer()
    {
        $this->container->bind(Database::class, function(){
            return  new Database("mysql:host=127.0.0.1;dbname=blog;port=3306",'root','');
         });

         $this->db = $this->make(Database::class);
    }

    public function make($key)
    {
       return $this->container->resolve($key);
    }

    public function base_path(): string
    {
        return $this->base_path;
    }


    private function serve_routes(): void
    {
            include $this->base_path() . "/routes/web.php";
            $method = $_SERVER['REQUEST_METHOD'];


            $routes = RouteBuilder::routes($method);

            // Recibir la solicitud
            $uri = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);


            if(array_key_exists($uri,$routes)){

            require $this->base_path() . "/app/controllers/$routes[$uri]Controller.php";
            }
            else{
            echo "PAGE NOT FOUND";
            }
    }

}