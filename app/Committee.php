<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Committee extends Model
{
    /**
     * 屬於某commitee類型的人.
     */
    public function people()
    {
        return $this->belongsToMany('App\Person', 'committee_person');
    }
}
