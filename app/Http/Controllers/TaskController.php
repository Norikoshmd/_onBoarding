<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Employee;
use App\Http\Controllers\Auth\RegistrationController;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    private $task;
    private $employee;

    public function __construct(Task $task, Employee $employee)
    {
        $this->task = $task;
        $this->employee = $employee;

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

        return view('hr.employee')->with('employees',$employees);
    }

    // ii : to show items endorsed to $employee
    public function showEndorsed($id)
    {
        $employee  = $this->employee->findOrFail($id);
            
        return view('hr.showEndorsed')->with('employee', $employee);
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
    public function show()
    {
        $tasks = $this->task->all();

        return view('hr.show')->with('tasks',$tasks);
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


}
   
