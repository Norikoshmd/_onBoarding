<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Task;
use App\Models\Employee;
use App\Models\UserTask;
use App\Models\Doc1;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
   
    private $task;
    private $employee;
    private $user;
    private $userTask;
    private $doc1;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Task $task,Employee $employee,User $user,UserTask $user_task, Doc1 $doc1)
    {
        $this->middleware('auth');
        $this->task     = $task;
        $this->employee = $employee;
        $this->user = $user;
        $this->user_task = $user_task;
        $this->doc1 = $doc1;
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
                $user_id = Auth::user()->id;

                $tasks = $this->task->all(); 
                $employees =$this->employee->all();
                $user_tasks = $this->user_task->where('user_id',$user_id)->paginate(4);
                
                return view('users.home')
                ->with('user_tasks',$user_tasks)
                ->with('employees',$employees)
                ->with('tasks',$tasks);
        }
        return redirect()->route('login');
    }

 


    public function showRequested()
    {
        $user_tasks = $this->user_task->paginate(10);
        $user = $this->user->all();
        $doc1 = $this->doc1->all();
        
        return view('users.showRequested')
        ->with('user_tasks',$user_tasks)
        ->with('user',$user)
        ->with('doc1',$doc1);
    }

    public function showSubmitted()
    {
        $user_tasks = $this->user_task->paginate(10);
       
        return view('users.showSubmitted')
        ->with('user_tasks',$user_tasks);
     
    }

   }
