<?php

namespace App\Http\Controllers\Api;

use App\Http\Filters\OrderFilterg;
use App\Http\Filters\ProductSearch;
use App\Http\Requests\CartProductRequest;
use App\Http\Requests\ProductFilterRequest;
use App\Http\Requests\ProductSearchRequest;
use App\Http\Resources\CartResource;
use App\Http\Resources\ReviewResource;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductManufacturer;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class CartController extends BaseController
{
    public function index(){
        $session=session()->getId();
        $cart=Cart::query()->where('session_id', $session)->get();
        if(isset($cart)){
            return CartResource::collection($cart);
        }
    }

    public function add_product(CartProductRequest $request){
        $data = $request->validated();
        $session=session()->getId();
        if(isset($data['product_id'])){
            $cart=Cart::query()
                ->where('session_id', $session)
                ->where('product_id', $data['product_id'])->first();
            if(isset($cart)){
                $cart->update(['quantity'=>$cart->quantity+1]);
            }else{
                Cart::query()->create([
                    'session_id'=>$session,
                    'product_id'=>$data['product_id'],
                ]);
            }
        }
    }

    public function delete_product(CartProductRequest $request){
        $data = $request->validated();
        if(isset($data['product_id'])){
            $session=session()->getId();
            $cart=Cart::query()
                ->where('session_id', $session)
                ->where('product_id', $data['product_id'])->first();
            if(isset($cart)){
                if($cart->quantity == 1){
                    $cart->delete();
                }else{
                    $cart->update(['quantity'=>$cart->quantity-1]);
                }
            }
        }
    }

    public function price(){
        $session=session()->getId();
        $carts=Cart::query()->where('session_id', $session)->get();
        $price=0;
        foreach ($carts as $cart){
            $product=Product::find($cart->product_id);
            $price+=round($product->price*$cart->quantity, 2);
        }
        return json_encode(['price'=> "{$price}"]);
    }
}
