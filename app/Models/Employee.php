<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory,SoftDeletes;

    public function user()
    {
        return $this->hasOne(User::class,'employee_id');
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class,'employee_task');
    }

    public function userTask()
    {
        return $this->hasMany(UserTask::class);
    }

    public function docs()
    {
        return $this->hasMany(Doc::class);
    }


   
}
