<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    //
    protected $guarded = [];


    // office relationship 
    public function office()
    {
        return $this->belongsTo(Office::class);
    }
}
