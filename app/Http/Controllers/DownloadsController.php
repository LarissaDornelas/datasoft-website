<?php

namespace App\Http\Controllers;

use App\Download;
use Exception;
use Illuminate\Http\Request;

class DownloadsController extends Controller
{
    public function create(Request $request)
    {
        $downloadsData = $request->except('_token');
        try {
            Download::create($downloadsData);

            return redirect('/admin/downloads')->with('status', 'Download cadastrado com sucesso');
        } catch (Exception $err) {
            return redirect('/admin/downloads')->with('error', 'Ocorreu um erro ao cadastrar Download. Tente novamente mais tarde!');
        }
    }
    public function getAll()
    {
        try {
            $downloads = Download::all();

            return view('admin/downloads', ['downloadsData' => $downloads]);
        } catch (Exception $err) {
        }
    }

    public function update(Request $request, $id)
    {
        $downloadsData = $request->except('_token');
        try {
            Download::where('id', $id)->first()->update($downloadsData);

            return redirect('/admin/downloads')->with('status', 'Download atualizado com sucesso');
        } catch (Exception $err) {
            return redirect('/admin/downloads')->with('error', 'Ocorreu um erro ao atualizar Download. Tente novamente mais tarde!');
        }
    }
    public function delete(Request $request, $id)
    {
        try {
            Download::where('id', $id)->first()->delete();

            return redirect('/admin/downloads')->with('status', 'Download excluído com sucesso');
        } catch (Exception $err) {
            return redirect('/admin/downloads')->with('error', 'Ocorreu um erro ao excluir Download. Tente novamente mais tarde!');
        }
    }
}
