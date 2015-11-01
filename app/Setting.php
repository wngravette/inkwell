<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
