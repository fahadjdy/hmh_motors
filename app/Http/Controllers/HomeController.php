<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;


class HomeController extends Controller
{    
    public function home(){
        
        $categories = Category::all();

        // Eager load category for each product
        $products = Product::with('category')
            ->select('id', 'name', 'slug', 'primary_image', 'category_id')
            ->get();

        return view('home',compact('categories','products'));
    }

   public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $products = Product::with('category')
            ->select('id', 'name', 'slug', 'primary_image', 'category_id')
            ->where('category_id', $category->id)
            ->get();
        return view('category', compact('category', 'products'));
    }

    // public function product($slug)
    // {
    //     $product = Product::where('slug', $slug)->firstOrFail();
    //     return view('product', compact('product'));
    // }

    public function products()
    {
        $products = Product::with('category')
            ->select('id', 'name', 'slug', 'primary_image', 'category_id')
            ->get();
        return view('products', compact('products'));
    }


}
