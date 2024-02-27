<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doc3 extends Model
{
    use HasFactory;

    protected $table = 'Doc3s';

    protected $fillable = [
            'how',
            'date',
            'time',
          
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
