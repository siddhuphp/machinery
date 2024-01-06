<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateAboutRequest;
use App\Traits\HttpResponses;

class HomeController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = [];
        return view('frontend.home', compact('about'));
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
    public function categories()
    {
        $about = [];
        return view('frontend.categories', compact('about'));
    }

    /**
     * Display a listing of the resource.
     */
    public function about()
    {
        $about = [];
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
}
