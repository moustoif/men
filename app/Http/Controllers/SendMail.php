<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\PushMail;
use App\Http\Requests\WriteMail;
use Illuminate\Support\Facades\Mail;

class SendMail extends Controller
{
    public function sendMail(WriteMail $request)
    {
        $request->validated();
        $details = [
            "title" => $request->sujet,
            "body" => $request->message
        ];
        Mail::to($request->email)->send(new PushMail($details));
        echo "<h1>Mail sent</h1>";
    }
}
