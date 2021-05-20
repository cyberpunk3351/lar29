<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Data;

class ChartController extends Controller
{

        public function index() {
        $infos = Data::latest()->take(30)->get()->sortBy('id');
        $labels = $infos->pluck('id');
        $data = $infos->pluck('data');

        //dd($data);
        // return view('chart', compact('labels', 'data'));
        return response()->json(compact('labels', 'data'));
        }
}
