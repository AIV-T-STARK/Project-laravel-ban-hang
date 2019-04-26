<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index')->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postCreate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories,name'
        ]);

        $category = new Category();

        $category->name = $request->name;

        $category->slug = str_slug($request->name);

        $category->save();

        return redirect()->back()->with('success', 'Đã thêm 1 danh mục');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function getUpdate($id)
    {
        $category = Category::find($id);
        return view('admin.category.update')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function postUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories,name'
        ]);

        $category = Category::find($id);

        $category->name = $request->name;

        $category->slug = str_slug($request->name);

        $category->save();

        return redirect('admin/category')->with('success', 'Đã thêm 1 danh mục');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Category::destroy($id);

        return redirect()->back()->with('success', 'Đã xóa 1 danh mục');
    }
}
