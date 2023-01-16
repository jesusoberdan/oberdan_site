<?php

declare(strict_types=1);

namespace App\Core;

use App\Core\RouteBuilder;

class App
{
    protected string $base_path;

    public function __construct($path)
    {
        $this->base_path = $path;

    }
    

    public function run(): void
    {
        $this->serve_routes();
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