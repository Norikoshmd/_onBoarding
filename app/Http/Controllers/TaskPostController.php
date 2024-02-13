<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\TaskPost;

class TaskPostController extends Controller
{
    private $task;
    private $task_post;

    public function __construct(Task $task,TaskPost $task_post)
    {
        $this->task = $task;
        $this->task_post = $task_post;
    }

    public function taskPost()
    {
        $all_tasks = $this->task->paginate(10);

        return view('hr.taskPost')->with('all_tasks', $all_tasks);
    }
    
    public function taskStore(Request $request)
    {
       $request->validate([
        'task'          => 'required|array|between:1,30',
        'employee_id'   => 'required'
       ]);
       
       $employee_id = $request->employee_id;
       $tasks    = $request->task;
       
       $task_post = [];

       foreach($tasks as $task_id){
        // $duedate = $request->input("duedate_{$task_id}"); 
        // dd($request);

        $task_post[] = [
            'employee_id' => $employee_id,
            'task_id' => $task_id,
            // 'duedate' => $duedate
        ];
       }

       TaskPost::insert($task_post);
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