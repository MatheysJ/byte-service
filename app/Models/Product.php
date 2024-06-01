<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductCategory;
use App\Models\Order;

class Product extends Model
{
    use HasFactory;

    protected $table = "product";
    public $timestamps = false;
    protected $primaryKey = 'id_product';

    public function category(): BelongsTo
    {
        /* return $this->hasOne(ProductCategory::class, 'category_id'); */
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    /**
     * The orders that belong to the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'product_has_order', 'id_product', 'id_order')->using(ProductHasOrder::class);
    }

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
