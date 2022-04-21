<?php

namespace App\Http\Resources;

use App\Models\OrderStatus;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $status=OrderStatus::find($this->status_id);
        return [
            'id' => $this->id,
            'user_name' => $this->user_name,
            'phone' => $this->phone,
            'email' => $this->email,
            'address' => $this->address,
            'status' => $status->name,
            'status_id' => $this->status_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
