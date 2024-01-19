<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsRequest;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Storage;

class ContactUsController extends Controller
{
    use HttpResponses;
   
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $request->validated();        

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

    public function sendMail(Request $request)
    {
        $fields = $request->validate(
            [
                'name' => 'required|string|min:3',
                'email' => 'required|email',
                'subject' => 'required|string',
                'message' => 'required|string'
            ]
        );
        $fields['cc'] = 'sathireddyeee@gmail.com';
        $fields['bcc'] = 'siddharthaesunuri@gmail.com';
        $fields['to'] = 'info@resellrebuy.com';

        $this->sender($fields);
        $this->receiver($fields);

        return redirect('contact')->with('success', 'successfully updated !');
    }

    function sender(array $data)
    {
        $data['title'] = "We have received your query";
        Mail::to($data['email'])
            ->cc($data['cc'])
            ->bcc($data['bcc'])
            ->send(new TestEmail($data));
    }

    function receiver(array $data)
    {
        $data['title'] = "You have received a query";
        Mail::to($data['email'])
            ->cc($data['cc'])
            ->bcc($data['bcc'])
            ->send(new TestEmail($data));
    }
 
}
