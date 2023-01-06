<?php

namespace App\Core;

use App\Core\Route;

class RouteBuilder
{
  public static $instance;

  public static function __callStatic($method, $args)
  {
     if(!isset(Self::$instance)){
         Self::$instance = (new Route)->getInstance();
     }

      return Self::$instance->$method(...$args);
  }

}