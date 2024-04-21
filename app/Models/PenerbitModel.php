<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PenerbitModel extends Model
{
    use HasFactory;

    protected $table = 'penerbit';
    protected $primarykey = 'id_penerbit'; 

    protected $fillable = ['id_penerbit', 'nama_penerbit'];

    public function buku(): HasMany{
        return $this->hasMany(BukuModel::class, 'id_buku', 'id_buku');
    }
}
