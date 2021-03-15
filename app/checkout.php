<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class checkout extends Model
{
    protected $table = 'checkout';

    protected $fillable = [
      'username', 'email', 'checkout_time'
    ];
}
