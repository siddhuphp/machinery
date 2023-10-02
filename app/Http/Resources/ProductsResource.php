<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

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
            'offerPrice' => $this->offer_price?$this->offer_price:0,
            'shortDesc' => $this->short_desc,
            'description' => $this->description,
            'categoryId' => $this->category_id,
            'productImage' => $this->product_image? asset('storage/' .$this->product_image):NULL,
            'status' => $this->status,
            'createdBy' => $this->created_by,
            'createdAt' => Carbon::parse($this->created_at)->format('d-m-Y'),
            'updatedAt' => $this->updated_at
        ];
    }
}
