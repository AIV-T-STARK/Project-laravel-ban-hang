<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Product;
use App\Brand;
use App\Category;
use Cart;

class HomeController extends Controller
{
    
    public function index()
    {
    	$products = Product::where('active', 1)->take(8)->get();

    	return view('home.home', [
    		'products' => $products
    	]);
    }

    public function showSingle($id)
    {
    	$product = Product::find($id);

    	return view('home.product.singleProduct', [
    		'product' => $product
    	]);
    }

    public function getAllProduct()
    {
    	$products = Product::where('active', 1)->get();
    	return view('home.product.index', [
    		'products' => $products,
    		'categories' => Category::all()
    	]);
    }

    public function getCategory($id)
    {
    	$category = Category::find($id);
    	$products = $category->product->where('active', 1);
    	return view('home.product.index', [
    		'products' => $products,
    		'categories' => Category::all()

    	]);
    }

    public function getBrand($id)
    {
    	$brand = Brand::find($id);
    	$products = $brand->product->where('active', 1);
    	return view('home.product.index', [
    		'products' => $products,
    		'categories' => Category::all()

    	]);
    }

    public function getAddCart($id)
    {
        $product = Product::find($id);
        Cart::add(['id' => $product->id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price * (1 - $product->sale), 'options' => ['avatar' => $product->avatar]]);
        return redirect('showCart');
    }

    public function getShowCart()
    {
        $items = Cart::content();
        $total = Cart::total();
        return view('home.product.cart', [
            'items' => $items,
            'total' => $total
        ]);
    }

    public function getRemoveCart($id)
    {
        Cart::remove($id);

        return redirect('showCart');
    }

    public function getUpdateCart(Request $request)
    {
        Cart::update($request->rowId, $request->qty);
    }
}
