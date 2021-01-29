<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $MODULE_VIEW = 'Admin.';
    public $MODULE_NAME = 'Product ';
    public $MODULE_ROUTE = 'admin.product.';

    public function index()
    {
        $page = 'index';
        $data = Product::with('category','productImages')->orderBy('created_at', 'DESC')->paginate(1);
        $categories = Category::all();

        return view($this->MODULE_VIEW.'product', compact('page', 'data', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Bootstrap Collapse used
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id'   => 'required',
            'image'   => 'required',
            'name'   => 'required|max:100',
            'title'   => 'required|max:191',
            'short'   => 'required',
            'long'   => 'required',
            'past_price'   => 'required',
            'present_price'   => 'required',
            'status' => 'required'
        ]);

        $product = new Product();
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->title = $request->title;
        $product->short = $request->short;
        $product->long = $request->long;
        $product->past_price = $request->past_price;
        $product->present_price = $request->present_price;
        $product->status = $request->status;
        $product->save();
        
        foreach ($request->file('image') as $image) {
            $rename = time().'_'.date('d-m-y').'_'.$image->getClientOriginalName();
            $image->move('product_images', $rename);

            $productImage = new ProductImage();
            $productImage->product_id = $product->id;
            $productImage->image = $rename;
            $productImage->save();
        }


        return redirect()->back()->with('success', $this->MODULE_NAME.'Saved Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = 'show';
        $data = Product::with('category','productImages')->find($id);

        return view($this->MODULE_VIEW.'product', compact('page', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = 'edit';
        $data = Product::with('category','productImages')->find($id);
        $categories = Category::all();

        return view($this->MODULE_VIEW.'product', compact('page', 'data', 'categories'));
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
        $request->validate([
            'category_id'   => 'required',
            'name'   => 'required|max:100',
            'title'   => 'required|max:191',
            'short'   => 'required',
            'long'   => 'required',
            'past_price'   => 'required',
            'present_price'   => 'required',
            'status' => 'required'
        ]);

        $product = Product::find($id);

        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->title = $request->title;
        $product->short = $request->short;
        $product->long = $request->long;
        $product->past_price = $request->past_price;
        $product->present_price = $request->present_price;
        $product->status = $request->status;

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required'
            ]);

            if ($request->old_images) {
                $productImages = ProductImage::where('product_id', $id)->get();

                foreach ($productImages as $oldimage) {
                    unlink(public_path('product_images/'.$oldimage->image));
                }
                ProductImage::where('product_id', $id)->delete();
            
            }
            foreach ($request->file('image') as $image) {
                $rename = time().'_'.date('d-m-y').'_'.$image->getClientOriginalName();
                $image->move('product_images', $rename);
    
                $productImage = new ProductImage();
                $productImage->product_id = $product->id;
                $productImage->image = $rename;
                $productImage->save();
            }
            
        }
        $product->save();

        return redirect()->route($this->MODULE_ROUTE.'index')->with('success', $this->MODULE_NAME.'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $images = ProductImage::where('product_id', $id)->get();

        foreach ($images as $image) {
            unlink('product_images/'.$image->image);
        }
        ProductImage::where('product_id', $id)->delete();

        Product::destroy($id);

        return redirect()->back()->with('delete', $this->MODULE_NAME.'Deleted Successfully');
    }
}
