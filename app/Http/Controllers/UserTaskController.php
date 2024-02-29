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
        'task'          => 'required|array|between:1,30',

       ]);
    //    return response()->json('success');

       $user_id         = $request->user_id;
       $tasks           = $request->task;
    //    $user_id         = Auth::user()->id;

       $user_task = [];

       foreach($tasks as $task_id){

        $user_task = [
            'user_id' => $user_id,
            'task_id' => $task_id,
        ];
        $user_task_obj = new UserTask();
        $user_task_obj->fill($user_task)->save();

       }
       return redirect()->route('hr.employee');
    }
    public function taskStore2(Request $request)
    {
       $request->validate([
        'user_id'       => 'required',
        'task'          => 'required|array|between:1,30',

       ]);
    //    return response()->json('success');

       $user_id         = $request->user_id;
       $tasks           = $request->task;

       $user_task = [];

       foreach($tasks as $task_id){

        $user_task = [
        
            'user_id' => $user_id,
            'task_id' => $task_id,
        ];
        $user_task_obj = new UserTask();
        $user_task_obj->fill($user_task)->save();

       }
       return redirect()->route('hr.showIndividuallyAssigned',$user_id);
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
    }

    public function destroyAssigned($id)
    {
        $this->user_task->destroy($id);

        return redirect()->back();
    }



}
