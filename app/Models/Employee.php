<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory,SoftDeletes;

    // protected $table = "task_post";
    // protected $fillable = ['task_id','employee_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function taskPost()
    {
        return $this->hasMany(TaskPost::class);
    }


   
}
