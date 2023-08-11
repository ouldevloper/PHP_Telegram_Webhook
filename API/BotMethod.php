<?php

namespace App\Telegram\API;

use App\Telegram\Interfaces\IBotMethodBuilder;
use Illuminate\Support\Facades\Http;

class BotMethod implements IBotMethodBuilder
{

    private array  $params = [];
    private string $methodName = '';


    public final function send(): mixed
    {
        $url = env(key: "TELEGRAM_BOT_LINK").$this->methodName;
        $request = Http::post($url, $this->params);
        return json_decode($request->body(), true);
    }

    public final function setMethodName(string $methodName): IBotMethodBuilder
    {
        $this->methodName = $methodName;
        return $this;
    }

    public final function setParameter(string $key, mixed $value): IBotMethodBuilder
    {
        $this->params[$key] = $value;
        return $this;
    }

    public final function setParameters(array $params): IBotMethodBuilder
    {
        $this->params = [...$this->params, ...$params];
        return $this;
    }
}
