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

    // public function list(){
    //     $books = [
    //         [
    //             'title' => 'Book 1',
    //             'author' => 'Author 1',
    //             'publisher' => 'Publisher 1',
    //             'year' => '2020',
    //             'category' => 'Category 1'
    //         ],
    //         [
    //             'title' => 'Book 2',
    //             'author' => 'Author 2',
    //             'publisher' => 'Publisher 2',
    //             'year' => '2019',
    //             'category' => 'Category 2'
    //         ],
    //         // Add more books as needed
    //     ];
        
    //     return view('books.index', ['books' => $books]);
    //     return view('guest.listbook');
    // }

    public function listbook(Request $request){
        $penulis = DB::table('buku')
                    ->select('penulis')
                    ->distinct()
                    ->get();
        $penerbit = PenerbitModel::all();
        $tahun_terbit = BukuModel::select('tahun_terbit')->distinct()->orderBy('tahun_terbit','asc')->get();
        $kategori = KategoriModel::all();

        if ($request->penerbit != null) {
            $buku = BukuModel::where('kode_penerbit', $request->penerbit)
            ->with('penerbit', 'kategori', 'lokasi')->get();
        } else {
            $buku = BukuModel::with('penerbit', 'kategori', 'lokasi')->get();
        }

        if ($request->tahun_terbit != null) {
            $buku = BukuModel::where('tahun_terbit', $request->tahun_terbit)
            ->with('penerbit', 'kategori', 'lokasi')->get();
        } else {
            $buku = BukuModel::with('penerbit', 'kategori', 'lokasi')->get();
        }

        if ($request->kategori != null) {
            $buku = BukuModel::where('kode_kategori', $request->kategori)
            ->with('penerbit', 'kategori', 'lokasi')->get();
        } else {
            $buku = BukuModel::with('penerbit', 'kategori', 'lokasi')->get();
        }

        // cari di listbook guest
        if ($request->search != null) {
            $buku = BukuModel::where('judul_buku', 'like', '%'.$request->search.'%')
            ->orWhereHas('penerbit', function ($query) use ($request) {
                $query->where('nama_penerbit', 'like', '%'.$request->search.'%');
            })
            ->orWhere('penulis', 'like', '%'.$request->search.'%')
            ->with('penerbit', 'kategori', 'lokasi')->get();
        }

        // sorting asc dsc
        if ($request->sort != null) {
            $buku = BukuModel::with('penerbit', 'kategori', 'lokasi')->orderBy('judul_buku',$request->sort)->get();
        }

        return view('guest.listbook', ['penulis' => $penulis, 'penerbit' => $penerbit, 'tahun_terbit' => $tahun_terbit, 'kategori' => $kategori, 'buku' => $buku]);
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
