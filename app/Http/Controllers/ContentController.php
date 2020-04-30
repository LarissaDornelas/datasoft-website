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

    public function editContent(Request $request, $page)
    {
        try {
            switch ($page) {
                case 'inicio':
                    $data = $request->except(['_token']);
                    DB::table('content')->where('page', '=', 'inicio')->update($data);

                    $contentData = DB::table('content')->where('page', '=', $page)->get();
                    return view('admin.home', ['data' => $contentData]);

                case 'sobre':
                    $data = $request->except(['_token']);


                    if (array_key_exists('text', $data)) {
                        DB::table('content')->where([['page', '=', 'sobre'], ['name', '=', 'text']])->update(array('text' => $data['text']));
                    }
                    if (array_key_exists('mission', $data)) {
                        DB::table('content')->where([['page', '=', 'sobre'], ['name', '=', 'mission']])->update(array('text' => $data['mission']));
                    }
                    if (array_key_exists('vision', $data)) {
                        DB::table('content')->where([['page', '=', 'sobre'], ['name', '=', 'vision']])->update(array('text' => $data['vision']));
                    }
                    if (array_key_exists('values', $data)) {
                        DB::table('content')->where([['page', '=', 'sobre'], ['name', '=', 'values']])->update(array('text' => $data['values']));
                    }

                    $contentData = DB::table('content')->where('page', '=', $page)->get();

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
            dd($e);
        }
    }
}
