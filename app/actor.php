<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class actor extends Model
{
    //
    protected $table = 'actor';

    public $timestamps = false;
    
    protected $guarded = ['id'];
}
