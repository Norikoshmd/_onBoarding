<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Employee;
use App\Models\EmployeeTask;
use App\Http\Controllers\Auth\RegistrationController;
use Illuminate\Support\Facades\Log;


class TaskController extends Controller
{
    private $task;
    private $employee;
    private $employee_task;


    public function __construct(Task $task, Employee $employee, EmployeeTask $employee_task)
    {
        $this->task = $task;
        $this->employee = $employee;
        $this->employee_task = $employee_task;

    }

    public function test(){
        return view('hr.simple');
    }

// 1:Notification
    public function index()
    {
        $employees = $this->employee->latest()->paginate(5);
        return view('hr.index')->with('employees',$employees);
    }
// 2:New Employee List

    // i : to show the list
    public function employee()
    {
       
        $employees = $this->employee->latest()->paginate(5);
        $employee_tasks = $this->employee_task->all();
        $employee_task_done = [];
        // $employee_taskの中に$employee_idを変数として表示する。
        // foreach($employee_tasks as $task)
        // {
        //     if$task
        // }
        // $employee_task_done[] = ;
        logger('employees',$employees->toArray());


       
        return view('hr.employee')
                ->with('employees',$employees)
                ->with('employee_tasks',$employee_tasks);
              
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
        $employee_tasks = $this->employee_task->paginate(6);
    
        return view('hr.showAssigned')
                ->with('employees',$employees)
                ->with('employee_tasks',$employee_tasks);
    }

    public function showIndividuallyAssigned($id)
    {
        $employee = $this->employee->findOrFail($id);
        $employee_tasks = $this->employee_task->paginate(10);

        return view('hr.showIndividuallyAssigned')
        ->with('employee',$employee)
        ->with('employee_tasks',$employee_tasks);
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

        $task->employeeTask()->delete();

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
   
