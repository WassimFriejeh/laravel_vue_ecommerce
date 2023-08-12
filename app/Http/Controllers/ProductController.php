<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::query()->orderBy('id','desc')->paginate(5);

        return view('product.index', [
            'products' => $product
        ]);
    }
}
