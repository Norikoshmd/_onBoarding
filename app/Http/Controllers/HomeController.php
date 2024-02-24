<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Task;
use App\Models\Employee;
use App\Models\UserTask;
use App\Models\Doc;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
   
    private $task;
    private $employee;
    private $user;
    private $userTask;
    private $doc;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Task $task,Employee $employee,User $user,UserTask $user_task, Doc $doc)
    {
        $this->middleware('auth');
        $this->task     = $task;
        $this->employee = $employee;
        $this->user = $user;
        $this->user_task = $user_task;
        $this->doc = $doc;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }

        $role_id = Auth::user()->role_id;

        if($role_id === User::RECRUITER_ROLE_ID){
            return redirect()->route('recruiter.index');
        }
        elseif($role_id === User::HR_ROLE_ID){
            return redirect()->route('hr.index');

        } 
        elseif($role_id === User::USER_ROLE_ID){
                // return redirect()->route('index');
                // if(auth()->user()->has_seen_welcome){

                $tasks = $this->task->all(); 
                $employees =$this->employee->all();
                $user_tasks = $this->user_task->paginate(3);

                return view('users.home')
                ->with('user_tasks',$user_tasks)
                ->with('employees',$employees)
                ->with('tasks',$tasks);
            // }
            // return view('users.welcome');
        }
        return redirect()->route('login');
    }

//     public function markWelcomeAsSeen()
// {
//     auth()->user()->update(['has_seen_welcome' => true]);

//     return redirect()->route('users.home'); 
// }

    public function showRequested()
    {
        $user_tasks = $this->user_task->paginate(10);
        $doc = $this->doc->all();

        return view('users.showRequested')
        ->with('user_tasks',$user_tasks)
        ->with('doc',$doc);
    }

    public function showSubmitted()
    {
        $user_tasks = $this->user_task->all();
        return view('users.showSubmitted')->with('user_tasks',$user_tasks);
    }


}
