<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Resources\ProductsResource;
use App\Traits\HttpResponses;

class ProductsController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $request->validated();

        $imagePath = '';
        if (!empty($request->file('product_image'))) {
            $image = $request->file('product_image');
            $imagePath = $image->store('product_images', 'public');
        }

        $data = Products::create([
            'name' => $request->name,
            'status' => $request->status,
            'short_desc' => $request->short_desc,
            'description' => $request->description,
            'price' => $request->price,
            'offer_price' => $request->offer_price,
            'category_id' => $request->category_id,
            'product_image' => $imagePath,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_title,
            'meta_desc' => $request->meta_desc,
            'created_by' => $request->user()->user_id,
            'product_id' => uniqid("pro_") . date('YmdHis') . uniqid(),
        ]);

        return $this->success([
            'Product' => ProductsResource::collection([$data]),
        ], 'Product registered successfully!', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $products)
    {
        //
    }
}
