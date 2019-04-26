<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
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
        $product = Product::all()

        return view();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        return view();
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
        ])

        //Uploat avatar
        $avatar = $request->avatar;

        $avatar_new_name = time().$avatar->getClientOriginalName();

        $avatar->move('uploads/products', $avatar_new_name);
        //

        $product = new Product();

        $product->name = $request->name;
        $product->slug = str_slug($request->name);
        $product->price = $request->price;
        if(asset($request->sale)){
            $product->sale = $request->sale;
        }
        $product->desc = $request->desc;

        $product->save();

        return redirect();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function getUpdate($id)
    {
        $product = Product::find($id);

        return redirect()->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function postUpdate(Request $request,  $id)
    {
            }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
    }
}
