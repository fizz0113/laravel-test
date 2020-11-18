<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\Product;
use App\Models\Order;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id = null)
    {
        if ($id == null) {
            $products = Product::all();
            return view('home', ['products' => $products]);
        }

        $product = Product::where('id', $id)->get()->all();
        if (count($product)>0) {
            return view('product', ['product' => $product[0]]);
        }

        return redirect()->back();
    }


    public function saleProducts($rk=0)
    {
        $products = Product::where('user_id', \Auth::user()->id)
        ->skip(10 * $rk)
        ->take(10)
        ->get()->all();

        return view('sale.products', [
            'products' => $products,
            'rk'  => $rk
        ]);
    }

    public function addProduct(Request $request)
    {
        $this->validate($request,[
            'productName' => 'required',
            'productPrice' => 'required|integer|gt:0',
        ]);

        Product::create([
            'name' => $request->productName,
            'price' => $request->productPrice,
            'img' => $request->hasFile('productImg') ? \base64_encode(file_get_contents($request->file('productImg')->getRealPath())) : '',
            'user_id' => \Auth::user()->id,
        ]);
        return redirect()->back();
    }

    public function deleteProduct(Request $request)
    {
        $this->validate($request, [
            'productId' => 'required|integer|gt:0',
        ]);

        $product = Product::where('user_id', \Auth::user()->id)->find($request->productId);
        if ($product != null) {
            $product->delete();
        }
        return redirect()->back();
    }

    public function saleRecord($rk=0)
    {
        $record = \DB::table('orders')
        ->join('users', 'orders.user_id' , '=', 'users.id')
        ->join('products', 'orders.product_id', '=', 'products.id')
        ->where('products.user_id', \Auth::user()->id)
        ->skip(10*$rk)
        ->take(10)
        ->get([
            'orders.id',
            'orders.user_id',
            'products.id'=>'product_id',
            'products.name',
            'products.price',
        ])->all();

        return view('sale.record', [
            'record' => $record,
            'rk'  => $rk
        ]);
    }

    public function buyRecord($rk=0)
    {
        $record = \DB::table('orders')
        ->join('products', 'orders.product_id', '=','products.id' )
        ->join('users', 'products.user_id', '=', 'users.id')
        ->where('orders.user_id', \Auth::user()->id)
        ->skip(10*$rk)
        ->take(10)
        ->get([
            'orders.id',
            'products.user_id',
            'products.id'=>'product_id',
            'products.name',
            'products.price',
        ])->all();

        return view('buy.record', [
            'record' => $record,
            'rk'  => $rk
        ]);

    }

    public function addOrder(Request $request)
    {
        $this->validate($request, [
            'productId' => 'required|integer|gt:0',
        ]);

        Order::create([
            'product_id' => $request->productId,
            'user_id' => \Auth::user()->id,
        ]);

        return redirect()->back();
    }

}
