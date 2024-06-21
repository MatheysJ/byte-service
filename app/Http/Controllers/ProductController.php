<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $isSearch = $request->filled('search');
        $search = $request->input('search');
        $isCategory = $request->filled('category_id');
        $category = $request->input('category_id');


        if ($isSearch || $isCategory) {
            return Product::where(function ($query) use ($isSearch, $search, $isCategory, $category) {
                if ($isCategory) {
                    $query->where('category_id', $category)->orderBy('rank', 'desc')->orderBy('name', 'asc');
                }
                if ($isSearch) {
                    $query->where('id_product', $search)->orWhere('name', 'like', "%".$search."%");
                }
                return $query;
            })->get();            
        }
        
        return Product::orderBy('rank', 'desc')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Product::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        return Product::with("category")->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
    }
}
