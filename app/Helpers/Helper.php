<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

Class Helper{
    Public static function getRedis($key){
        $check = DB::table('book')
        ->get();
 
        if ($check->isEmpty()) {
            return "";
        }

        return Redis::get($key);
    }

    Public static function setRedis($key, $value){
        $check = DB::table('book')
        ->get();
 
        if ($check->isEmpty()) {
            return "";

            return Redis::set($key,  $value);
        }
    }

    public static function redis_test(){
        try{
            $redis=Redis::connect('127.0.0.1',6379);
            return response('redis working');
        }catch(\Predis\Connection\ConnectionException $e){
            return response('error connection redis');
        }
    }
    
}