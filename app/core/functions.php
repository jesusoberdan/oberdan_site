<?php

function base_path($path)
{
    return dirname($path);

}

function app_path($path)
{
    return $path;
}

function dd($value)
{
    echo '<pre>';
    die(var_dump($value));
    echo '</pre>';   
}

function partial(string $name, string $path): void
{
    require  $path . "/views/{$name}.view.php";
}


