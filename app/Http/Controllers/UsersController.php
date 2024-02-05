<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    private $user;

    public function __construct(User $user) 
    {
        $this->user = $user;
    }

    public function index()
    {
        return view('recruiter.index');
    }

    public function create()
    {
        return view('recruiter.create');
    }

    public function store()
    {
        $request->validate([
            'firstname'     =>'required|min:1|max:30', 
            'middlename'    =>'required|min:1|max:30', 
            'lastname'      =>'required|min:1|max:30', 
            'email'         =>'required|email|max:50', 
            'visa_status'   =>'required|min:1|max:50', 
            'startday'      =>'required|date|after:today',
            'workat'        =>'required|min:1|max:30', 
            'visa_f'        =>'required|mimes:jpeg,jpg,png,gif|max:1048' ,
            'visa_b'        =>'required|mimes:jpeg,jpg,png,gif|max:1048' ,
            'passport'      =>'required|mimes:jpeg,jpg,png,gif|max:1048' 
        ]);



    }
}
