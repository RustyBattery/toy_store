<?php

namespace App\Http\Resources;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductManufacturer;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $product=Product::find($this->product_id);
        $manufacturer=ProductManufacturer::find($product->manufacturer_id);
        $category=ProductCategory::find($product->category_id);
        return [
            'id' => $product->id,
            'name' => $product->name,
            'description' => $product->description,
            'image' => $product->image,
            'article' => $product->article,
            'manufacturer' => $manufacturer->name,
            'manufacturer_country' => $product->manufacturer_country,
            'material' => $product->material,
            'weight' => $product->weight,
            'price' => round($product->price*$this->quantity, 2),
            'category' => $category->name,
            'quantity' => $this->quantity,
        ];
    }
}
