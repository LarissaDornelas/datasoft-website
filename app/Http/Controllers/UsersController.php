<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
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
}
