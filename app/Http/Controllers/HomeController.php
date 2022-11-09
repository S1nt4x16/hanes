<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() {

        $item = DB::table('item')
        ->select("id", "nama_item", "created_at")
        ->get();
        return view('index', ["item" => $item]);
    }

}
