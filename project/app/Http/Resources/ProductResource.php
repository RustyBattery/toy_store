<?php

namespace App\Http\Resources;

use App\Models\ProductCategory;
use App\Models\ProductManufacturer;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $manufacturer=ProductManufacturer::find($this->manufacturer_id);
        $category=ProductCategory::find($this->category_id);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'image' => $this->image,
            'article' => $this->article,
            'manufacturer' => $manufacturer->name,
            'manufacturer_id' => $this->manufacturer_id,
            'manufacturer_country' => $this->manufacturer_country,
            'material' => $this->material,
            'weight' => $this->weight,
            'price' => $this->price,
            'category' => $category->name,
            'category_id' => $this->category_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
