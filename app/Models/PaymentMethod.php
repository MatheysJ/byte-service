<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $table = "payment_method";
    public $timestamps = false;

    protected $primaryKey = 'id_payment_method';

    protected $fillable = [
        "id_payment_method",
        "name"
    ];

    /**
     * Get all of the orders for the PaymentMethod
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'id_payment_method', 'id_payment_method');
    }

}
