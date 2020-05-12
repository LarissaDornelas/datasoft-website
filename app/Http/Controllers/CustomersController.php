<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Mail\contactUs;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CustomersController extends Controller
{
    public function postMessage(Request $request)
    {
        try {
            $this->validate($request, ['name' => 'required', 'email' => 'required|email', 'message' => 'required', 'phone' => 'required']);
            $emailFrom = $request['email'];
            $subject = $request['subject'];
            $message = $request['message'];


            Customer::create($request->all());

            Mail::to('larissa.e.dornelas@gmail.com')->send(new contactUs($emailFrom, $subject, $message));

            // Mail::send(
            //     'emails.contactUs',
            //     array(
            //         'name' => $request->get('name'), 'email' => $request->get('email'), 'user_message' => $request->get('message')
            //     ),
            //     function ($message) use ($emailFrom, $subject) {
            //         $message->from($emailFrom);
            //         $message->to('larissa.e.dornelas@gmail.com', 'Admin')->subject($subject);
            //     }
            // );
            return redirect('/#fale-conosco')->with('success', 'Obrigado por nos contatar!');
        } catch (Exception $err) {
            dd($err);
        }
    }
}
