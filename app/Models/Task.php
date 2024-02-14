<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Task extends Model
{
    use HasFactory;

   

    public function employeeTask()
    {
        return $this->belongsToMany(EmployeeTask::class,'employee_task');
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class,'employee_task','task_id','employee_id');
    }

}


