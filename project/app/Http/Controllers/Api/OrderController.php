<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\OrderMakeRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\ProductOrder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class OrderController extends BaseController
{
    public function make(OrderMakeRequest $request){
        $session=session()->getId();
        $data=$request->validated();
        if(isset($data['name'])&&isset($data['phone'])&&isset($data['email'])&&isset($data['address'])){
            $cart=Cart::query()->where('session_id', $session)->get();
            if(isset($cart)){
                $status=OrderStatus::query()
                    ->where('name', 'LIKE', '%await%')
                    ->orWhere('name', 'LIKE', '%Await%')->first();
                $order=Order::query()->create([
                    'user_name'=>$data['name'],
                    'phone'=>$data['phone'],
                    'email'=>$data['email'],
                    'address'=>$data['address'],
                    'status_id'=>$status->id,
                ]);
                $products=Cart::query()->where('session_id', $session)->get();
                foreach ($products as $product){
                    ProductOrder::query()->create([
                        'order_id'=>$order->id,
                        'product_id'=>$product->product_id,
                        'quantity'=>$product->quantity,
                    ]);
                }
                return json_encode(['result'=>'success']);
            }else{
                return json_encode(['result'=>'error: cart is empty']);
            }
        }else{
            return json_encode(['result'=>'error: the data is incorrect']);
        }
    }
}
