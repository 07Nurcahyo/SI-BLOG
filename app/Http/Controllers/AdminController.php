<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BukuModel;
use App\Models\AdminModel;
use App\Models\KategoriModel;
use App\Models\LokasiModel;
use App\Models\PenerbitModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    // public function main(){
    //     $buku = BukuModel::all();
    //     return view('admin.admin', ['data' => $buku]);
    // }
    // public function backup(){
    //     $buku = BukuModel::all();
    //     return view('admin.Backupadmin', ['data' => $buku]);
    // }
    // public function data_buku(){
    //     $buku = BukuModel::all();
    //     return view('admin.admin', ['data' => $buku]);
    //     $breadcrumb = (object) [
    //         'title' => 'Halaman data buku admin'
    //     ];
    // }

    public function login()
    {
        if (Auth::check()) {
            return redirect('main');
        }else{
            return view('admin/admin_login');
        }
    }

    public function actionlogin(Request $request)
    {
        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];
        $user = AdminModel::where([['username', $data['username']],['password', $data['password']]])->first();
        if ($user != null) {
            return view('admin.index');
        }else{
            // Session::flash('error', 'Username atau Password Salah');
            return redirect('login_admin');
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('login_admin');
    }

    // layouting
    public function index(){
        $breadcrumb = (object) [
            'title' => 'Daftar Buku',
            'list' => ['Home', 'Buku']
        ];
        $page = (object) [
            'title' => 'Daftar buku yang terdaftar dalam sistem'
        ];
        $activeMenu = 'admin'; //set menu yang sedang aktif
        $penerbit = PenerbitModel::all();
        $kategori = KategoriModel::all();
        $lokasi = LokasiModel::all();
        return view('admin.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'penerbit' => $penerbit, 'kategori' => $kategori, 'lokasi' => $lokasi, 'activeMenu' => $activeMenu]);
    }
    public function list(Request $request){
        $bukus = BukuModel::select('id_buku', 'isbn', 'judul_buku', 'tahun_terbit', 'kode_penerbit', 'kode_kategori', 'penulis', 'kode_rak', 'stok')->with('penerbit', 'kategori', 'lokasi');
        //filter
        if ($request->id_penerbit) {
            $p = strval($request->id_penerbit);
            $bukus->where('kode_penerbit', $p);
        }
        return DataTables::of($bukus)
            ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($buku) { // menambahkan kolom aksi
                $btn = '<a href="'.url('/admin/' . $buku->id_buku).'" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="'.url('/admin/' . $buku->id_buku . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="'.url('/admin/'.$buku->id_buku).'">'. csrf_field() . method_field('DELETE') .'<button type="submit" class="btn btn-danger btn-sm"onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }
    public function create(){
        $breadcrumb = (object) [
            'title' => 'Tambah Buku',
            'list' => ['Home', 'Buku', 'Tambah']
        ];
        $page = (object) [
            'title' => 'Tambah Buku baru'
        ];
        $activeMenu = "admin";
        $penerbit = PenerbitModel::all();
        $kategori = KategoriModel::all();
        $lokasi = LokasiModel::all();
        return view('admin.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'penerbit' => $penerbit, 'kategori' => $kategori, 'lokasi' => $lokasi, 'activeMenu' => $activeMenu]);
    }
    public function store(Request $request){
        $request->validate([
            'isbn'          => 'required|string|max:50',
            'judul_buku'    => 'required|string|max:200',
            'tahun_terbit'  => 'required',
            'kode_penerbit' => 'required|string|max:10|exists:penerbit,id_penerbit', //fk
            'kode_kategori' => 'required|string|max:10|exists:kategori,id_kategori', //fk
            'penulis'       => 'required|string|max:100',
            'kode_rak'      => 'required|string|max:10|exists:lokasi,id_rak', //fk
            'stok'          => 'required|integer'
        ]);
        BukuModel::create([
            'isbn'          => $request->isbn,
            'judul_buku'    => $request->judul_buku,
            'tahun_terbit'  => $request->tahun_terbit,
            'kode_penerbit' => $request->kode_penerbit, //fk
            'kode_kategori' => $request->kode_kategori, //fk
            'penulis'       => $request->penulis,
            'kode_rak'      => $request->kode_rak, //fk
            'stok'          => $request->stok
        ]);
        return redirect('/admin')->with('success', 'Data buku berhasil disimpan!');
        // return 'Yeah'+$request->tahun_terbit;
    }
    public function show(String $id){
        $buku = BukuModel::with('penerbit', 'kategori', 'lokasi')->find($id);
        $breadcrumb = (object) [
            'title' => 'Detail Buku',
            'list'  => ['Home', 'Buku', 'Detail']
        ];
        $page = (object) [
            'title' => 'Detail Buku'
        ];
        $activeMenu = 'admin';
        return view('admin.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'buku' => $buku, 'activeMenu' => $activeMenu]);
    }
    public function edit(String $id){
        $buku = BukuModel::find($id);
        $penerbit = PenerbitModel::all();
        $kategori = KategoriModel::all();
        $lokasi = LokasiModel::all();
        $breadcrumb = (object) [
            'title' => 'Edit Buku',
            'list' => ['Home', 'Buku', 'Edit']
        ];
        $page = (object) [
            'title' => 'Edit Buku'
        ];
        $activeMenu = 'admin';
        return view('admin.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'buku' => $buku,  'penerbit' => $penerbit, 'kategori' => $kategori, 'lokasi' => $lokasi, 'activeMenu' => $activeMenu]);
    }
    public function update(Request $request, String $id){
        $request->validate([
            'isbn'          => 'required|string|max:50',
            'judul_buku'    => 'required|string|max:200',
            'tahun_terbit'  => 'required',
            'kode_penerbit' => 'required|string|max:10', //fk
            'kode_kategori' => 'required|string|max:10', //fk
            'penulis'       => 'required|string|max:100',
            'kode_rak'      => 'required|string|max:10', //fk
            'stok'          => 'required|integer'
        ]);
        BukuModel::find($id)->update([
            'isbn'          => $request->isbn,
            'judul_buku'    => $request->judul_buku,
            'tahun_terbit'  => $request->tahun_terbit,
            'kode_penerbit' => $request->kode_penerbit, //fk
            'kode_kategori' => $request->kode_kategori, //fk
            'penulis'       => $request->penulis,
            'kode_rak'      => $request->kode_rak, //fk
            'stok'          => $request->stok
        ]);
        return redirect('/admin')->with('success', 'Data buku berhasil diubah!');
    }
    public function destroy(String $id){
        $check = BukuModel::find($id);
        if (!$check) {
            return redirect('/admin')->with('error', 'Data buku tidak ditemukan');
        }
        try {
            BukuModel::destroy($id);
            return redirect('/admin')->with('success', 'Data buku berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $te) {
            return redirect('/admin')->with('error', 'Data buku gagal di hapus karena masih terdapat table lain terkait dengan data ini');
        }
    }

}