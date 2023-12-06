<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Showroom;

class showroomcontroller extends Controller
{
    public function index(){
        $showroom = Showroom::all();
        return view('showroom.index', compact('showroom'));
    }
    
    public function create(){
        return view('showroom.create');
    }

    public function store(request $request){
        Showroom::create([
            'nama_mobil'=> $request->name,
            'brand_mobil'=> $request->brand,
            'warna_mobil'=> $request->warna,
            'tipe_mobil'=> $request->tipe,
            'harga_mobil'=> $request->harga,
        ]);

        return redirect()->route('showroom.index');
    }
    
}

?>