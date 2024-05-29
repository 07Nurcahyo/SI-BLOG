<?php

namespace App\Http\Controllers;

use App\Models\BukuModel;
use App\Models\KategoriModel;
use App\Models\PenerbitModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    public function index(){
        return view('guest.statistik');
    }

    public function listbook(Request $request){
        $penulis = DB::table('buku')
                    ->select('penulis')
                    ->distinct()
                    ->orderBy('penulis','asc')
                    ->get();
        $penerbit = PenerbitModel::all();
        $tahun_terbit = BukuModel::select('tahun_terbit')->distinct()->orderBy('tahun_terbit','asc')->get();
        $kategori = KategoriModel::all();

        $buku = BukuModel::with('penerbit', 'kategori', 'lokasi');

        if ($request->penerbit != null) {
            $buku = $buku->where('kode_penerbit', $request->penerbit);
        }

        if ($request->tahun_terbit != null) {
            $buku = $buku->where('tahun_terbit', $request->tahun_terbit);
        }

        if ($request->kategori != null) {
            $buku = $buku->where('kode_kategori', $request->kategori);
        }

        if ($request->search != null) {
            $buku = $buku->where(function ($query) use ($request) {
                $query->where('judul_buku', 'like', '%'.$request->search.'%')
                    ->orWhereHas('penerbit', function ($query) use ($request) {
                        $query->where('nama_penerbit', 'like', '%'.$request->search.'%');
                    })
                    ->orWhere('penulis', 'like', '%'.$request->search.'%');
            });
        }

        if ($request->penulis != null) {
            $buku = $buku->where('penulis', 'like', '%'.$request->penulis.'%');
        }

        if ($request->sort != null) {
            $buku = $buku->orderBy('judul_buku', $request->sort);
        }

        $buku = $buku->get();

        return view('guest.listbook', compact('penulis', 'penerbit', 'tahun_terbit', 'kategori', 'buku'));
    }

    public function getDataBuku(int $id_buku){
        // $buku = BukuModel::find($id_buku);
        $buku = BukuModel::with('penerbit', 'kategori', 'lokasi')->find($id_buku);
        return response()->json($buku);
    }

    public function main(){
        return view('main');
    }
}
