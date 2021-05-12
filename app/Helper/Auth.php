<?php namespace App\Helper;


use App\Contracts\AuthInterface;
use App\Model\DB;
use App\model\Task;
use App\model\User;

class Auth implements AuthInterface
{

    /**
     * @throws \Exception
     */
    public static function login($user, $remember = false)
    {
        session()->set('email', $user->email);
        if($remember == true){
            $rememberToken = random(240);
            (new User())->update($user->id, [
                'remember_token' => $rememberToken
            ]);
            cookie()->set('remember_token', $rememberToken);
        }
        return true;
    }

    public static function check()
    {
        if(session('email')){
            $user = (new User())->find('email', session('email'));
            if ($user)
                return true;
            session()->forget('email');
        }
        elseif (cookie()->exists('remember_token')){
            $remember_token = cookie('remember_token');
            $user = (new User())->find('remember_token' , $remember_token);
            if(!user)
                return false;
            session()->set('email', $user->email);
            return true;
        }
        return false;
    }

    public static function logout()
    {
        if(cookie()->exists('remember_token')) {
            cookie()->forget('remember_token');
            redirect();
        }
        session_destroy();
        redirect();
    }

    public static function user()
    {
        return (new User())->find('email', session('email'));
    }

    public static function task($taskID)
    {
        return (new Task())->find('id', $taskID);
    }
}