<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json([
            'message' => 'Products retrieved successfully',
            'status' => 'success',
            'products' => $products], 200);
    }

    public function store(Request $request)
    {
       $product = new Product();
            $product->name = $request->input('name');
            $product->code = $request->input('code');
            $product->category = $request->input('category');
            $product->price = $request->input('price');
            $product->created_by = $request->input('created_by');
            $product->save();

            return response()->json([
                'message' => 'Product created successfully',
                'status' => 'success',
                'product' => $product], 201);
    }
}
