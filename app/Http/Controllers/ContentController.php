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
                case 'fale-conosco':
                    return view('admin.contact', ['data' => $contentData]);
                case 'servicos':
                    return view('admin.services', ['data' => $contentData]);
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


            $request['updated_at'] = date('Y-m-d H:i:s');
            switch ($page) {
                case 'inicio':
                    $data = $request->except(['_token']);
                    DB::table('content')->where('page', '=', 'inicio')->update($data);

                    $contentData = DB::table('content')->where('page', '=', $page)->get();
                    return view('admin.home', ['data' => $contentData]);

                case 'sobre':
                    $data = $request->except(['_token']);


                    if (array_key_exists('text', $data)) {
                        DB::table('content')->where([['page', '=', 'sobre'], ['name', '=', 'text']])->update(array('text' => $data['text'], 'updated_at' => $data['updated_at']));
                    }
                    if (array_key_exists('mission', $data)) {
                        DB::table('content')->where([['page', '=', 'sobre'], ['name', '=', 'mission']])->update(array('text' => $data['mission'],  'updated_at' => $data['updated_at']));
                    }
                    if (array_key_exists('vision', $data)) {
                        DB::table('content')->where([['page', '=', 'sobre'], ['name', '=', 'vision']])->update(array('text' => $data['vision'], 'updated_at' => $data['updated_at']));
                    }
                    if (array_key_exists('values', $data)) {
                        DB::table('content')->where([['page', '=', 'sobre'], ['name', '=', 'values']])->update(array('text' => $data['values'], 'updated_at' => $data['updated_at']));
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

                case 'fale-conosco':
                    $data = $request->except(['_token']);
                    DB::table('content')->where('page', '=', 'fale-conosco')->update($data);

                    $contentData = DB::table('content')->where('page', '=', $page)->get();
                    return view('admin.contact', ['data' => $contentData]);


                case 'servicos':
                    $data = $request->except(['_token']);
                    DB::table('content')->where('page', '=', 'servicos')->update($data);

                    $contentData = DB::table('content')->where('page', '=', $page)->get();
                    return view('admin.services', ['data' => $contentData]);

                case 'downloads':

                    $data = $request->except(['_token']);
                    DB::table('content')->where('page', '=', 'downloads')->update($data);

                    return redirect('/admin/downloads');

                case 'portfolio':

                    $data = $request->except(['_token']);
                    DB::table('content')->where('page', '=', 'portfolio')->update($data);

                    return redirect('/admin/portfolio');
            }
        } catch (Exception $e) {
            dd($e);
        }
    }
}
