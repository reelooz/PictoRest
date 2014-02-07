<?php
namespace pictorest\Base;
use Illuminate\Database\Capsule\Manager as Capsule;

class App {

    public static function EloConfig(){
        $capsule = new Capsule();
        $capsule->addConnection(array(
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'pictorestbdd',
            'username'  => 'root',
            'password'  => '',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => ''
            ));
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}