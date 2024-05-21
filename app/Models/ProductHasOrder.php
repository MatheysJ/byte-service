<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductHasOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        "id_product_has_order",
        "id_product",
        "id_order",
        "quantity"
    ];
}
