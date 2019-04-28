<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\Brand;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('admin.product.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        return view('admin.product.create', [
            'categories' => Category::all(),
            'brands' => Brand::all()
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
            'name' => 'required|unique:products,name',
            'price' => 'required',
            'desc' => 'required',
            'avatar' => 'required|image',
        ]);

        //Uploat avatar
        $avatar = $request->avatar;

        $avatar_new_name = time().$avatar->getClientOriginalName();

        $avatar->move('uploads/products', $avatar_new_name);
        //

        $product = new Product();

        $product->name = $request->name;
        $product->slug = str_slug($request->name);
        $product->avatar = 'uploads/products/' . $avatar_new_name;
        $product->price = $request->price;
        $product->sale = ($request->sale)/100;
        $product->desc = $request->desc;

        $product->brand_id = $request->brand_id;

        $product->save();

        return redirect('admin/product')->with('success', 'Bạn đã thêm 1 sản phẩm mới');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function getUpdate($id)
    {
        $product = Product::find($id);

        return view('admin.product.update', [
            'categories' => Category::all(),
            'brands' => Brand::all(),
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function postUpdate(Request $request,  $id)
    {

        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'desc' => 'required',
            'avatar' => 'image',
        ]);

        $product = Product::find($id);
        //Nếu người dùng thay đổi ảnh
        if($request->hasFile('avatar')) {
            $avatar = $request->avatar;

            $avatar_new_name = time().$avatar->getClientOriginalName();

            $avatar->move('uploads/products', $avatar_new_name);

            unlink($product->avatar);
            $product->avatar = 'uploads/products/' . $avatar_new_name;
        }


        $product->name = $request->name;
        $product->slug = str_slug($request->name);

        $product->price = $request->price;
        $product->sale = $request->sale;
        $product->desc = $request->desc;

        $product->brand_id = $request->brand_id;

        $product->save();

        return redirect('admin/product')->with('success', 'Bạn đã sửa 1 sản phẩm');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delete( $id)
    {
        $product = Product::find($id);
        unlink($product->avatar);
        $product->delete();

        return redirect()->back()->with('success', 'Đã xóa thành công');
    }

    public function chaneCategoryAnhBrand($category_id)
    {
        $ret = '';
        $brands = Brand::where('category_id', $category_id)->get();
        foreach ($brands as $br) {
            $ret = $ret . "<option value=' $br->id '> $br->name </option>";
        }
        return $ret;
    }

    /**
     * Kiển tra active sản phẩm: nếu đã active -> bỏ active, nếu chưa active -> active
     * @param  int $id 
     * @return \Illuminate\Http\Response
     */
    public function getActive($id)
    {
        $product = Product::find($id);

        if ($product->active == 1) {
            $product->active = 0;
        } else {
            $product->active = 1;
        }

        $product->save();

        return redirect()->back();
    }
}
