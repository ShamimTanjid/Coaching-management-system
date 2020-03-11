<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BatchManagement extends Model
{
    protected $fillable = [
        'class_id','batchname','status','studentcapacity','student_type_id',
    ];
}
