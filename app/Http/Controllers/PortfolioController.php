<?php

namespace App\Http\Controllers;

use App\Portfolio;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PortfolioController extends Controller
{
    public function getAll()
    {
        try {
            $portfolio = Portfolio::all();
            $contentData = DB::table('content')->where('page', '=', 'portfolio')->get();

            return view('admin/portfolio', ['portfolioData' => $portfolio, 'data' => $contentData]);
        } catch (Exception $err) {
        }
    }

    public function create(Request $request)
    {

        try {
            $imageName = 'no-image.png';

            if ($request->image) {
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $imageName = time() . '.' . $request->image->getClientOriginalExtension();

                $request->image->move(public_path('portfolioImages'), $imageName);
            }
            $newItem = $request->except('image');
            $newItem['image_url'] = $imageName;

            Portfolio::create($newItem);

            return redirect('/admin/portfolio')->with('status', 'Item cadastrado com sucesso');
        } catch (Exception $err) {


            return redirect('/admin/portfolio')->with('error', 'Arquivo inválido.');
        }
    }

    public function update(Request $request, $id)
    {
        $downloadsData = $request->except(['image', '_token']);
        try {
            if ($request->image) {
                $imageNow = Portfolio::select('image_url')->where('id', $id)->get();

                if ($imageNow[0]->image_url !== 'no-image.png') {
                    unlink(public_path() . '/portfolioImages/' . $imageNow[0]->image_url);
                }

                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $imageName = time() . '.' . $request->image->getClientOriginalExtension();

                $request->image->move(public_path('portfolioImages'), $imageName);

                $downloadsData['image_url'] = $imageName;
            }

            Portfolio::where('id', $id)->first()->update($downloadsData);

            return redirect('/admin/portfolio')->with('status', 'Item atualizado com sucesso');
        } catch (Exception $err) {
            return redirect('/admin/portfolio')->with('error', 'Ocorreu um erro ao atualizar item. Tente novamente mais tarde!');
        }
    }

    public function delete(Request $request, $id)
    {
        try {
            $portfolio = Portfolio::where('id', $id)->get();

            if ($portfolio[0]->image_url !== 'no-image.png') {
                unlink(public_path() . '/portfolioImages/' . $portfolio[0]->image_url);
            }

            Portfolio::where('id', $id)->first()->delete();

            return redirect('/admin/portfolio')->with('status', 'Item excluído com sucesso');
        } catch (Exception $err) {
            return redirect('/admin/portfolio')->with('error', 'Arquivo inválido.');
        }
    }
}
