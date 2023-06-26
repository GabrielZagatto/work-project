<?php

namespace App\controllers;

class View{
    public static function getUrl($view){
        $url = __DIR__."/../views/".$view.".html";
        return file_exists($url) ? file_get_contents($url) : "Erro";
    }

    public static function sendUrl($view, $vars = []){
        $urlContent = self::getUrl($view);
        $key = array_keys($vars);
        $key = array_map(function($valor){
            return '{{'.$valor.'}}';
        }, $key);
        return str_replace($key, array_values($vars), $urlContent);
    }
    
}