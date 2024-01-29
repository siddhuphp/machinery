<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsRequest;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;

use Illuminate\Mail\Events\MessageSent;

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
        $fields['cc'] = 'vinodk120@gmail.com';
        $fields['bcc'] = 'siddharthaesunuri@gmail.com';
        $fields['to'] = 'info@resellrebuy.com';

        $sStatus = $this->sender($fields);
        $rStatus = $this->receiver($fields);
    
        dd($sStatus, $rStatus);


        
    }

    function sender(array $data)
    {
        $data['title'] = "We have received your query";
        try {
        Mail::to($data['email'])
            ->cc($data['cc'])
            ->bcc($data['bcc'])
            ->send(new TestEmail($data));
            return 'Email sent successfully';
        } catch (\Exception $e) {
            return 'Email sending failed: ' . $e->getMessage();
        }
    }

    function receiver(array $data)
    {
        $data['title'] = "You have received a query";
        try {
        Mail::to($data['email'])
            ->cc($data['cc'])
            ->bcc($data['bcc'])
            ->send(new TestEmail($data));
            return 'Email sent successfully';
        } catch (\Exception $e) {
            return 'Email sending failed: ' . $e->getMessage();
        }
    }


    public function contactUs(ContactUsRequest $request)
    {
        $request->validated();

        // $data = [
        //     'cc' => $request->about,
        //     'bcc' => $request->mission,
        //     'to' => $request->vision,
        // ];

        $fields['cc'] = 'vinodk120@gmail.com';
        $fields['bcc'] = 'siddharthaesunuri@gmail.com';
        $fields['to'] = 'info@resellrebuy.com';

        $sStatus = $this->sender($fields);
        $rStatus = $this->receiver($fields);
    
        dd($sStatus, $rStatus);
    //    return redirect('/contact-us');
    //    return redirect('admin-products')->with('success', 'Product updated successfully!');
    }
 
}
