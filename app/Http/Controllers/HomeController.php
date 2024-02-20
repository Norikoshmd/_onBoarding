<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Task;
use App\Models\Employee;
use App\Models\EmployeeTask;
// use App\Models\Doc;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
   
    private $task;
    private $employee;
    private $employeeTask;
    // private $doc;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Task $task,Employee $employee,EmployeeTask $employee_task)
    {
        $this->middleware('auth');
        $this->task     = $task;
        $this->employee = $employee;
        $this->employee_task = $employee_task;
        // $this->doc = $doc;
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
                $employee_tasks = $this->employee_task->paginate(3);

                return view('users.home')
                ->with('employee_tasks',$employee_tasks)
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
        $employee_tasks = $this->employee_task->paginate(10);
        // $doc = $this->doc->findOrFail($id);

        return view('users.showRequested')
        ->with('employee_tasks',$employee_tasks);
        // ->with('doc',$doc);
    }

    public function showSubmitted()
    {
        $employee_tasks = $this->employee_task->all();
        return view('users.showSubmitted')->with('employee_tasks',$employee_tasks);
    }


}
