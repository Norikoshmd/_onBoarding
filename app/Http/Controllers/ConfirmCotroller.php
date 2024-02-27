<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Confirm;
use Illuminate\Support\Facades\Auth;


class ConfirmCotroller extends Controller
{
    private $confirm;

    public function __construct(Confirm $cofirm)
    {
        $this->confirm = $confirm;
    }

    public function store($user_task_id)
    {
        $this->confirm->user_id = Auth::user()->id;
        $this->confirm->user_task_id = $user_task_id;
        $this->confirm->save();

        return redirect()->back();
    }

}
