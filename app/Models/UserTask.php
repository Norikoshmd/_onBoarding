<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserTask extends Model
{
    use HasFactory;

    protected $table = 'user_task';
    protected $guarded = [];
    // public $timestamps = true;
    
    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function submission()
    {
        return $this->hasOne(UserTask::class);
    }

   

    public function doc1()
    {
        return $this->hasOne(Doc1::class);
    }

    public function getIsSubmitted()
    {
        $doc1_id = $this->doc1_id;
        $doc2_id = $this->doc2_id;
        $doc3_id = $this->doc3_id;
        $doc4_id = $this->doc4_id;
        $doc5_id = $this->doc5_id;
        $doc6_id = $this->doc6_id;
        $doc7_id = $this->doc7_id;
        $doc8_id = $this->doc8_id;

        logger('doc1_id', ['$doc1_id'=>$doc1_id]);
       
        if($doc1_id == 1||$doc2_id == 1||$doc3_id == 1|| $doc4_id == 1||$doc5_id == 1||$doc6_id == 1 ||$doc7_id == 1||$doc8_id == 1)
        {
            return true;
    
        }
            return false;
        }

}
