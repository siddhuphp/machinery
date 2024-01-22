<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsRequest;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;

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

        $s = $this->sender($fields);
        $r = $this->receiver($fields);

        dd($s);
        
        dd($r);


        
    }

    function sender(array $data)
    {
        $data['title'] = "We have received your query";
        $mail = Mail::to($data['email'])
            ->cc($data['cc'])
            ->bcc($data['bcc'])
            ->send(new TestEmail($data));
        // Check if the email was sent successfully
        if ($mail->failures()) {
            return 'Email sending failed for some recipients';
        }

        return 'Email sent successfully';
    }

    function receiver(array $data)
    {
        $data['title'] = "You have received a query";
        $mail = Mail::to($data['email'])
            ->cc($data['cc'])
            ->bcc($data['bcc'])
            ->send(new TestEmail($data));

             // Check if the email was sent successfully
        if ($mail->failures()) {
            return 'Email sending failed for some recipients';
        }

        return 'Email sent successfully';
    }
 
}
