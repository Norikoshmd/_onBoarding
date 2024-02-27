<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doc2 extends Model
{
    use HasFactory;

    protected $table = 'Doc2s';

    protected $fillable = [
            'firstname1',
            'lastname1',
            'relationship1',
            'postal1',
            'address1',
            'email1',
            'phone1',
            'firstname2',
            'lastname2',
            'relationship2',
            'postal2',
            'address2',
            'email2',
            'phone2'
    ];
}
