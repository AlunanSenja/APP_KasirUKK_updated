<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use App\Models\Pelanggan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenjualanController extends Controller
{
    
    // public function __construct()
    // {
    //     if(!Auth::check()){
    //         abort(403);
    //     }
    //     session(['menu'=> 'penjualan']);
    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penjualan = Penjualan::getPenjualanWithPelanggan();
        return view('penjualan.index', compact('penjualan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pelanggan = Pelanggan::all();
        $detail = DetailPenjualan::getDetailPenjualanWithProduk()->whereNUll('penjualan_id');

        return view('penjualan.create', compact(['pelanggan', 'detail']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
          'pelanggan_id' => 'required',
          'total_harga' => 'required|integer|min:1',
          'tanggal_penjualan' => 'required',      
        ]);

        $penjualan_id = Penjualan::create([
            'pelanggan_id' => $request->pelanggan_id,
            'total_harga' => $request->total_harga,
            'tanggal_penjualan' => $request->tanggal_penjualan
        ]);

        $penjualan_id = $penjualan_id;
        $pdetail = DetailPenjualan::getDetailPenjualanWithProduk()->whereNull('penjualan_id');

        foreach($pdetail as $dp) {
            // $id = $dp->penjualan_id;
            $detail = DetailPenjualan::findOrFail($dp->id);
            $detail->update(['penjualan_id' => $penjualan_id]);
        }

        return redirect()->route('penjualan.index')->with('success','berhasil menyimpan data penjualan');
        
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $detail = DetailPenjualan::getDetailPenjualanWithProduk()->where('penjualan_id', '=', $id);
        return view('penjualan.show', compact('detail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        DetailPenjualan::deleteDetailPenjualanByid($id);
        Penjualan::findOrFail($id)->delete();
        return redirect()->route('penjualan.index')->with('success', 'data penjualan telah di hapus');
    }
}
