<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Book;
use Illuminate\Support\Facades\Redis as Cache;

class Redis extends Controller
{
    public function getData(){
      
        $data= Cache::get("listdata");
        if (empty($data)) {
            $data = DB::table('book')->get();
            if (!$data->isEmpty()) {
                Cache::set("listdata", json_encode($data));
            }
            $source="Database";
        } else {
            $data = json_decode($data);
            $source="Redis Cache";
        }
        return response()->json(["Data"=>$data,"Source"=>$source]);
    } 
}
