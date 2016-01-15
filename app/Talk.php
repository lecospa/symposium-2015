<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Talk extends Model
{
    public function person()
    {
        return $this->belongsTo('App\Person');
    }
    public function parallel_session()
    {
        return $this->belongsTo('App\Session', 'session_id');
    }
    public function scopePlenary($query)
    {
        return $query->where('session', 'Plenary');
    }
}
