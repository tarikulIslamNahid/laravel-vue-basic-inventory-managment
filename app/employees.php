<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employees extends Model
{
    protected $fillable = [
'name',
'email',
'phone',
'address',
'sallery',
'photo',
'nid',
'join_date',
    ];
}
