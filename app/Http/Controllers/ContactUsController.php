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
        Mail::to($data['user_email'])
            ->cc($data['cc'])
            ->bcc($data['bcc'])
            ->send(new TestEmail($data));
            return 1;
        } catch (\Exception $e) {
            return 0;
           // return 'Email sending failed: ' . $e->getMessage();
        }
    }

    function receiver(array $data)
    {
        $data['title'] = "You have received a query";
        try {
        Mail::to($data['company_email'])
            ->cc($data['cc'])
            ->bcc($data['bcc'])
            ->send(new TestEmail($data));
            return 1;
        } catch (\Exception $e) {
            return 0;
           // return 'Email sending failed: ' . $e->getMessage();
        }
    }


    public function contactUs(ContactUsRequest $request)
    {
        $request->validated();

        $fields = [
            'name' => $request->about,
            'user_email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        $fields['cc'] = 'vinodk120@gmail.com';
        $fields['bcc'] = 'siddharthaesunuri@gmail.com';
        $fields['company_email'] = 'info@resellrebuy.com';

        $sStatus = $this->sender($fields);
        $rStatus = $this->receiver($fields);
    
        if($sStatus && $rStatus)
        {
            return redirect('/contact-us')->with('success', 'Thank You, We received your query!');
        }
        return redirect('/contact-us');       
    }
 
}
