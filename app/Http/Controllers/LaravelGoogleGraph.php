<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LaravelGoogleGraph extends Controller
{
    //
    function index (){
        $data = DB::table('barang')
        ->select(
            DB::raw('status as status'),
            DB::raw('count(*) as number'))
            ->groupBy('status')
            ->get();
        $array[] = ['status','Number'];
        foreach ($data as $key => $value)
        {
            $array[++$key] = [$value->status, $value->number];
        }
        return view('google_pie_chart')->with('status',json_encode($array));
    }
}
