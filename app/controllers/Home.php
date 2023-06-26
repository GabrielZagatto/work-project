<?php

namespace App\controllers;

use App\controllers\View;

class Home extends Page{
    public static function getHome(){
        $homeContent = View::sendUrl('login',[
            'name' => 'Gabriel',
            'email' => 'gabriel@gabriel'
        ]);
        return parent::getPage($homeContent);
    }
}