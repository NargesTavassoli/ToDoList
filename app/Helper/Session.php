<?php namespace App\Helper;


use App\Contracts\dataInterface;

class Session implements dataInterface
{

    public function exists($key)
    {
        return array_key_exists($key, $_SESSION);
    }

    public function get($key)
    {
        return $this->exists($key) ? $_SESSION[$key] : false;
    }

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function forget($key)
    {
        unset($_SESSION[$key]);
    }
}