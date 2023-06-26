<?php

namespace App\controllers;

use App\controllers\View; 

class Page{
    public static function getHeader(){
        return View::sendUrl('header');
    }

    public static function getFooter(){
        return View::sendUrl('footer');
    }

    public static function getPage($content){
        return View::sendUrl('page', [
            'title' => 'WORK-PROJECT',
            'content' => $content,
            'header' => self::getHeader(),
            'footer' => self::getFooter(),
        ]);
    }
}