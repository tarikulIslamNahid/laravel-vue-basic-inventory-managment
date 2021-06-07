<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $fillable = [
        'cat_id',
        'product_name',
        'product_code',
        'root',
        'buying_price',
        'selling_price',
        'supplier_id',
        'buying_date',
        'image',
        'product_qty',
            ];
}
