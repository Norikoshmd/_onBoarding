<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\EmployeeTask;
use Illuminate\Support\Facades\Auth;

class EmployeeTaskController extends Controller
{
    private $task;
    private $employee_task;

    public function __construct(Task $task,EmployeeTask $employee_task)
    {
        $this->task = $task;
        $this->employee_task = $employee_task;
    }

    public function employeeTask()
    {
        $all_tasks = $this->task->paginate(6);

        return view('hr.employeeTask')->with('all_tasks', $all_tasks);
    }
    
    public function taskStore(Request $request)
    {
       $request->validate([
        'employee_id'   => 'required',
        'task'          => 'required|array|between:1,30',
     
       ]);
    //    return response()->json('success');
       
       $employee_id     = $request->employee_id;
       $tasks           = $request->task;
       $user_id         = Auth::user()->id;
     
       
       $employee_task = [];

       foreach($tasks as $task_id){
      
        $employee_task[] = [
            'employee_id' => $employee_id,
            'task_id' => $task_id,
            'user_id' => $user_id,
        ];
       }

       EmployeeTask::insert($employee_task);
 
       return redirect()->route('hr.employee');
    }

    

    public function destroyAssigned($id)
    {
        $employee_task = $this->employee_task->findOrFail($id);
        $employee_task->delete();

        return redirect()->back();
    }
 
}