<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class MainController extends Controller
{
    public function main(Request $request)
    {
        $productsQuery = Product::query();
        if ($request->filled('price_from')) {
            $productsQuery->where('price', '>=', $request->price_from);
        }
        if ($request->filled('price_to')) {
            $productsQuery->where('price', '<=', $request->price_to);
        }
        $products = $productsQuery->simplePaginate(9)->withPath('?' . $request->getQueryString());
        return view('main', compact('products'));
    }
    public function categories()
    {
        $categories = Category::get();
        return view('categories', compact('categories'));
    }
    public function category($code)
    {
        $category = Category::where('code', $code)->first();
        return view('category', compact('category'));
    }
    public function product($category, $code)
    {
        $product = Product::where('code', $code)->first();
        return view('product', compact('category', 'product'));
    }
}
