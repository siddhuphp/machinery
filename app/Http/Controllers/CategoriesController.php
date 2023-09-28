<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
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
            'categories' => CategoriesResource::collection($data),
            'pagination' => [
                'total' => $data->total(),
                'per_page' => $data->perPage(),
                'current_page' => $data->currentPage(),
                'last_page' => $data->lastPage(),
                'first_page_url' => $data->url(1),
                'last_page_url' => $data->url($data->lastPage()),
                'next_page_url' => $data->nextPageUrl(),
                'prev_page_url' => $data->previousPageUrl()
            ],
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
    public function show(Categories $categories, $id)
    {
        $data = Categories::where('id', $id)->first();
        return $this->success([
            'categories' => $data ? new CategoriesResource($data) : '',
        ], '', 200);
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
    public function update(UpdateCategoryRequest $request, Categories $categories, $id)
    {
        $jsonData = $request->json()->all();

        $validColumns = ['name', 'status'];
        $data = [];
        foreach ($validColumns as $column) {
            if (array_key_exists($column, $jsonData)) {
                $data[$column] = $jsonData[$column];
            }
        }

        $data['updated_by'] = $request->user()->user_id;
        Categories::where('id', $id)->update($data);

        return $this->success([], 'categories updated successfully!', 202);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $categories, $id)
    {
        Categories::where('id', $id)->delete();
        return $this->success([
            '',
        ], 'Category deleted successfully!', 200);
    }


    public function listCategories(Request $request)
    {
        $response = $this->index($request);

        // Check if the response was successful
        if ($response->getStatusCode() === 200) {
            $content = $response->getContent();
            $data = json_decode($content, true);
            return view('categoriesList', compact('data'));
        } else {
            return redirect("/")->with('error', 'Something went wrong! Please try again.');
        }
    }
}
