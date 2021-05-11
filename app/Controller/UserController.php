<?php namespace App\Controller;

use App\Helper\Auth;
use App\Model\DB;
use App\model\User;
use Illuminate\Support\Carbon;

class UserController extends Controller
{
    public function __construct()
    {
        if(checklogin()){
            redirect();
        }
    }

    public function register()
    {
        if(! request()->isPost())
            return;

        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:20',
            'confirm_password' => 'confirm:password'
        ];

        if(! $this->validation(request()->all() , $rules)) {
            return;
        }

        $user = new User();
        $success = $user->create([
            'name'=> request('name'),
            'email'=> request('email'),
            'password'=> password_hash(request('password'), PASSWORD_BCRYPT , ['cost' => 12]),
            'created_at' => Carbon::now()
        ]);

        if($success){

        }

        $this->flash->success("عضویت با موفقیت انجام شد");
        redirect();
        return;
    }

    /**
     * @throws \Exception
     */
    public function login(){

        if(! request()->isPost())
            return;

        $rules = [
            'email' => 'required',
            'password' => 'required|min:6|max:20'
        ];

        if(! $this->validation(request()->all() , $rules)) {
            return;
        }

        $user = (new User())->find('email', request('email'));
        var_dump($user);

        if(!$user){
            $this->flash->error('چنین ایمیلی وجود ندارد');
            return;
        }

        $login = password_verify(request('password') , $user->password);
        if (!$login){
            $this->flash->error('رمز ورود اشتباه است.');
            return;
        }

        $remember = false;
        if(!empty(request('remember')))
            $remember = true;

        Auth::login($user, $remember);


        redirect();
        return;
    }
}