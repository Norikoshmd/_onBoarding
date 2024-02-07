<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Employee;
use App\Http\Controllers\Auth\RegistrationController;

class TaskController extends Controller
{
    private $task;
    private $employee;

    public function __construct(Task $task, Employee $employee)
    {
        $this->task = $task;
        $this->employee = $employee;

    }

    public function index()
    {
        $employees = $this->employee->all();

        return view('hr.index')->with('employees',$employees);
    }
   

    public function create()
    {
        $employees = $this->employee->all();

        return view('hr.create')->with('employees',$employees);
    }

    public function store(Request $request)
    {

        $request->validate([
            'assigned_to'       => 'required',
            'name'              => 'required',

        ]);
        
      $this->task->assigned_to  =   $request->assigned_to ;
      $this->task->name         =  $request->name;
      $this->task->save();   

    return redirect()->route('hr.index');

   }

   public function register()
   {
    //  $employee = $this->employee->findOrFail($id);
     return view('auth.register');
   }

//    public function registerUser()
//    {
//      return app(RegisterController::class)->showRegistrarionForm();
//    }



    public function daysUntilDue()
{
    $dueDate = Carbon::parse($this->due_date);
    $currentDate = Carbon::now();
    
    return $currentDate->diffInDays($dueDate);
}

public function show()
{
    $tasks = $this->task->all();

    return view('hr.show')->with('tasks',$tasks);
}

public function showEndorsed($id)
{
    $employee = $this->employee->findOrFail($id);

    return view('hr.showEndorsed')->with('employee', $employee);

}

}
   
