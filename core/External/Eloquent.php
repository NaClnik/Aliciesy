<?php

namespace Core\External;

use Config\ConnectionConfig;
use Illuminate\Database\Capsule\Manager as Capsule;

class Eloquent
{
    public function boot()
    {
        $capsule = new Capsule();

        $capsule->addConnection((new ConnectionConfig())->getConfig());

        $capsule->bootEloquent();
    } // boot.
}