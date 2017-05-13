<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tour extends Model
{
    protected $table = 'tours';
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
