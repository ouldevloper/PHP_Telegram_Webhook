<?php

namespace App\Telegram\Interfaces;

interface IBotMethodBuilder
{
    public function send():mixed;
    public function setMethodName(string $methodName):IBotMethodBuilder;
    public function setParameter(string $key, mixed $value):IBotMethodBuilder;
}