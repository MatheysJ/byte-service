<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        "id_client",
        "id_payment_method",
        "address",
        "total",
        "sale_total",
        "status",
        "change",
        "start_time",
        "end_time"
    ];
}

//TODO: Adicionar os novos campos na documentação e MER