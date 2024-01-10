<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateAboutRequest;
use App\Traits\HttpResponses;
use App\Models\Products;
use App\Models\Categories;
use App\Http\Resources\ProductsResource;
use App\Http\Resources\CategoriesResource;

class HomeController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->getProductData($request);
        return view('frontend.home', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $about = About::first(); // Assuming you only have one "About Us" entry.
        return view('updateAbout', compact('about'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAboutRequest $request)
    {
        $request->validated();

        $data = [
            'about' => $request->about,
            'mission' => $request->mission,
            'vision' => $request->vision,
        ];

        $aboutUs = About::first(); // Assuming you only have one "About Us" entry.
        $aboutUs->update($data);
        return $this->success([
            'About' => $aboutUs,
        ], 'About page updated successfully!', 202);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        //
    }


    public function updateAbout(UpdateAboutRequest $request)
    {
        $response = $this->update($request);
        // dd($response);
        // Check if the response was successful
        if ($response->getStatusCode() === 202) {
            $content = $response->getContent();
            $data = json_decode($content, true);
            return redirect('admin-about')->with('success', 'About page updated successfully!');
        } else {
            return redirect("/")->with('error', 'Something went wrong! Please try again.');
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function categories(Request $request)
    {
        $categories = Categories::select('categories.*')
        ->selectRaw('(SELECT COUNT(p.product_id) FROM products AS p WHERE p.status = "Active" AND p.category_id = categories.id) AS productsCount')
        ->where('categories.status', 'Active')
        ->get();
        $data = $this->getProductData($request);        
        return view('frontend.categories', compact('categories','data'));
    }

    public function prodtectDetails(Request $request)
    {
        $data = $this->getProductData($request);
        $relatedProducts = [];
        if(!empty($data[0]->category_id)) {
            $relatedProducts = $this->getCateProductData($data[0]->category_id);
        }
        
        return view('frontend.productDetails', compact('data','relatedProducts'));
    }


    /**
     * Display a listing of the resource.
     */
    public function about()
    {
        $about = About::first();
        return view('frontend.about', compact('about'));
    }

    /**
     * Display a listing of the resource.
     */
    public function contact()
    {
        $about = [];
        return view('frontend.contact', compact('about'));
    }


    private function getProductData(Request $request)
    {
        $query = Products::query()
        ->select('products.*', 'categories.name as category_name')
        ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
        ->where('products.status','Active');

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

        // Filter by proId
        if ($request->has('prodId')) {
            $proId = $request->input('prodId');
            $query->where('products.product_id', $proId);
        }

        // Retrieve results
        $data = $query->paginate(10);
        $data = ProductsResource::collection($data);
        return $data;
    }


    private function getCateProductData($cateId)
    {
        $query = Products::query()
        ->select('products.*', 'categories.name as category_name')
        ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
        ->where('products.status','Active');

       
        // Filter by cateId
        if ($cateId) {           
            $query->where('category_id', $cateId);
        }

        // Retrieve results
        $data = $query->paginate(10);
        $data = ProductsResource::collection($data);
        return $data;
    }
}
