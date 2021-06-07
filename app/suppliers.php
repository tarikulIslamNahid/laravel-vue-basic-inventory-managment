<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class suppliers extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'photo',
        'shopname',
            ];
}
