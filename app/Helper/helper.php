<?php
function dd(...$input)
{
    foreach($input as $value){
        dump($input);
    }
    die();
}
function dump(...$input)
{
    echo "<pre>";

    foreach($input as $key=>$value){
        var_dump($value);
    }

    echo "</pre>";
}

function route(string $string)
{
    header("Location:" . "http" . "://$_SERVER[HTTP_HOST]$string");
}
