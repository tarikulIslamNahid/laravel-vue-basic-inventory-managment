<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class salaries extends Model
{
    protected $fillable = [
        'emp_id',
        'amount',
        'salary_date',
        'salary_month',
        'salary_year',
            ];
}
