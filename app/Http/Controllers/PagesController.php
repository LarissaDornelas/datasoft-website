<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Content;
use App\Download;
use App\Portfolio;
use Exception;

class PagesController extends Controller
{
    public function getContentFirstPage()
    {
        try {
            $home = DB::table('content')->where('page', '=', 'inicio')->get();
            $contact = DB::table('content')->where('page', '=', 'fale-conosco')->get();
            $services = DB::table('content')->where('page', '=', 'servicos')->get();
            $about = DB::table('content')->where('page', '=', 'sobre')->get()->toArray();

            $aboutData = [];
            foreach ($about as $item) {
                switch ($item->name) {
                    case 'text':
                        $aboutData['text'] = $item->text;
                    case 'mission':
                        $aboutData['mission'] = $item->text;
                    case 'vision':
                        $aboutData['vision'] = $item->text;
                    case 'values':
                        $aboutData['values'] = $item->text;
                }
            }

            return view('welcome', ['homeData' => $home, 'aboutData' => $aboutData, 'contactData' => $contact, 'servicesData' => $services]);
        } catch (Exception $e) {
        }
    }

    public function getContentDownloads()
    {
        try {
            $linksData = Download::all();
            $downloads = DB::table('content')->where('page', '=', 'downloads')->get();

            return view('downloads', ['linksData' => $linksData, 'downloadsData' => $downloads]);
        } catch (Exception $e) {
        }
    }
    public function getContentPortfolio()
    {
        try {
            $itemsData = Portfolio::all();
            $portfolio = DB::table('content')->where('page', '=', 'portfolio')->get();

            return view('portfolio', ['itemsData' => $itemsData, 'portfolioData' => $portfolio]);
        } catch (Exception $e) {
        }
    }
}
