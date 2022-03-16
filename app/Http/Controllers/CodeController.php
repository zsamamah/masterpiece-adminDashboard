<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CodeController extends Controller
{
    public function compile(Request $request)
    {
        $request['clientId'] = '5aa40928c66fe0f64d5a4dbb56901928';
        $request['clientSecret'] = '25f8d40ded3ca35040bdc202f77ebba35ffbe630474a5bc99df40f2da54632c0';
        $request['versionIndex'] = '0';
        
        $response = Http::post('https://api.jdoodle.com/v1/execute',[
            'script'=>$request['script'],
            'language'=>$request['language'],
            'stdin'=>$request['stdin'],
            'versionIndex'=>$request['versionIndex'],
            'clientId'=>$request['clientId'],
            'clientSecret'=>$request['clientSecret']
        ]);


        return response($response,200);
    }
}
