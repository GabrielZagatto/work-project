<?php

require("vendor/autoload.php");

use App\http\Router;
use App\http\Response;
use App\controllers\Home;

$obRouter = new Router('http://localhost/work-project/work-project');
$obRouter->get('/', [function(){
    return new Response(200, Home::getHome());
}]);




/**
 * echo '<pre>';
 * var_dump($obResponse);
 * echo '</pre>';
 * echo Home::getHome();
 */