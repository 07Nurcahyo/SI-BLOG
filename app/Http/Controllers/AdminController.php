<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BukuModel;
use App\Models\AdminModel;
use App\Models\KategoriModel;
use App\Models\LokasiModel;
use App\Models\PenerbitModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function login()
    {
        // if (Auth::check()) {
        //     return redirect('admin.dashboard');
        // }else{
        //     return view('admin/admin_login');
        // }
        $user = Auth::user();
        // kondisi jika usernya ada
        if ($user) {
            return redirect()->intended('admin');
        }
        return view('admin/admin_login');
    }

    public function proses_login(Request $request){
        // form username password wajib diisi
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        // ambil data request username dan password saja
        $credential = $request->only('username', 'password');
        if (Auth::attempt($credential)) {
            $user = Auth::user();
            if ($user) {
                return redirect()->intended('dashboard');
            }
            return redirect()->intended('/');
        }
        return redirect('login_admin')
            ->withInput()
            ->withErrors(['error' => 'Pastikan kembali username dan password yang dimasukkan sudah benar']);
    }

    public function logout(Request $request){
        // logout harus menghapus session
        $request->session()->flush();
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
        $activeMenu = 'buku'; //set menu yang sedang aktif
        $penerbit = PenerbitModel::all();
        $kategori = KategoriModel::all();
        $lokasi = LokasiModel::all();
        return view('admin.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'penerbit' => $penerbit, 'kategori' => $kategori, 'lokasi' => $lokasi, 'activeMenu' => $activeMenu]);
    }
    public function list(Request $request){
        $bukus = BukuModel::select('id_buku', 'isbn', 'judul_buku', 'tahun_terbit', 'kode_penerbit', 'kode_kategori', 'penulis', 'kode_rak', 'stok', 'gambar')->with('penerbit', 'kategori', 'lokasi');
        //filter
        if ($request->id_penerbit) {
            $p = strval($request->id_penerbit);
            $bukus->where('kode_penerbit', $p);
        }
        return DataTables::of($bukus)
            ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($buku) { // menambahkan kolom aksi
                $btn = '<a href="'.url('/admin/' . $buku->id_buku).'" class="btn btn-info btn-sm"><i class="fas fa-info-circle"></i></a> ';
                $btn .= '<a href="'.url('/admin/' . $buku->id_buku . '/edit').'" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="'.url('/admin/'.$buku->id_buku).'" id="delete_'.$buku->id_buku.'">'. csrf_field() . method_field('DELETE') .'<button type="" class="btn btn-danger btn-sm" onclick="return deleteConfirm(\''.$buku->id_buku.'\');"><i class="fas fa-trash-alt"></i></button></form>';
                // $btn .= '<script></script>';
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
            'stok'          => 'required|integer',
            'gambar'        => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        BukuModel::create([
            'isbn'          => $request->isbn,
            'judul_buku'    => $request->judul_buku,
            'tahun_terbit'  => $request->tahun_terbit,
            'kode_penerbit' => $request->kode_penerbit, //fk
            'kode_kategori' => $request->kode_kategori, //fk
            'penulis'       => $request->penulis,
            'kode_rak'      => $request->kode_rak, //fk
            'stok'          => $request->stok,
            // 'gambar'        => $request->image->hashName(),
            'gambar'        => $this->storeImage($request->file('gambar')),
        ]);
        return redirect('/admin');
    }
    protected function storeImage ($image)
    {
        if(!$image){
            return null;
        }
        $originalFileName = $image->getClientOriginalName();
        $hashedFileName = Hash::make($originalFileName);
        $extension = $image->getClientOriginalExtension();
        $filepath = 'images/'.$hashedFileName.'.'.$extension;
        Storage::disk('public')->put($filepath, file_get_contents($image));
        return $filepath;
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
            'stok'          => 'required|integer',
            'gambar'        => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $buku = BukuModel::find($id);
        $buku->update([
            'isbn'          => $request->isbn,
            'judul_buku'    => $request->judul_buku,
            'tahun_terbit'  => $request->tahun_terbit,
            'kode_penerbit' => $request->kode_penerbit, //fk
            'kode_kategori' => $request->kode_kategori, //fk
            'penulis'       => $request->penulis,
            'kode_rak'      => $request->kode_rak, //fk
            'stok'          => $request->stok,
            // 'gambar'        => $request->image->hashName(),
            'gambar'        => $request->hasFile('gambar') ? $this->storeImage($request->file('gambar')) : $buku->gambar,
            // 'gambar'        => $this->storeImage($request->file('gambar')),
        ]);
        return redirect('/admin');
    }
    public function destroy(String $id){
        $check = BukuModel::find($id);
        if (!$check) {
            return redirect('/admin')->with('error', 'Data buku tidak ditemukan');
        }
        try {
            BukuModel::destroy($id);
            return redirect('/admin');
        } catch (\Illuminate\Database\QueryException $te) {
            return redirect('/admin')->with('error', 'Data buku gagal di hapus karena masih terdapat table lain terkait dengan data ini');
        }
    }
    public function getBookCountByYear()
    {
        $data = BukuModel::select(DB::raw('COUNT(*) as total_buku'), 'tahun_terbit')
            ->groupBy('tahun_terbit')
            ->orderBy('tahun_terbit')
            ->get();

        return response()->json($data);
    }
    public function getBookCountByCategory()
    {
        $data = BukuModel::select(DB::raw('COUNT(*) as total_buku'), 'jenis_kategori')
            ->join('kategori', 'buku.kode_kategori', '=', 'kategori.id_kategori')
            ->groupBy('jenis_kategori')
            ->get();

        return response()->json($data);
    }
    public function getBookCount(){
        $data = [
            'book_count' => BukuModel::count(),
            'category_count' => KategoriModel::count(),
            'publisher_count' => PenerbitModel::count(),
            'distinct_author_count' => BukuModel::select(DB::raw('COUNT(DISTINCT penulis) AS distinct_author_count'))->first()->distinct_author_count,
        ];
        return response()->json($data);
    }

    public function deleteBuku(String $id){
        $check = BukuModel::find($id);
        if (!$check) {
            // return redirect('/kategori')->with('error', 'Data kategori tidak ditemukan');
            return '';
        }
        try {
            BukuModel::destroy($id);
            return response()->json(['success' => true]);
        } catch (\Illuminate\Database\QueryException $te) {
            return response()->json(['success' => false, 'error' => 'Data buku gagal di hapus karena masih terdapat table lain terkait dengan data ini']);
        }
        return view('admin.delete', ['id' => $id]);
    }

}