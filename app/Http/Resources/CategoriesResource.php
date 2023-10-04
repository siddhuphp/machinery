<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class CategoriesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'categoryId' => $this->id,
            'name' => $this->name,
            'status' => $this->status,
            'createdBy' => $this->created_by,
            'createdAt' => Carbon::parse($this->created_at)->format('d-m-Y'),
            'updatedAt' => $this->updated_at
        ];
    }
}
