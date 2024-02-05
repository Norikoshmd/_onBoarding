<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Task extends Model
{
    use HasFactory;

    protected $fillable = ['assigned_to', 'name', 'due_date', 'link'];

    protected $casts = [
        'name' => 'array',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

   
    public function task(){
        return $this->hasMany();
    }


    public function daysUntilDue()
    {
        return now()->diffInDays(Carbon::parse($this->due_date));
    } 

}


