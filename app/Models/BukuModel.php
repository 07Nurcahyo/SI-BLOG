<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BukuModel extends Model
{
    use HasFactory;

    protected $table = 'buku';
    protected $primaryKey = 'id_buku';

    protected $fillable = [
        'isbn',
        'judul_buku',
        'tahun_terbit',
        'kode_penerbit', //fk
        'kode_kategori', //fk
        'penulis',
        'kode_rak', //fk
        'stok',
        'gambar'
    ];

    public function penerbit(): BelongsTo{
        return $this->belongsTo(PenerbitModel::class, 'kode_penerbit', 'id_penerbit');
    }
    public function kategori(): BelongsTo{
        return $this->belongsTo(KategoriModel::class, 'kode_kategori', 'id_kategori');
    }
    public function lokasi(): BelongsTo{
        return $this->belongsTo(LokasiModel::class, 'kode_rak', 'id_rak');
    }
    public function image(): Attribute{
        return Attribute::make(
            get: fn ($gambar) => url('/storage/posts' . $gambar),
        );
    }
}
