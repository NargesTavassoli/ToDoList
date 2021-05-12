<?php namespace App\Controller;

use App\Controller\Admin\AdminController;
use App\Helper\Auth;
use App\Model\DB;
use App\model\Task;
use Carbon\Carbon;

class TaskController extends Controller
{
    public function __construct()
    {
        if(!checklogin())
            redirect('/login.php');
    }

    public function index(){
        return (new Task())->select('id' , 'name')->get();
    }

    public function create()
    {
        if(! request()->isPost())
            return;

        $rules = [
            'name' => 'required'
        ];

        if (!$this->validation(request()->all() , $rules))
            return;

        (new Task())->create([
           'name' => request('name'),
           'user_id' => Auth::user()->id,
           'created_at' => Carbon::now()
        ]);

         redirect('/tasks');

    }

    public function update($taskID)
    {
        $rules = [
            'name' => 'required'
        ];

        if (!$this->validation(request()->all(), $rules))
            return;

        (new Task())->update($taskID, [
           'name' => request('name'),
            'update_at' => Carbon::now()
        ]);

        redirect('/tasks');
    }

    public function done($taskID)
    {
        (new Task())->update($taskID, [
            'action' => 1,
            'done_at' => Carbon::now()
        ]);

        redirect('/tasks');
    }

    public function edit()
    {
        if(empty(request('id')))
            redirect('/tasks');

        return (new Task())->find('id', request('id'));

    }

    public function delete()
    {
        if(empty(request('id')))
            redirect('/tasks');

        (new Task())->delete(request('id'));
        redirect('/tasks');
    }

}