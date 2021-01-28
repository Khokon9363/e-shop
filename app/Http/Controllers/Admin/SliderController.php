<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $MODULE_VIEW = 'Admin.';
    public $MODULE_NAME = 'Slider ';
    public $MODULE_ROUTE = 'admin.slider.';

    public function index()
    {
        $page = 'index';
        $data = Slider::with('categories')->orderBy('created_at', 'DESC')->paginate(1);
        $categories = Category::all();

        return view($this->MODULE_VIEW.'slider', compact('page', 'data', 'categories'));
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
            'image'   => 'required|mimes:jpg,jpeg,png',
            'text_one'   => 'required|max:100',
            'text_two'   => 'required|max:100',
            'status' => 'required'
        ]);

        $rename = time().'_'.date('d-m-y').'_'.$request->file('image')->getClientOriginalName();
        $request->file('image')->move('slider_images', $rename);

        $slider = new Slider();
        $slider->category_id = $request->category_id;
        $slider->text_one = $request->text_one;
        $slider->text_two = $request->text_two;
        $slider->image = $rename;
        $slider->status = $request->status;
        $slider->save();

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
        //
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
        $data = Slider::with('categories')->find($id);
        $categories = Category::all();

        return view($this->MODULE_VIEW.'slider', compact('page', 'data', 'categories'));
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
            'text_one'   => 'required|max:100',
            'text_two'   => 'required|max:100',
            'status' => 'required'
        ]);

        $slider = Slider::find($id);

        if ($request->hasFile('image')) {
            unlink('slider_images/'.$slider->image);

            $rename = time().'_'.date('d-m-y').'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->move('slider_images', $rename);

            $slider->category_id = $request->category_id;
            $slider->text_one = $request->text_one;
            $slider->text_two = $request->text_two;
            $slider->image = $rename;
            $slider->status = $request->status;
            
        } else {
            $slider->category_id = $request->category_id;
            $slider->text_one = $request->text_one;
            $slider->text_two = $request->text_two;
            $slider->status = $request->status;
        }
        $slider->save();

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
        $image = Slider::find($id)->image;
        unlink('slider_images/'.$image);

        Slider::destroy($id);

        return redirect()->back()->with('delete', $this->MODULE_NAME.'Deleted Successfully');
    }
}
