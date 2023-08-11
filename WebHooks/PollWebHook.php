<?php

namespace App\Telegram\WebHooks;

use App\Telegram\API\BotMethod;
use App\Telegram\Interfaces\BotClass;
use App\Telegram\Router\Router;

class PollWebHook
{
    public final function run(array $params):mixed
    {

        $router  = new Router();
        $command = $router->get($params["message"]["text"] ?? '');
        if (class_exists($command))
        {
            return (new $command)->handle();
        }else{
            return (new BotMethod())
                ->setMethodName('/sendMessage')
                ->setParameter('chat_id', 12345))
                ->setParameter('text', json_encode($params) .' Command Not Found!')
                ->send();
        }
    }
}
