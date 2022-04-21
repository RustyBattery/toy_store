<?php

namespace App\Http\Controllers\Api;


use App\Http\Filters\OrderFilter;
use App\Http\Filters\OrderFilterg;
use App\Http\Requests\OrderFilterRequest;
use App\Http\Requests\OrderMakeRequest;
use App\Http\Requests\OrderUpdateRequest;
use App\Http\Resources\OrderResource;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class AdminController extends BaseController
{
    public function index(OrderFilterRequest $request){
        $data = $request->validated();
        $filter=app()->make(OrderFilter::class, ['queryParams' => array_filter($data)]);
        $orders=Order::filter($filter)->get();
        return OrderResource::collection($orders);
    }

    public function update(OrderUpdateRequest $request){
        $data=$request->validated();
        if(isset($data['id'])&&isset($data['new_status'])){
            $order=Order::query()->find($data['id']);
            $order->update(['status_id'=>$data['new_status']]);
        }
    }
}
