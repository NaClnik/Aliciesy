<?php

namespace Config;

use Core\Base\Interfaces\IConfig;

class ConnectionConfig implements IConfig
{
    public function getConfig(): array
    {
        return [
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'test',
            'username'  => 'root',
            'password'  => 'root',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]; // return.
    } // getConfig.
} // ConnectionConfig.