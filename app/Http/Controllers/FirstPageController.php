<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Content;
use Exception;

class FirstPageController extends Controller
{
    public function getContent(){
        try{
        $home = DB::table('content')->where('name','=', 'inicio')->get();    
            return view('welcome', ['textHome' => $home[0]->text]);
    
    } catch(Exception $e){
        return 'err';
    }

    }
}
