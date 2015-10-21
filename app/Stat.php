<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    protected $table = 'entry_stats';

    public function entry()
    {
        return $this->belongsTo('App\Entry');
    }
}
