<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\PaymentMethod;
use App\Models\ProductCategory;

class GraphController extends Controller
{
    public function topSellingProduct (Request $request) 
    {
        return Product::withCount(['orders as sold' => function ($query) {
            $query->select(DB::raw('SUM(quantity) as sold'));
        }])->orderByDesc('sold')->get();
    }

    public function topSellingPaymentMethod (Request $request) 
    {
        return PaymentMethod::withCount('orders as orders_placed')
            ->orderByDesc('orders_placed')
            ->get();
    }

    public function productByProductCategory (Request $request) 
    {
        return ProductCategory::withCount('products as quantity')
            ->orderByDesc('quantity')
            ->get();
    }
}
