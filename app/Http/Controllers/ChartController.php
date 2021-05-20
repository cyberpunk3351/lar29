<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Data;
Use App\Events\RealTimeMessage;

class ChartController extends Controller
{

        public function index() {
        $infos = Data::latest()->take(30)->get()->sortBy('id');
        $labels = $infos->pluck('id');
        $data = $infos->pluck('data');

        // dd($infos);
        // return view('welcome', compact('labels', 'data'));
        return response()->json(compact('labels', 'data'));
        }

        public function add(Request $request) {
                return view('add');
        }

        public function store(Request $request) {
                Data::create($request->data);
                event(new RealTimeMessage('Hello World'));
                return view('add');
        }
}
