<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doc5 extends Model
{
    use HasFactory;

    protected $table = 'Doc5s';

    protected $fillable = [
            'e_insurance',
          
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
