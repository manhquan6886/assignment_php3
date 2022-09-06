<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Attributes;
use App\Models\AttrProduct;
use App\Models\ImageProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductClientController extends Controller
{
    public function index(){
        $product = Product::with(['imgpro', 'attr_pro', 'category'])->select('*')->paginate(5);
        // dd($product);
        $min_price = Product::select('into_price')->min('into_price');
        $max_price = Product::select('into_price')->max('into_price');
        return view('client.product.shop', ['product'=>$product, 'min_price'=>$min_price, 'max_price'=>$max_price]);
    }
    public function sing_product(Product $product){
        $show_product = Product::with(['imgpro', 'attr_pro', 'category'])->select('*')->where('id', '=', $product->id)->first();
        $attributes = Attributes::where('parent_id', '=' , 0)->get(); 
        $attribute_el = new Attributes(); 

        return view('client.product.single-product', ['product'=>$show_product, 'attributes'=>$attributes, 'attribute_el'=>$attribute_el]);
    }

    public function asearch_product(Request $request){
        if(isset($request->search)){
            $key = $request->search;
            $product = Product::with(['imgpro', 'attr_pro', 'category'])->select('*')->where('pro_name', 'LIKE', "%$key%")->paginate(5);
            return response()->json(['product' => $product]);
        }
        elseif($request->search==""){
            $product = Product::with(['imgpro', 'attr_pro', 'category'])->select('*')->paginate(5);
            return response()->json(['product' => $product]);
        }
    }

    public function filter_product(Request $request){
        // dd($request->all());
        if(!empty($request->price)){
            $price = $request->price;
            $range_price = explode('-', $price);
            $min_price = $range_price[0];
            $max_price = $range_price[1];
            $product = Product::with(['imgpro', 'attr_pro', 'category'])->select('*')->where('into_price' , '>=' , $min_price)->where('into_price' , '<=' , $max_price)->paginate(5);
            return view('client.product._show-product',['product'=>$product, 'min_price'=>$min_price, 'max_price'=>$max_price]);
        }
        
    }

    public function search_product(Request $request){
        // dd($request->all());
        if(!empty($request->key)){
            $key = $request->key;
            $product = Product::with(['imgpro', 'attr_pro', 'category'])->select('*')->where('pro_name', 'LIKE', "%$key%")->get();
            return view('client.product._show-product',['product'=>$product]);
        }
        else{
            $product = Product::with(['imgpro', 'attr_pro', 'category'])->select('*')->paginate(10);
            return view('client.product._show-product', ['product'=>$product]);
        }
        
    }
}
