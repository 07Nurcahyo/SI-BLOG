<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuModel extends Model
{
    use HasFactory;

    protected $table = 'buku';
    protected $primarykey = 'id_buku';

    // protected $fillable = [
    //     'isbn',
    //     'judul_buku',
    //     'tahun_terbit',
    //     'penerbit',
    //     'kode_kategori',
    //     'kode_penulis',
    //     'kode_rak',
    //     'stok',
    //     'tes_qrcode'
    // ];
}
