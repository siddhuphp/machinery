<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsRequest;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Storage;

class ContactUsController extends Controller
{
    use HttpResponses;
   
    

    public function sendMail(ContactUsRequest $request)
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
