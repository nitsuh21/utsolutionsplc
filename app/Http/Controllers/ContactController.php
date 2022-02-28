<?php

namespace App\Http\Controllers;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    public function sendMail(Request $request)
    {   
        $details = [
          'subject' => $request->subject,
          'name' => $request->name,
          'email' => $request->email,
          'content' => $request->message
        ];

        Mail::to('nitsuhdemissew21@gmail.com')->send(new ContactMail($details));
        return back()->with('message_sent','Email successfully sent!');
    }
}
