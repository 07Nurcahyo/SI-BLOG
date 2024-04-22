<?php

namespace App\Http\Controllers;

use App\Models\LokasiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use App\Models\PenerbitModel;

class LokasiController extends Controller
{
        // layouting
        public function index(){
            $breadcrumb = (object) [
                'title' => 'Daftar Lokasi Buku',
                'list' => ['Home', 'Lokasi Buku']
            ];
            $page = (object) [
                'title' => 'Daftar lokasi buku yang terdaftar dalam sistem'
            ];
            $activeMenu = 'lokasi'; //set menu yang sedang aktif
            $lokasi = LokasiModel::all();
            return view('lokasi.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'lokasi' => $lokasi, 'activeMenu' => $activeMenu]);
        }
        public function list(Request $request){
            $lokasis = LokasiModel::select('id_rak', 'nama_rak', 'nama_ruang', 'lantai');
            //filter
            if ($request->id_rak) {
                $p = strval($request->id_rak);
                $lokasis->where('id_rak', $p);
            }
            return DataTables::of($lokasis)
                ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
                ->addColumn('aksi', function ($lokasi) { // menambahkan kolom aksi
                    $btn = '<a href="'.url('/lokasi/' . $lokasi->id_rak).'" class="btn btn-info btn-sm">Detail</a> ';
                    $btn .= '<a href="'.url('/lokasi/' . $lokasi->id_rak . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
                    $btn .= '<form class="d-inline-block" method="POST" action="'.url('/lokasi/'.$lokasi->id_rak).'">'. csrf_field() . method_field('DELETE') .'<button type="submit" class="btn btn-danger btn-sm"onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                    return $btn;
                })
                ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
                ->make(true);
        }
        public function create(){
            $breadcrumb = (object) [
                'title' => 'Tambah Lokasi Buku',
                'list' => ['Home', 'Lokasi Buku', 'Tambah']
            ];
            $page = (object) [
                'title' => 'Tambah Lokasi Buku baru'
            ];
            $activeMenu = "lokasi";
            $lokasi = LokasiModel::all();
            return view('lokasi.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'lokasi' => $lokasi, 'activeMenu' => $activeMenu]);
        }
        public function store(Request $request){
            $request->validate([
                'id_rak'     => 'required|string|max:10',
                'nama_rak'   => 'required|string|max:100',
                'nama_ruang' => 'required|string|max:100',
                'lantai'     => 'required|integer'
            ]);
            LokasiModel::create([
                'id_rak'     => $request->id_rak,
                'nama_rak'   => $request->nama_rak,
                'nama_ruang' => $request->nama_ruang,
                'lantai'     => $request->lantai
            ]);
            return redirect('/lokasi')->with('success', 'Data lokasi berhasil disimpan!');
        }
        public function show(String $id){
            $lokasi = LokasiModel::find($id);
            $breadcrumb = (object) [
                'title' => 'Detail Lokasi Buku',
                'list'  => ['Home', 'Lokasi Buku', 'Detail']
            ];
            $page = (object) [
                'title' => 'Detail Lokasi Buku'
            ];
            $activeMenu = 'lokasi';
            return view('lokasi.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'lokasi' => $lokasi, 'activeMenu' => $activeMenu]);
        }
        public function edit(String $id){
            $lokasi = LokasiModel::find($id);
            // $penerbit = PenerbitModel::all();
            $breadcrumb = (object) [
                'title' => 'Edit Lokasi Buku',
                'list' => ['Home', 'Lokasi Buku', 'Edit']
            ];
            $page = (object) [
                'title' => 'Edit Lokasi Buku'
            ];
            $activeMenu = 'lokasi';
            return view('lokasi.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'lokasi' => $lokasi, 'activeMenu' => $activeMenu]);
        }
        public function update(Request $request, String $id){
            $request->validate([
                'id_rak'     => 'required|string|max:10',
                'nama_rak'   => 'required|string|max:100',
                'nama_ruang' => 'required|string|max:100',
                'lantai'     => 'required|integer'
            ]);
            LokasiModel::find($id)->update([
                'id_rak'     => $request->id_rak,
                'nama_rak'   => $request->nama_rak,
                'nama_ruang' => $request->nama_ruang,
                'lantai'     => $request->lantai
            ]);
            return redirect('/lokasi')->with('success', 'Data lokasi buku berhasil diubah!');
        }
        public function destroy(String $id){
            $check = LokasiModel::find($id);
            if (!$check) {
                return redirect('/lokasi')->with('error', 'Data lokasi buku tidak ditemukan');
            }
            try {
                LokasiModel::destroy($id);
                return redirect('/lokasi')->with('success', 'Data lokasi buku berhasil dihapus');
            } catch (\Illuminate\Database\QueryException $te) {
                return redirect('/lokasi')->with('error', 'Data lokasi buku gagal di hapus karena masih terdapat table lain terkait dengan data ini');
            }
        }
}
