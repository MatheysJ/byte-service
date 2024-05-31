<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductHasOrder;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\Client;

class Order extends Model
{
    use HasFactory;

    protected $table = "order";
    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = [
        "id",
        "id_client",
        "id_payment_method",
        "address",
        "total",
        "sale_total",
        "status",
        "change",
    ];

    /**
     * Get the client that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'id_client');
    }

    /**
     * Get the paymentMethod that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class, 'id_payment_method');
    }
    
    /**
     * The products that belong to the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_has_order', 'id_order', 'id_product')->using(ProductHasOrder::class);
    }
}
