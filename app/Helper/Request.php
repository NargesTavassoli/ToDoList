<?php namespace App\Helper;


use App\Contracts\RequestInterface;

class Request implements RequestInterface
{

    public function input($filed, $post = true)
    {
        if($this->isPost() && $post)
            return isset($_POST[$filed]) ? htmlspecialchars($_POST[$filed]) : "";

        return isset($_GET[$filed]) ? htmlspecialchars($_GET[$filed]) : "";

    }

    public function all($post = true)
    {
        if($this->isPost() && $post)
            return isset($_POST) ? array_map('htmlspecialchars' , $_POST) : null;

        return isset($_GET) ? array_map('htmlspecialchars' , $_GET)  : null;
    }

    public function isPost()
    {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }
}