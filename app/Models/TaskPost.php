<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskPost extends Model
{
    use HasFactory;

    protected $table = 'task_post';
    protected $fillable = ['employee_id', 'task_id'];
    public $timestamps = false;

    #To get the name of the category
    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
