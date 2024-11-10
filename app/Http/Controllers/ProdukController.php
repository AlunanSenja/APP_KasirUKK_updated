<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use  App\Models\Produk;
use Illuminate\Support\Facades\Auth;
class ProdukController extends Controller
{

    // public function __construct()
    // {
    //     if(!Auth::check() || Auth::user()->level != 'admin'){
    //         abort(403);
    //     }
    //     session(['menu'=> 'user']);
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::all();
        return view('produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
         'nama_produk' => 'required',
         'harga' => 'required',
         'stok' => 'required',
        ]);

        Produk::create([
         'nama_produk' => $request->nama_produk,
         'harga' => $request->harga,
         'stok' => $request->stok,
        ]);
        return redirect()->route('produk.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.show', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
         'nama_produk' => 'required',
         'harga' => 'required|numeric',
         'stok' => 'required|integer',
        ]);

        $produk = Produk::findOrFail($id);

        $data = [
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok
        ];
        $produk->update($data);
        return redirect()->route('produk.index')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = Produk::findOrFail($id);

        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'Data Berhasil Dihapus');
    }
}
