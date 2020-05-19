<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Mail\contactUs;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CustomersController extends Controller
{

    public function getAll()
    {
        try {
            $customers = Customer::all();

            if (sizeOf($customers) > 0) {
                return view('admin/customers', ['customersData' => $customers]);
            } else {
                return view('admin/customers', ['customersData' => []]);
            }
        } catch (Exception $e) {
            return view('admin/customers', ['customersData' => []]);
        }
    }

    public function postMessage(Request $request)
    {
        try {
            $this->validate($request, ['name' => 'required', 'email' => 'required|email', 'message' => 'required', 'phone' => 'required']);
            $userMail = $request['email'];
            $subject = $request['subject'];
            $message = $request['message'];

            $customer = Customer::where('email', $userMail)->first();

            if ($customer === null) {
                Customer::create($request->all());
            }
            Mail::to('sac@datasoftautomacao.com.br')->send(new contactUs($userMail, $subject, $message));

            return redirect('/#contact')->with('success', 'Obrigado por nos contatar!');
        } catch (Exception $err) {
            return redirect('/#contact')->with('error', 'Ocorreu um erro ao enviar emaill. Por favor, tente novamente mais tarde.');
        }
    }

    public function delete(Request $request, $id)
    {
        try {

            Customer::where('id', $id)->first()->delete();

            return redirect('/admin/clientes')->with('status', 'Cliente excluído com sucesso');
        } catch (Exception $err) {
            return redirect('/admin/clientes')->with('error', 'Ocorreu um erro ao excluir Cliente. Tente novamente mais tarde!');
        }
    }
}
