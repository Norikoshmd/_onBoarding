<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Doc extends Model
{
    use HasFactory;

    public function task()
    {
        return $this->hasOne(Task::class);
    }
}
