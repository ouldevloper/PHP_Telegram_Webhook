<?php

namespace App\Telegram\Interfaces;

interface IBotCommand
{
    public function handle():mixed;
}