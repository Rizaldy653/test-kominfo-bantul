<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);

        return response()->json([
            'success' => true,
            'data' => $products
        ]);
    }

    public function getByCategory(Request $request)
    {
        $product = QueryBuilder::for(Product::class)
            ->allowedFilters([
                AllowedFilter::exact('category', 'category_id')
            ])
            ->get();
        
        return response()->json([
            'success' => true,
            'products' => $product
        ]);
    }

    public function show(Request $request, $id)
    {
        $product = Product::find($id);

        return response()->json([
            'success' => true,
            'product' => $product
        ]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'product_name' => 'required',
            'supplier_id' => 'required',
            'category_id' => 'required',
            'quantity_per_unit' => 'required',
            'unit_price' => 'required',
            'units_in_stock' => 'required',
            'units_on_order' => 'required',
            'reorder_level' => 'required',
            'discontinued' => 'required',
        ]);

        $product = $request-Product::create($validate);

        return response()->json([
            'success' => true,
            'product' => $product
        ]);
    }
}
