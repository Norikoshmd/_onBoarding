<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Doc1;
use App\Models\Doc2;
use App\Models\Doc3;
use App\Models\Doc4;
use App\Models\Doc5;
use App\Models\Doc6;
use App\Models\Doc7;
use App\Models\Doc8;
use App\Models\Employee;
use App\Models\UserTask;
use App\Models\User;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\UserTaskController;
use App\Http\Controllers\DocController;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{
    private $task;
    private $employee;
    private $user_task;
    private $doc1;
    private $doc2;
    private $doc3;
    private $doc4;
    private $doc5;
    private $doc6;
    private $doc7;
    private $doc8;
    private $user;
    private $registered_user;
    


    public function __construct(Task $task, Employee $employee, UserTask $user_task, Doc1 $doc1, Doc2 $doc2, Doc3 $doc3, Doc4 $doc4, Doc5 $doc5, Doc6 $doc6, Doc7 $doc7, Doc8 $doc8,User $user)
    {
        $this->task = $task;
        $this->employee = $employee;
        $this->user_task = $user_task;
        $this->doc1 = $doc1;
        $this->doc2 = $doc2;
        $this->doc3 = $doc3;
        $this->doc4 = $doc4;
        $this->doc5 = $doc5;
        $this->doc6 = $doc6;
        $this->doc7 = $doc7;
        $this->doc8 = $doc8;
        $this->user = $user;
    

    }


// 1:Notification
    public function index()
    {
        $employees = $this->employee->latest()->paginate(3);
        $users = $this->user->all();
        $user_tasks = $this->user_task->all();
        
        return view('hr.index')
        ->with('employees',$employees)
        ->with('user_tasks',$user_tasks)
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
                ->with('user_tasks',$user_tasks)
                ->with('users',$users)
                ->with('registered_users',$registered_users)
                ->with('assigned_users',$assigned_users);
    }


    // ii : to show items endorsed by recruiter to each $employee
    public function showEndorsed($id)
    {
        $employee  = $this->employee->findOrFail($id);
       
            
        return view('hr.showEndorsed')
                ->with('employee', $employee);
    }
                         
    // iii : register users 
    public function register()
    {
    
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
    
    // iv : assign requests to $employee
    public function assignTask($id)
    {
        $employee = $this->employee->findOrFail($id);
        $tasks = $this->task->all();

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
        $tasks = $this->task->all();
        // $all_user_tasks = $this->all_user_tasks->all();
        $user_tasks = $this->user_task->all();

    //    $isSubmitted = $this->isSubmitted($user_tasks);
          
        return view('hr.showIndividuallyAssigned')
        ->with('employee',$employee)
        ->with('user',$user)
        ->with('user_tasks',$user_tasks)
        // ->with('isSubmitted',$isSubmitted)
        ->with('tasks',$tasks);
    }


// 4: Submitted items List
    public function showSubmitted()
    {
        $user_tasks = $this->user_task->all();

        return view('hr.submitted')
        ->with('user_tasks',$user_tasks);
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
   
