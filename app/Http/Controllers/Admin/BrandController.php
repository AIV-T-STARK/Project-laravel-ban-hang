<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Brand;
use App\Category;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.brand.index', [
            'categories' => $categories,
            'brands' => $brands
        ]);
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
            'name' => 'required|unique:categories,name',
            'category_id' => 'required'
        ]);

        $brand = new Brand();

        $brand->name = $request->name;

        $brand->category_id = $request->category_id;

        $brand->slug = str_slug($request->name);

        $brand->save();

        return redirect()->back()->with('success', 'Đã thêm 1 thương hiệu');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function getUpdate($id)
    {
        $categories = Category::all();
        $brand = Brand::find($id);
        return view('admin.brand.update', [
            'categories' => $categories,
            'brand' => $brand
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function postUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories,name',
            'category_id' => 'required'
        ]);

        $brand = Brand::find($id);

        $brand->name = $request->name;

        $brand->slug = str_slug($request->name);

        $brand->category_id = $request->category_id;

        $brand->save();

        return redirect('admin/brand')->with('success', 'Đã sửa 1 thương hiệu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Brand::destroy($id);

        return redirect()->back()->with('success', 'Đã xóa 1 danh mục');
    }
}
