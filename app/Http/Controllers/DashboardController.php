<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Disease;
use App\Models\HomePage;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index(){
        $diseases = Disease::select('id', 'slug', 'name', 'image')->where('show_on_homepage', true)->limit(10)->get();
        $categories = Category::select('id', 'slug', 'name', 'image')->where('show_on_homepage', true)->limit(16)->get();
        $brands = Brand::select('id', 'slug', 'name', 'image')->where('show_on_homepage', true)->limit(16)->get();

        $generalProducts = Product::where('show_on_homepage', true)
            ->where('status', 'Active')
            ->where('product_type', 'General')
            ->latest()
            ->limit(8)
            ->get();

        $excludeProductIds = $generalProducts->pluck('id');

        $saleProducts = Product::where('show_on_homepage', true)
            ->where('status', 'Active')
            ->where('flag', 'On Sale')
            ->whereNotIn('id', $excludeProductIds)
            ->latest()
            ->limit(9)
            ->get();

        $genericProducts = Product::where('show_on_homepage', true)
            ->where('status', 'Active')
            ->where('product_type', 'Generic')
            ->latest()
            ->limit(8)
            ->get();
        
        $homePage = HomePage::first();
        return view('frontend.home', compact('diseases', 'categories', 'brands', 'generalProducts', 'saleProducts', 'genericProducts', 'homePage'));
    }

    public function vendor_dashboard(){
        return view('vendor.dashboard');
    }

    public function admin_dashboard(){
        return view('admin.dashboard');
    }
}
