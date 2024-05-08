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

    public function listbook(){
        $penulis = DB::table('buku')
                    ->select('penulis')
                    ->distinct()
                    ->get();
        // dd($penulis);
        $penerbit = PenerbitModel::all();
        $tahun_terbit = BukuModel::select('tahun_terbit')->distinct()->orderBy('tahun_terbit','asc')->get();
        $kategori = KategoriModel::all();
        $buku = BukuModel::all();
        return view('guest.listbook', ['penulis' => $penulis, 'penerbit' => $penerbit, 'tahun_terbit' => $tahun_terbit, 'kategori' => $kategori, 'buku' => $buku]);
    }

    public function main(){
        return view('main');
    }
}
