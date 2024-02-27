<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doc4 extends Model
{
    use HasFactory;

    protected $table = 'Doc4s';

    protected $fillable = [
            'pension',
            'pensionnumber',
          
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
