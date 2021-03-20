<?php

namespace Core\External;

use Illuminate\Database\Capsule\Manager as Capsule;

class Eloquent
{
    public function boot()
    {
        $capsule = new Capsule();

        $capsule->addConnection(require_once __ . 'connection.php');

    } // boot.
}