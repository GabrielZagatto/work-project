<?php

namespace App\models;

use PDO;

class Banco{

    public function query($sql){
        $connect = new PDO('mysql:host=127.0.0.1;port=3306;dbname=work-project', 'root', 'root');
        $stmt = $connect -> prepare($sql);
        $stmt -> execute();
        return $stmt -> fetchAll();
    }
}