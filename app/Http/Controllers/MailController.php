<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail()
    {
        $details = [
            'title' => 'Mail from SDSMAS-MANDLAKAZI',
            'body' => 'Testando email usando Gmail.'
        ];
        Mail::to("lelifork@gmail.com")->send(new TestMail($details));
        // return "Email Sent";
        return Redirect('add');
    }
}
