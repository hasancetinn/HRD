<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'productId','orderCode', 'quantity', 'address', 'shippingDate'
    ];
}
