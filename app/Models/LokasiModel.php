<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LokasiModel extends Model
{
    use HasFactory;

    protected $table = 'lokasi';
    protected $primaryKey = 'id_rak';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['id_rak', 'nama_rak', 'nama_ruang', 'lantai'];

    public function buku(): HasMany{
        return $this->hasMany(BukuModel::class, 'id_buku', 'id_buku');
    }
}
