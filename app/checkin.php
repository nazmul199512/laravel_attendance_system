<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class checkin extends Model
{
    protected $table = 'checkin';

    protected $fillable = [
      'username', 'email', 'checkin_time'
    ];

    public function checkout()
    {
        return $this->hasMany('checkin');
    }
}
