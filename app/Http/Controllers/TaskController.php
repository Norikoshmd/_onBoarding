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

    public function index()
    {
        $employees = $this->employee->latest()->paginate(5);

        return view('hr.index')->with('employees',$employees);
    }
   
    public function employee()
    {
        $employees = $this->employee->latest()->paginate(5);

        return view('hr.employee')->with('employees',$employees);
    }

    public function create($id)
    {
        $employee = $this->employee->findOrFail($id);

        return view('hr.create')->with('employee',$employee);
    }

    public function store(Request $request)
    {
        $assignedTo = $request->input('assigned_to');
        $docNames = $request->input('doc_names');

       foreach($docNames as $docName){
        Task::create([
            'assigned_to' => $assignedTo,
            'name'        => $docNames,
        ]);
    }
         $this->task->save();   

         return redirect()->route('hr.employee');
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
   
