<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class expenses extends Model
{
    protected $fillable = [
        'details',
        'amount',
            ];
}
