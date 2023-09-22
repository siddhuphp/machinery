<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'productId' => $this->product_id,
            'name' => $this->name,
            'price' => $this->price,
            'offerPrice' => $this->offer_price,
            'shortDesc' => $this->short_desc,
            'description' => $this->description,
            'categoryId' => $this->category_id,
            'productImage' => $this->product_image,
            'status' => $this->status,
            'createdBy' => $this->created_by,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at
        ];
    }
}
