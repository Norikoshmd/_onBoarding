<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Task $task)
    {
        $this->middleware('auth');
        $this->task = $task;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }

        $role_id = Auth::user()->role_id;

        if($role_id === User::RECRUITER_ROLE_ID){
            return redirect()->route('recruiter.index');
        }
        elseif($role_id === User::HR_ROLE_ID){
            return redirect()->route('hr.index');

        } 
        elseif($role_id === User::USER_ROLE_ID){
                // return redirect()->route('index');
                // if(auth()->user()->has_seen_welcome){

                $tasks = $this->task->all();
                return view('users.home')->with('tasks',$tasks);
            // }
            // return view('users.welcome');
        }
        return redirect()->route('login');
    }

//     public function markWelcomeAsSeen()
// {
//     auth()->user()->update(['has_seen_welcome' => true]);

//     return redirect()->route('users.home'); 
// }

    public function show()
    {
        $tasks = $this->task->all();
        return view('users.submitted')->with('tasks',$tasks);
    }


}
