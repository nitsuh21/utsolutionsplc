<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subscriber;
class SubscribeController extends Controller
{
    public function index(Request $request){
        $request->validate([
            'email' => 'required|email'
          ]);

        $data = [
        'email' => $request->email
        ];
        $subscriber = new Subscriber();
        $subscriber->email = $data['email'];
        $subscribers = Subscriber::get();
        foreach($subscribers as $sub){
            if($sub->email == $subscriber->email )
            {
                return back()->witherror(['message' => 'already subscribed!']);
            }
            else
            {
                $subscriber->save();
                return back()->with(['message' => 'you are successfully subscribed!']);
            }
        };
        
    }
}
