<?php

namespace App\Telegram\Commands;

use App\Services\PollService;
use App\Telegram\API\BotMethod;
use App\Telegram\Interfaces\IBotCommand;

class Start implements IBotCommand
{

    public final function handle(): mixed
    {

        return (new BotMethod())
            ->setMethodName('/sendMessage')
            ->setParameter('chat_id', '12445')
            ->setParameter('text', 'Start Method')
            ->send();
    }
}
