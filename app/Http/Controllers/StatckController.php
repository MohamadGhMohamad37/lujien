<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\About;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class StatckController extends Controller
{
    public function index($lang){
$categories = Category::with('latestProducts')->get();
    $latestCategory = Category::with(['products'])->latest()->first();

        return view('website.home.index',compact('categories','latestCategory'));
    }
    public function about($lang){
        $abouts = About::all();
        $productCount = Product::count();
        $categoryCount = Category::count();
        $orderCount = Order::count();
        $userCount = User::count();
        return view('website.about.index',compact('abouts','productCount', 'categoryCount', 'orderCount', 'userCount'));
    }
    public function faq($lang){
        return view('website.faq.index');
    }
    public function product($lang,Product $product){
            $category = $product->category;

        return view('website.products.show',compact('product','category'));
    }
    public function shop($lang){
    $categories = Category::with('products')->get(); 
    $products  = Product::all();
        return view('website.shop.index',compact('categories'));
    }
    public function categories($lang){
        return view('website.categories.index');
    }
    public function blogs($lang){
        return view('website.blogs.index');
    }
    public function blog($lang){
        return view('website.blogs.show');
    }
    public function contact($lang){
        return view('website.contact.index');
    }
}