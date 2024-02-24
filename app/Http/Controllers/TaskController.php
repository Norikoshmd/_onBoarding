<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Doc;
use App\Models\Employee;
use App\Models\UserTask;
use App\Models\User;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\UserTaskController;
use App\Http\Controllers\DocController;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;


class TaskController extends Controller
{
    private $task;
    private $employee;
    private $user_task;
    private $doc;
    private $user;
    private $registered_user;
    


    public function __construct(Task $task, Employee $employee, UserTask $user_task, Doc $doc,User $user)
    {
        $this->task = $task;
        $this->employee = $employee;
        $this->user_task = $user_task;
        $this->doc = $doc;
        $this->user = $user;
        // $this->registered_user = $registered_user;


    }


// 1:Notification
    public function index()
    {
        $employees = $this->employee->latest()->paginate(3);
        $users = $this->user->all();
        

      

        return view('hr.index')
        ->with('employees',$employees)
        ->with('users',$users);
       
    }
// 2:New Employee List

    // i : to show the list
    public function employee()
    {
        $employees = $this->employee->withTrashed()->latest()->paginate(5);
        $user_tasks = $this->user_task->all();
        $users = $this->user->all();

        $registered_users = [];

        foreach ($users as $user) {
            if($user->employee){
                $registered_users[] = $user->employee_id;
            }
        }
        logger('registered_users',$registered_users);

        $assigned_users = [];

        foreach ($user_tasks as $task) {
            if($task->user){
                $assigned_users[] = $task->user_id;
            }
        }
        logger('assigned_users',$assigned_users);


        return view('hr.employee')
                ->with('employees',$employees)
                ->with('employee_tasks',$user_tasks)
                ->with('users',$users)
                ->with('registered_users',$registered_users)
                ->with('assigned_users',$assigned_users);
    }

    // public function storeUserID(Request $request,$id)
    // {
    //     $request->validate([
    //         'user_id'       => 'required|min:1|unique:users,id',
    //     ]);

    //     $this->employee->user_id = $request->user_id;
    //     $this->task->save();

    //     return redirect()->back();
    // }

    // ii : to show items endorsed by recruiter to each $employee
    public function showEndorsed($id)
    {
        $employee  = $this->employee->findOrFail($id);
        // $employee_task = $this->employee_task->all;
            
        return view('hr.showEndorsed')
                ->with('employee', $employee);
                // ->with('employee_task', $employee_task);
    }
                         
    // iii : register users - pending 
    public function register()
    {
    //   $employees = $this->employee->findOrFail($id);
      return view('auth.register');
    }

    //display account registered users
    public function showRegisteredAccount()
    {
        $employees = $this->employee->all();
        $user = $this->user->paginate(6);
    
        return view('hr.showRegisteredAccount')
                ->with('employees',$employees)
                ->with('user',$user);
    }
    
 
    //    public function registerUser()
    //    {
    //      return app(RegisterController::class)->showRegistrarionForm();
    //    }

    // iv : assign requests to $employee
    public function assignTask($id)
    {
        $employee = $this->employee->findOrFail($id);
        $tasks = $this->task->all();

        // $employee = showEndorsed($id);

        return view('hr.assignTask')
                ->with('employee',$employee)
                ->with('tasks',$tasks);
    }
            //for checking endorsed info and return to assign Task
            public function showEndorsed2($id)
            {
                $employee  = $this->employee->findOrFail($id);
                // $employee_task = $this->employee_task->all;
                    
                return view('hr.showEndorsed2')
                        ->with('employee', $employee);
                        // ->with('employee_task', $employee_task);
            }

             //for checking endorsed info and return to index
             public function showEndorsed3($id)
             {
                 $employee  = $this->employee->findOrFail($id);
                 $users = $this->user->all();

                
                
                 // $employee_task = $this->employee_task->all;
 
                 return view('hr.showEndorsed3')
                         ->with('employee', $employee)
                         ->with('users',$users);
                         // ->with('employee_task', $employee_task);
             }

    // v : (if requests are assigned to $employee) - pending 
    //      show assigned requests to $employee
    // public function taskAssigned($id)
    // {
    //     $employee = $this->employee->findOrFail($id);
    //     $tasks = $this->task->all();

    //     return view('hr.taskAssigned')
    //             ->with('employee',$employee)
    //             ->with('tasks',$tasks);
    // }

    


// 3: Requested items List
    public function showAssigned()
    {
        $employees = $this->employee->all();
        $users = $this->user->all();
        $user_tasks = $this->user_task->latest()->paginate(6);

    
        return view('hr.showAssigned')
                ->with('employees',$employees)
                ->with('users',$users)
                ->with('user_tasks',$user_tasks);
    }

    public function showIndividuallyAssigned($id)
    {
        $employee = $this->employee->all();
        $user = $this->user->findOrFail($id);

        $user_tasks = $user->userTasks()->paginate(10);
        // $user_tasks = $this->user_task->paginate(10);

        return view('hr.showIndividuallyAssigned')
        ->with('employee',$employee)
        ->with('user',$user)
        ->with('user_tasks',$user_tasks);
    }


// 4: Submitted items List
    public function showSubmitted()
    {
        return view('hr.submitted');
    }

// 5: Confirmed items List
    public function showConfirmed()
    {
        return view('hr.confirmed');
    }


// 6: Assignment List(create)
    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|min:5|max:100|unique:tasks,name',
            'category'   => 'required'
        ]);

        $this->task->name = ucwords(strtolower($request->name));
        $this->task->category = $request->category;
        $this->task->save();

        return redirect()->back();
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name'       => 'required|min:5|max:100|unique:tasks,name',
            'category'   => 'required'
        ]);

        $task           = $this->task->findOrFail($id);
        $task->name     = ucwords(strtolower($request->name));
        $task->save();

        $task->userTask()->delete();

        foreach($request->category as $category)
        {
            $employee_task[] = ['category' => $category];
        }
        $task->categoryPost()->createMany($category);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->task->destroy($id);

        return redirect()->back();
    }
}
   
