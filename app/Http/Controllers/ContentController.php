<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Content;
use Exception;

class ContentController extends Controller
{
    public function getContent($page){

        try{
        $contentData = DB::table('content')->where('name','=', $page)->get();
        
       
        if($page === 'inicio'){
            return view('admin.home', ['data' => $contentData[0]]);
        }
    } catch(Exception $e){
        return 'err';
    }



    }

    public function editContent(Request $request, $page){

        try{
        
           $data = $request->except(['_token']);
           DB::table('content')->where('name','=', $page)->update($data);
            
           $contentData = DB::table('content')->where('name','=', $page)->get();
        
       
           if($page === 'inicio'){
               return view('admin.home', ['data' => $contentData[0]]);
           }
        } catch(Exception $e){
            return $e;
        }


    }
}
