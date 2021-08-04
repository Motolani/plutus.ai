<?php

namespace App\Http\Controllers;

use App\Mail\EnquiryMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing');
    }

    public function sendEmail(Request $request)
    {
        //changing to be stored in the database
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'msg' => $request->msg
        ];
        Mail::to('mradelusi@gmail.com')->send(new EnquiryMail($details));
        return back()->with('message_sent', 'Your message has been sent successfully');
    }
}
