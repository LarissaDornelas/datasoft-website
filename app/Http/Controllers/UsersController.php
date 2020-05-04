<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Exception;

class UsersController extends Controller
{
    function getUsers()
    {

        try {
            $users = User::all();

            if (sizeOf($users) > 0) {
                return view('admin/users', ['userData' => $users]);
            } else {
                return view('admin/users', ['userData' => []]);
            }
        } catch (Exception $e) {
            return view('admin/users', ['userData' => []]);
        }
    }

    function createUser(Request $request)
    {
        try {
            $newUser = $request->except('_token', 'confirm-password');
            $hashedRandomPassword = Hash::make($request['password']);

            $newUser['password'] = $hashedRandomPassword;

            $user = User::where('email', $newUser['email'])->get();

            if (sizeOf($user) > 0) {
                return redirect('/admin/usuarios')->with('error', 'Email já cadastrado.');
            }

            User::create($newUser);

            return redirect('/admin/usuarios')->with('status', 'Usuário cadastrado com sucesso');
        } catch (Exception $err) {

            return redirect('/admin/usuarios')->with('error', 'Houve um erro ao cadastrar usuário');
        }
    }

    function getProfile()
    {
        return view('admin.profile');
    }

    function changePassword(Request $request)
    {


        try {
            $user = User::where('email', Auth::User()->email)
                ->first();

            if ($user != null && Hash::check($request['passwordNow'], $user->password)) {
                $hashedRandomPassword = Hash::make($request['password']);

                User::where('email', Auth::User()->email)->first()->update(array('password' => $hashedRandomPassword));


                return redirect('/admin/editar-perfil')->with('success', 'Senha atualizada com sucesso');
            } else {
                return redirect('/admin/editar-perfil')->with('errorPassword', 'Senha atual incorreta');
            }
        } catch (Exception $err) {
        }
    }
    function changeName(Request $request)
    {
        dd($request);
    }

    function deleteAccount()
    {
        return view('admin.profile');
    }
}
