<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $table = 'journal_entries';

    protected $fillable = ['entry_body'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function stats()
    {
        return $this->hasOne('App\Stat');
    }
}
