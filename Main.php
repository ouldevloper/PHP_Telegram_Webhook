<?php
/**
 * Author : Abdellah Oulahyane
 * source : https://github.com/ouldevloper
 */
namespace App\Telegram;

use App\Telegram\WebHooks\PollWebHook;

class Main
{
    public final function index():mixed
    {
        $input = file_get_contents("php://input");
        $data  = json_decode($input, true);
        return (new PollWebHook())->run($data);
    }
}
