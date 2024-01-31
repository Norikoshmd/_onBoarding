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
}
