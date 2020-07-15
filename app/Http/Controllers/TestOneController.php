<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class TestOneController extends Controller
{
    public function test1(Request $request){
        echo $request->get('name');
        $all = $request->all();
        dd($all);
    }
}
