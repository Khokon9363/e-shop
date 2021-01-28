<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $MODULE_VIEW = 'Admin.';
    public $MODULE_NAME = 'Category ';
    public $MODULE_ROUTE = 'admin.category.';

    public function index()
    {
        $page = 'index';
        $data = Category::orderBy('created_at', 'DESC')->paginate(15);

        return view($this->MODULE_VIEW.'category', compact('page', 'data'));
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
            'name'   => 'required|max:100|unique:categories',
            'status' => 'required'
        ]);
        $category = new Category();
        $category->name = ucfirst($request->name);
        $category->status = $request->status;
        $category->save();

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
        $data = Category::find($id);

        return view($this->MODULE_VIEW.'category', compact('page', 'data'));
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
            'name'   => 'required|max:100',
            'status' => 'required'
        ]);
        $category = Category::find($id);
        $category->name = ucfirst($request->name);
        $category->status = $request->status;
        $category->save();

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
        Category::destroy($id);

        return redirect()->back()->with('delete', $this->MODULE_NAME.'Deleted Successfully');
    }
}
