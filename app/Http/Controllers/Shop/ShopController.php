<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public $categories;

    public function __construct()
    {
        $this->categories = Category::with('product')->where('status','Active')->get();
    }

    public function show()
    {
        $categories = $this->categories;

        $sliders = Slider::with('category')->where('status','Active')->get();

        return view('shop.shop', compact('categories', 'sliders'));
    }
    public function about()
    {
        $categories = $this->categories;

        return view('shop.about', compact('categories'));
    }
    public function contact()
    {
        $categories = $this->categories;

        return view('shop.contact', compact('categories'));
    }
    public function products($id)
    {
        $categories = $this->categories;

        $products = Product::with('productImages')->where('category_id', $id)->where('status', 'Active')->get();

        return view('shop.product.products', compact('categories', 'products'));
    }
    public function product($id)
    {   
        $categories = $this->categories;

        $product = Product::with('productImages','category')->find($id);

        return view('shop.product.product', compact('categories', 'product'));
    }
}
