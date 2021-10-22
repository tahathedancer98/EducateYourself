<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact(){
        return view('contact');
    }

    public function send(Request $request){
        $params = $request->all();
        Mail::to('administrator@test.com')
            ->send(new ContactMail($params));
        return back();
    }
}
