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
}
