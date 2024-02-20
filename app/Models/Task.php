<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Task extends Model
{
    use HasFactory;

   

    public function userTask()
    {
        return $this->hasMany(UserTask::class);
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class,'employee_task','task_id','employee_id');
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

}


