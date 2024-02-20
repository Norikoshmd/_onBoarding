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
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class,'employee_task');
    }

    public function employeeTask()
    {
        return $this->hasMany(EmployeeTask::class);
    }

    public function docs()
    {
        return $this->hasMany(Doc::class);
    }


   
}
