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
        'user_id'       => 'required',
        // 'employee_id'   => 'required',
        'task'          => 'required|array|between:1,30',

       ]);
    //    return response()->json('success');

       $user_id         = $request->user_id;
       $tasks           = $request->task;
    //    $user_id         = Auth::user()->id;

       $user_task = [];

       foreach($tasks as $task_id){

        $user_task[] = [
            // 'employee_id' => $employee_id,
            'user_id' => $user_id,
            'task_id' => $task_id,
        ];
       }

       UserTask::insert($user_task);

       return redirect()->route('hr.employee');
    }

    public function addTask($id)
    {  
        $task = $this->task->all();
        $user_task = $this->user_task->all();
        $user= $this->user->findOrFail($id);

        return view('hr.addTask')
                ->with('employee',$employee)
                ->with('user',$user)
                ->with('tasks',$tasks);
    }


    public function postAdditionalTask(Request $request,$id)
    {  
        $request->validate([
            'user_id'       => 'required',
            'task'          => 'required|array|between:1,30',
    
           ]);

        $user_id         = $request->user_id;
        $tasks           = $request->task;

        $task->userTask()->delete();

        foreach($request->task as $task)
        {
            $user_task[] = ['task_id' => $task_id];
        }
        $task->taskPost()->createMany($task_id);

        return view('hr.addTask');
                // ->with('employee',$employee)
                // ->with('user',$user)
                // ->with('tasks',$tasks);
    }
    ###reference for postAdditionalTask
    // public function update(Request $request,$id)
    // {
    //     $request->validate([
    //         'name'       => 'required|min:5|max:100|unique:tasks,name',
    //         'category'   => 'required'
    //     ]);

    //     $task           = $this->task->findOrFail($id);
    //     $task->name     = ucwords(strtolower($request->name));
    //     $task->save();

    //     $task->userTask()->delete();

    //     foreach($request->category as $category)
    //     {
    //         $employee_task[] = ['category' => $category];
    //     }
    //     $task->categoryPost()->createMany($category);

    //     return redirect()->back();
    // }



    public function destroyAssigned($id)
    {
        $this->user_task->destroy($id);

        return redirect()->back();
    }



}
