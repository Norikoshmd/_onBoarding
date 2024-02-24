<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
// use App\Models\EmployeeTask;
// use App\Models\Employee;
use App\Models\UserTask;
use App\Models\Task;

// use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    const HR_ROLE_ID = 1;
    const USER_ROLE_ID = 2;
    const RECRUITER_ROLE_ID = 3;
    use HasApiTokens, HasFactory, Notifiable;

    // , SoftDeletes

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'employee_id',
        'name',
        'email',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class,'employee_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function userTasks()
    {
        return $this->hasMany(UserTask::class);
    }

    
}
