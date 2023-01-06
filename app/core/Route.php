<?php
declare (strict_types = 1);
namespace App\Core;


class Route
{
   public $post =[];
   public $get =[];

   public $instance;

   public function getInstance()
   {
      return $this->instance = new static;
   }

   private function add(string $name, string $path, string $type):void
   {
      if($type == 'post')
      {
         $this->post[$name] = $path;

      }

      else{
         $this->get[$name] = $path;
      }
   }
   
   public function get(string $name, string $path)
   {
      $this->add($name,$path,'get');

   }

   public function post(string $name, string $path)
   {
      $this->add($name,$path,'post');

   }

   function routes(string $method):array
   {
      if($method=='GET'){
         return $this->get;
      }

      return $this->post;

   }
   

}
