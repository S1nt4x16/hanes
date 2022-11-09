<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function index()
    {
        $keranjang = DB::table('keranjang as a')
        ->join('item as b', 'a.id_item', '=', 'b.id')
        ->select('a.id', 'b.nama_item', 'a.created_at', 'a.updated_at')
        ->get();

        return view('keranjang', ["keranjang" => $keranjang]);
    }

    public function store(Request $request)
    {
        $id_item = $request->input('id_item');

        DB::table('keranjang')
        ->insert([
            'id_item'=> $id_item,
            'id_user'=> Auth::user()->id,
            'created_at' => now()
        ]);

        return redirect()->route('home_master');
          
    }
}
