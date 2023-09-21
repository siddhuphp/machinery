<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Resources\CategoriesResource;
use App\Traits\HttpResponses;

class CategoriesController extends Controller
{
    use HttpResponses;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Categories::query();

        // Apply search filter
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('name', 'like', '%' . $searchTerm . '%');
        }

        // Apply order by filter
        if ($request->has('order_by')) {
            $orderByColumn = $request->input('order_by');
            $sortOrder = $request->input('sort_order', 'asc');
            $query->orderBy($orderByColumn, $sortOrder);
        }

        // Apply other filters as needed

        // Retrieve results
        $data = $query->paginate(10);

        return $this->success([
            'customers' => CategoriesResource::collection($data),
        ], '', 200);
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
    public function store(StoreCategoryRequest $request)
    {
        $request->validated();

        $data = Categories::create([
            'name' => $request->name,
            'status' => $request->status,
            'created_by' => $request->user()->user_id
        ]);

        return $this->success([
            'category' => CategoriesResource::collection([$data]),
        ], 'customer registered successfully!', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categories $categories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $categories)
    {
        //
    }
}
