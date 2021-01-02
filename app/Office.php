<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    //
protected $guarded = [];

public function candidates() {
    return $this->hasMany(Candidate::class);
}

}
