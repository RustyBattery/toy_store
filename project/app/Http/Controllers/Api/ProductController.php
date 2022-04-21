<?php

namespace App\Http\Controllers\Api;

use App\Http\Filters\OrderFilterg;
use App\Http\Filters\ProductFilter;
use App\Http\Filters\ProductSearch;
use App\Http\Requests\ProductFilterRequest;
use App\Http\Requests\ProductSearchRequest;
use App\Http\Requests\ReviewRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ReviewResource;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductManufacturer;
use App\Models\ProductReview;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ProductController extends BaseController
{
    public function index(ProductFilterRequest $request){
        $data = $request->validated();
        $filter=app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);
        $products=Product::filter($filter)->get();
        return ProductResource::collection($products);
    }
    public function search(ProductSearchRequest $request){
        $data = $request->validated();
        $filter=app()->make(ProductSearch::class, ['queryParams' => array_filter($data)]);
        $products=Product::filter($filter)->get();
        return ProductResource::collection($products);
    }
    public function review(ReviewRequest $request){
        $data=$request->validated();
        if(isset($data['product_id'])){
            $review=ProductReview::query()->where('product_id', $data['product_id'])->get();
            return ReviewResource::collection($review);
        }
    }
}
