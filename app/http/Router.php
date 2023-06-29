<?php

namespace App\http;
use \Closure;
use \Exception;

class Router{
    
    private $url = '';

    private $prefix = '';

    private $routes = [];

    private $request;

    public function __construct($url){
        $this->request = new Request();
        $this->url = $url;
        $this->setPrefix();
    }

    private function setPrefix(){
        $parseUrl = parse_url($this->url);
        $this->prefix = $parseUrl['path'] ?? '';
    }

    public function get($route, $params = []){
        return $this->addRoute('GET', $route, $params);
    }

    private function addRoute($method, $route, $params = []){
        foreach($params as $key => $values){
            if($values instanceof Closure){
                $params['controller'] = $value;
                unset($params[$key]);
            }
        }
        //padrao de validaçao da url
        $patternRoute = '/^'.str_replace('/', '\/', $route).'$';

        //adiciona a rota dentro da classe
        $this->routes[$patternRoute][$method] = $params;
    }

    //executa a rota atual
    public function run(){
        try{
            //obtem a rota atual
            $route = $this->getRoute();
        }catch(Exception $e){
            return new Response($e->getCode(), $e->getMessage());
        }
    }

}