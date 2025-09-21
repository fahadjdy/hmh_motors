<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Testimonial;


class HomeController extends Controller
{    
    public function home(){
        
        $categories = Category::all();

        // Eager load category for each product
        $products = Product::with('category')
            ->select('id', 'name', 'slug', 'code', 'primary_image', 'category_id')
            ->get();

        $testimonials =Testimonial::all();
        return view('home',compact('categories','products','testimonials'));
    }

    public function about(){
        $categories = Category::all(); // Fetch all categories for footer
        return view('about',compact('categories'));
    }

    public function contact(){
        $categories = Category::all(); // Fetch all categories for footer
        return view('contact',compact('categories'));
    }

   public function category($slug)
    {
        $categories = Category::all(); // Fetch all categories for footer
        $category = Category::where('slug', $slug)->firstOrFail();
        $products = Product::with('category')
            ->select('id', 'name', 'slug', 'code', 'primary_image', 'category_id')
            ->where('category_id', $category->id)
            ->get();
        return view('category', compact('category', 'products', 'categories'));
    }

    public function products()
    {
        $categories = Category::all(); // Fetch all categories for footer
        $products = Product::with('category')
            ->select('id', 'name', 'slug','code', 'primary_image', 'category_id')
            ->get();
        return view('products', compact('products', 'categories'));
    }


}
