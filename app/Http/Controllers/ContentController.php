<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Content;
use Exception;

class ContentController extends Controller
{
    public function getContent($page)
    {

        try {

            $contentData = DB::table('content')->where('page', '=', $page)->get();

            switch ($page) {
                case 'inicio':
                    return view('admin.home', ['data' => $contentData]);
                case 'sobre':
                    $aboutData = [];
                    foreach ($contentData as $item) {
                        switch ($item->name) {
                            case 'text':
                                $aboutData['text'] = $item;
                            case 'mission':
                                $aboutData['mission'] = $item;
                            case 'vision':
                                $aboutData['vision'] = $item;
                            case 'values':
                                $aboutData['values'] = $item;
                        }
                    }
                    return view('admin.about', ['data' => $aboutData]);
            }
        } catch (Exception $e) {
            return 'err';
        }
    }

    public function editContent(Request $request, $page, $name)
    {

        try {

            $data = $request->except(['_token']);
            DB::table('content')->where([['page', '=', $page], ['name', '=', $name]])->update($data);

            $contentData = DB::table('content')->where('page', '=', $page)->get();

            switch ($page) {
                case 'inicio':
                    return view('admin.home', ['data' => $contentData]);
                case 'about':
                    return view('admin.about', ['data' => $contentData]);
            }
        } catch (Exception $e) {
            dd($e);
        }
    }
}
