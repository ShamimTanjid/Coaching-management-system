<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeaderFooter extends Model
{
   protected $fillable = [
        'ownername','ownerdepartment','mobile','address','copyright','status',
    ];
}
