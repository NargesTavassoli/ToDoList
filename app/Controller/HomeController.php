<?php namespace App\controller;

use App\model\DB;
use App\model\User;

class HomeController {
    public function index()
    {
        $user = new User();
       // var_dump($db->select());
       var_dump( $user->select('email', 'name')->first());die;

    }
}