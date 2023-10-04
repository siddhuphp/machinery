<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Resources\ProductsResource;
use App\Http\Resources\CategoriesResource;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Products::query()
            ->select('products.*', 'categories.name as category_name')
            ->leftJoin('categories', 'categories.id', '=', 'products.category_id');

        // Apply search filter
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('name', 'like', '%' . $searchTerm . '%')
                ->orWhere('short_desc', 'like', '%' . $searchTerm . '%');
        }

        // Apply order by filter
        if ($request->has('order_by')) {
            $orderByColumn = $request->input('order_by');
            $sortOrder = $request->input('sort_order', 'asc');
            $query->orderBy($orderByColumn, $sortOrder);
        }

        // Filter by cateId
        if ($request->has('cateId')) {
            $customerId = $request->input('cateId');
            $query->where('category_id', $customerId);
        }

        // Retrieve results
        $data = $query->paginate(10);

        return $this->success([
            'products' => ProductsResource::collection($data),
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
    public function create(Request $request)
    {
        $categoryId = $request->input('categoryId'); // Assuming 'customer_id' is the key in the request

        $query = Categories::where('status', 'Active');

        if ($categoryId) {
            $query->where('id', $categoryId);
        }

        $category = $query->get();

        return view('createProduct', compact('category'));
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
    public function show($id)
    {
        $query = Products::query()
            ->select('products.*', 'categories.name as category_name')
            ->leftJoin('categories', 'categories.id', '=', 'products.category_id');
        $query->where('product_id', $id);

        // Retrieve results
        $data = $query->get();
        return $this->success([
            'Products' => ProductsResource::collection($data),
        ], '', 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $products, $id)
    {
        $query = Products::where('product_id', $id);
        $product =  $query->get();

        $categories = Categories::where('status', 'Active');
        $category =  $categories->get();

        return view('editProduct', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Products $products, $id)
    {
        $request->validated();

        // Find the product
        $product = Products::where('product_id', $id)->firstOrFail();

        $data = [
            'name' => $request->name,
            'status' => $request->status,
            'short_desc' => $request->short_desc,
            'description' => $request->description,
            'price' => $request->price,
            'offer_price' => $request->offer_price,
            'category_id' => $request->category_id,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_title,
            'meta_desc' => $request->meta_desc,
            'updated_by' => $request->user()->user_id,
        ];

        if (!empty($request->file('product_image'))) {

            // Get the old image name
            $oldImagePath = $product->product_image;

            $image = $request->file('product_image');
            $imagePath = $image->store('product_images', 'public');
            $data['product_image'] = $imagePath;

            // Remove the old image from the server if it exists
            if (isset($oldImagePath) && Storage::disk('public')->exists($oldImagePath)) {
                Storage::disk('public')->delete($oldImagePath);
            }
        }



        $update = Products::where('product_id', $id)->update($data);
        return $this->success([
            'Product' => $update,
        ], 'Product updated successfully!', 202);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the product
        $product = Products::where('product_id', $id)->firstOrFail();

        Products::where('product_id', $id)->delete();

        // Remove the old image from the server if it exists
        if (!empty($product->product_image) && Storage::disk('public')->exists($product->product_image)) {
            Storage::disk('public')->delete($product->product_image);
        }

        return $this->success([
            '',
        ], 'Product deleted successfully!', 410);
    }

    public function listProducts(Request $request)
    {
        $request['order_by'] = 'created_at';
        $request['sort_order'] = 'desc';
        $response = $this->index($request);

        // Check if the response was successful
        if ($response->getStatusCode() === 200) {
            $content = $response->getContent();
            $data = json_decode($content, true);
            return view('productsList', compact('data'));
        } else {
            return redirect("/")->with('error', 'Something went wrong! Please try again.');
        }
    }

    public function storeProduct(StoreProductRequest $request)
    {
        $response = $this->store($request);
        // Check if the response was successful
        if ($response->getStatusCode() === 201) {
            $content = $response->getContent();
            $data = json_decode($content, true);
            // dd($data['data']['item']);
            // $item = $data['item'];
            return redirect('admin-products')->with('success', 'Product added successfully!');
        } else {
            return redirect("/")->with('error', 'Something went wrong! Please try again.');
        }
    }

    public function updateProduct(UpdateProductRequest $request, Products $products, $id)
    {
        $response = $this->update($request, $products, $id);
        // dd($response);
        // Check if the response was successful
        if ($response->getStatusCode() === 202) {
            $content = $response->getContent();
            $data = json_decode($content, true);
            return redirect('admin-products')->with('success', 'Product updated successfully!');
        } else {
            return redirect("/")->with('error', 'Something went wrong! Please try again.');
        }
    }

    public function deleteProduct($id)
    {
        $response = $this->destroy($id);
        if ($response->getStatusCode() === 410) {
            $content = $response->getContent();
            $data = json_decode($content, true);
            return redirect('admin-products')->with('success', 'Product deleted successfully!');
        } else {
            return redirect("/")->with('error', 'Something went wrong! Please try again.');
        }
    }

    public function view($id)
    {
        $response = $this->show($id);

        // Check if the response was successful
        if ($response->getStatusCode() === 200) {
            $content = $response->getContent();
            $data = json_decode($content, true);
            return view('productView', compact('data'));
        } else {
            return redirect("/")->with('error', 'Something went wrong! Please try again.');
        }
    }
}
