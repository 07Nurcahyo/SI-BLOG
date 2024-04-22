<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KategoriModel extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['id_kategori', 'jenis_kategori'];

    public function buku(): HasMany{
        return $this->hasMany(BukuModel::class, 'id_buku', 'id_buku');
    }
}
