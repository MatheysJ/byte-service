<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductHasOrder extends Pivot
{

    
    public $timestamps = false;
    public $incrementing = true;

    protected $fillable = [
        "id_product_has_order",
        "id_product",
        "id_order",
        "quantity"
    ];


}
