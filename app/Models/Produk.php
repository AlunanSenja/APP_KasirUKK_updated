<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $fillable = ['nama_produk', 'harga', 'stok'];
    public $timestamps = false;

    public static function getStokProduk() {
        return DB::table('produk')
            ->leftJoin('detail_penjualan', 'detail_penjualan.produk_id', '=', 'produk.id')
            ->selectRaw('SUM(detail_penjualan.jumlah_produk) as terjual, produk.*')
            ->groupBy('produk.id', 'produk.nama_produk')
            ->get();
    }

    public static function getStokProdukById(String $id){
        // return DB::table('produk')
        // ->leftJoin('detail_penjualan', 'detail_penjualan.produk_id', '=', 'produk_id')
        // ->selectRaw('SUM(detail_penjualan.jumlah_poduk) as terjual, produk.*')
        // ->groupBy('produk_id', 'produk.nama_produk')
        // ->where('produk.id', $id)
        // ->get();
    }
}
