<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Doc;
use App\Models\Employee;
use App\Models\UserTask;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\DocController;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;


class TaskController extends Controller
{
    private $task;
    private $employee;
    private $user_task;
    private $doc;
    


    public function __construct(Task $task, Employee $employee, UserTask $user_task, Doc $doc)
    {
        $this->task = $task;
        $this->employee = $employee;
        $this->user_task = $user_task;
        $this->doc = $doc;


    }


// 1:Notification
    public function index()
    {
        $employees = $this->employee->latest()->paginate(3);
        return view('hr.index')->with('employees',$employees);
    }
// 2:New Employee List

    // i : to show the list
    public function employee()
    {
        $employees = $this->employee->withTrashed()->latest()->paginate(5);
        $user_tasks = $this->user_task->all();
        // $employee_task_assigned = $employee_task->employee_id;
        // $assigned = [];

        //get all assigned tasks
        // foreach($employee_tasks as $task)
        // {
        //     $employee_tasks_assigned[] =  $task->employee_id;
        // }
        return view('hr.employee')
                ->with('employees',$employees)
                ->with('user_tasks',$user_tasks);
              
    }

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
     //  $employee = $this->employee->findOrFail($id);
      return view('auth.register');
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
                 // $employee_task = $this->employee_task->all;
 
                 return view('hr.showEndorsed3')
                         ->with('employee', $employee);
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
        $user_tasks = $this->user_task->paginate(6);
    
        return view('hr.showAssigned')
                ->with('employees',$employees)
                ->with('user_tasks',$user_tasks);
    }

    public function showIndividuallyAssigned($id)
    {
        $employee = $this->employee->findOrFail($id);
        $user_tasks = $this->user_task->paginate(10);

        return view('hr.showIndividuallyAssigned')
        ->with('employee',$employee)
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
   
