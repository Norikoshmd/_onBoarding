<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\EmployeeTask;

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
        $all_tasks = $this->task->paginate(10);

        return view('hr.employeeTask')->with('all_tasks', $all_tasks);
    }
    
    public function taskStore(Request $request)
    {
       $request->validate([
        'task'          => 'required|array|between:1,30',
        'employee_id'   => 'required'
       ]);
       
       $employee_id = $request->employee_id;
       $tasks    = $request->task;
       
       $employee_task = [];

       foreach($tasks as $task_id){
        // $duedate = $request->input("duedate_{$task_id}"); 
        // dd($request);

        $employee_task[] = [
            'employee_id' => $employee_id,
            'task_id' => $task_id,
            // 'duedate' => $duedate
        ];
       }

       EmployeeTask::insert($employee_task);
    //    $this->task_post->saveMany($task_post);

       return redirect()->route('hr.employee');

    }

    

    public function destroy($id)
    {
        $task = $this->task->findOrFail($id);
        $task->delete();

        return redirect()->back();
    }
 
}