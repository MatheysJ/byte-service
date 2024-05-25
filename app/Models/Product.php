<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "product";
    public $timestamps = false;

    protected $primaryKey = 'id_product';

    protected $fillable = [
        "id_product",
        "category_id",
        "name",
        "price",
        "sale_price",
        "image",
        "description",
        "active",
        "tag",
        "rank"
    ];
}
