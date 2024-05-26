<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use App\Models\PenerbitModel;

class KategoriController extends Controller
{
    // layouting
    public function index(){
        $breadcrumb = (object) [
            'title' => 'Daftar Kategori',
            'list' => ['Home', 'Kategori']
        ];
        $page = (object) [
            'title' => 'Daftar kategori yang terdaftar dalam sistem'
        ];
        $activeMenu = 'kategori'; //set menu yang sedang aktif
        $kategori = KategoriModel::all();
        return view('kategori.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }
    public function list(Request $request){
        $kategoris = KategoriModel::select('id_kategori', 'jenis_kategori');
        //filter
        if ($request->id_kategori) {
            $p = strval($request->id_kategori);
            $kategoris->where('id_kategori', $p);
        }
        return DataTables::of($kategoris)
            ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($kategori) { // menambahkan kolom aksi
                $btn = '<a href="'.url('/kategori/' . $kategori->id_kategori).'" class="btn btn-info btn-sm">Detail <i class="fas fa-info-circle"></i></a> ';
                $btn .= '<a href="'.url('/kategori/' . $kategori->id_kategori . '/edit').'" class="btn btn-warning btn-sm">Edit <i class="fas fa-edit"></i></a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="'.url('/kategori/'.$kategori->id_kategori).'">'. csrf_field() . method_field('DELETE') .'<button type="submit" class="btn btn-danger btn-sm"onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus <i class="fas fa-trash"></i></button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }
    public function create(){
        $breadcrumb = (object) [
            'title' => 'Tambah Kategori',
            'list' => ['Home', 'Kategori', 'Tambah']
        ];
        $page = (object) [
            'title' => 'Tambah Kategori baru'
        ];
        $activeMenu = "kategori";
        $kategori = KategoriModel::all();
        return view('kategori.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }
    public function store(Request $request){
        $request->validate([
            'id_kategori'   => 'required|string|max:10',
            'jenis_kategori' => 'required|string|max:100'
        ]);
        KategoriModel::create([
            'id_kategori'   => $request->id_kategori,
            'jenis_kategori' => $request->jenis_kategori
        ]);
        return redirect('/kategori')->with('success', 'Data kategori berhasil disimpan!');
    }
    public function show(String $id){
        $kategori = KategoriModel::find($id);
        $breadcrumb = (object) [
            'title' => 'Detail Kategori',
            'list'  => ['Home', 'Kategori', 'Detail']
        ];
        $page = (object) [
            'title' => 'Detail Kategori'
        ];
        $activeMenu = 'kategori';
        return view('kategori.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }
    public function edit(String $id){
        $kategori = KategoriModel::find($id);
        // $penerbit = PenerbitModel::all();
        $breadcrumb = (object) [
            'title' => 'Edit Kategori',
            'list' => ['Home', 'Kategori', 'Edit']
        ];
        $page = (object) [
            'title' => 'Edit Kategori'
        ];
        $activeMenu = 'kategori';
        return view('kategori.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }
    public function update(Request $request, String $id){
        $request->validate([
            'id_kategori'   => 'required|string|max:10',
            'jenis_kategori' => 'required|string|max:100'
        ]);
        KategoriModel::find($id)->update([
            'id_kategori'   => $request->id_kategori,
            'jenis_kategori' => $request->jenis_kategori
        ]);
        return redirect('/kategori')->with('success', 'Data kategori berhasil diubah!');
    }
    public function destroy(String $id){
        $check = KategoriModel::find($id);
        if (!$check) {
            return redirect('/kategori')->with('error', 'Data kategori tidak ditemukan');
        }
        try {
            KategoriModel::destroy($id);
            return redirect('/kategori')->with('success', 'Data kategori berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $te) {
            return redirect('/kategori')->with('error', 'Data kategori gagal di hapus karena masih terdapat table lain terkait dengan data ini');
        }
    }
}
