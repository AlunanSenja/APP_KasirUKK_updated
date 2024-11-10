<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';
    protected $fillable = ['tanggal_penjualan', 'total_harga', 'pelanggan_id'];
   

    public static function getPenjualanWithPelanggan() {
        return DB::table('penjualan')
            ->leftJoin('pelanggan', 'pelanggan.id', '=', 'penjualan.pelanggan_id')
            ->select('penjualan.*', 'pelanggan.nama_pelanggan')
            ->get();
        return $penjualan;
    }
}

