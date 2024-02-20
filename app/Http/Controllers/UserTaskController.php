<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\UserTask;
use Illuminate\Support\Facades\Auth;

class UserTaskController extends Controller
{
    private $task;
    private $user_task;

    public function __construct(Task $task,UserTask $user_task)
    {
        $this->task = $task;
        $this->user_task = $user_task;
    }

    public function userTask()
    {
        $all_tasks = $this->task->paginate(6);

        return view('hr.userTask')->with('all_tasks', $all_tasks);
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
     
       
       $user_task = [];

       foreach($tasks as $task_id){
      
        $user_task[] = [
            'employee_id' => $employee_id,
            'task_id' => $task_id,
            'user_id' => $user_id,
        ];
       }

       UserTask::insert($employee_task);
 
       return redirect()->route('hr.employee');
    }

    

    public function destroyAssigned($id)
    {
        $user_task = $this->user_task->findOrFail($id);
        $user_task->delete();

        return redirect()->back();
    }
 
}


