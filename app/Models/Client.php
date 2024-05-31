<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Client extends Model
{
    use HasFactory;

    protected $table = "client";
    public $timestamps = false;

    protected $primaryKey = 'id_client';

    protected $fillable = [
        "id_client",
        "contact",
        "name",
        "cpf",
        "email"
    ];

    /**
     * Get all of the orders for the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'id_client', 'id_client');
    }
}
