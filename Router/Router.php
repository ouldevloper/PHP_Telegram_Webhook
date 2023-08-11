<?php

namespace App\Telegram\Router;


use App\Telegram\Commands\Start;
use App\Telegram\Interfaces\IBotCommand;

class Router
{

    private array $container = [];
    private array $params    = [];

    public function __construct()
    {
        $this->register('/start',     Start::class);
       
    }

    public final function get(string  $key):?string
    {
        return array_key_exists($key, $this->container) ? $this->container[$key] : '';
    }

    public final function register(string $key, string $class):void
    {
        if(is_subclass_of((new $class), IBotCommand::class))
        {
            $this->container[$key] = $class;
        }
    }

    public final function parse(string $key, string $class):bool
    {
        return false;
    }
    public final function routes():array
    {
        return $this->container;
    }
}
