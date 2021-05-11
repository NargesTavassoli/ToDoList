<?php namespace App\Helper;


use App\Contracts\dataInterface;

class Cookie implements dataInterface
{

    public function exists($key)
    {
        return array_key_exists($key, $_COOKIE);
    }

    public function get($key)
    {
       return $this->exists($key) ? $_COOKIE[$key] : false;
    }

    public function set($key, $value, $time = '+30 day')
    {
        setcookie($key, $value, strtotime($time));
    }

    public function forget($key)
    {
        setcookie($key, '', strtotime('-5 day'), '/');
    }
}