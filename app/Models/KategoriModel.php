<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KategoriModel extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $primarykey = 'id_kategori';

    protected $fillable = ['jenis_kategori'];

    public function buku(): HasMany{
        return $this->hasMany(BukuModel::class, 'id_buku', 'id_buku');
    }
}
