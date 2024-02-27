<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Doc1 extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function confirms()
    {
        return $this->hasMany(Confirm::class);
    }

    

    public function isConfirmed()
    {
        return $this->confirms()->where('user_id', Auth::user()->id)->exists();
    }
    
}
