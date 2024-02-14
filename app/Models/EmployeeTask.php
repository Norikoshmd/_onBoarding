<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeTask extends Model
{
    use HasFactory;

    protected $table = 'employee_task';
    protected $fillable = ['employee_id', 'task_id'];
    public $timestamps = false;

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function employee()
    {
        return $this->belongsToMany(Employee::class,'employee_task');
    }

    
}
