<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $casts = [
        'price' => 'int'
    ];
}
