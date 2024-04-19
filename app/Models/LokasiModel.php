<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LokasiModel extends Model
{
    use HasFactory;

    protected $table = 'lokasi';
    protected $primarykey = 'id_rak';

    protected $fillable = ['nama_rak', 'nama_ruang', 'lantai'];

    public function buku(): HasMany{
        return $this->hasMany(BukuModel::class, 'id_buku', 'id_buku');
    }
}
