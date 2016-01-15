<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    /**
     * 取得 committee 身份.
     */
    public function committees()
    {
        return $this->belongsToMany('App\Committee', 'committee_person');
    }

    public function talks()
    {
        return $this->hasMany('App\Talk');
    }
}
