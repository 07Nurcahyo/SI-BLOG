<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenerbitModel;
use App\Models\PenerbitModel as ModelsPenerbitModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class PenerbitController extends Controller
{
    // layouting
    public function index(){
        $breadcrumb = (object) [
            'title' => 'Daftar Penerbit',
            'list' => ['Home', 'Penerbit']
        ];
        $page = (object) [
            'title' => 'Daftar penerbit yang terdaftar dalam sistem'
        ];
        $activeMenu = 'penerbit'; //set menu yang sedang aktif
        $penerbit = PenerbitModel::all();
        return view('penerbit.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'penerbit' => $penerbit, 'activeMenu' => $activeMenu]);
    }
    public function list(Request $request){
        $penerbits = PenerbitModel::select('id_penerbit', 'nama_penerbit');
        //filter
        if ($request->id_penerbit) {
            $p = strval($request->id_penerbit);
            $penerbits->where('kode_penerbit', $p);
        }
        return DataTables::of($penerbits)
            ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($penerbit) { // menambahkan kolom aksi
                $btn = '<a href="'.url('/penerbit/' . $penerbit->id_penerbit).'" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="'.url('/penerbit/' . $penerbit->id_penerbit . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="'.url('/penerbit/'.$penerbit->id_penerbit).'">'. csrf_field() . method_field('DELETE') .'<button type="submit" class="btn btn-danger btn-sm"onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }
    public function create(){
        $breadcrumb = (object) [
            'title' => 'Tambah Penerbit',
            'list' => ['Home', 'Penerbit', 'Tambah']
        ];
        $page = (object) [
            'title' => 'Tambah Penerbit baru'
        ];
        $activeMenu = "penerbit";
        $penerbit = PenerbitModel::all();
        return view('penerbit.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'penerbit' => $penerbit, 'activeMenu' => $activeMenu]);
    }
    public function store(Request $request){
        $request->validate([
            'id_penerbit'   => 'required|string|max:10',
            'nama_penerbit' => 'required|string|max:200'
        ]);
        PenerbitModel::create([
            'id_penerbit'   => $request->id_penerbit,
            'nama_penerbit' => $request->nama_penerbit
        ]);
        return redirect('/penerbit')->with('success', 'Data penerbit berhasil disimpan!');
    }
    public function show(String $id){
        $penerbit = PenerbitModel::find($id);
        $breadcrumb = (object) [
            'title' => 'Detail Penerbit',
            'list'  => ['Home', 'Penerbit', 'Detail']
        ];
        $page = (object) [
            'title' => 'Detail Penerbit'
        ];
        $activeMenu = 'penerbit';
        return view('penerbit.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'penerbit' => $penerbit, 'activeMenu' => $activeMenu]);
    }
    public function edit(String $id){
        $penerbit = PenerbitModel::find($id);
        // $penerbit = PenerbitModel::all();
        $breadcrumb = (object) [
            'title' => 'Edit Penerbit',
            'list' => ['Home', 'Penerbit', 'Edit']
        ];
        $page = (object) [
            'title' => 'Edit Penerbit'
        ];
        $activeMenu = 'penerbit';
        return view('penerbit.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'penerbit' => $penerbit, 'activeMenu' => $activeMenu]);
    }
    public function update(Request $request, String $id){
        $request->validate([
            'id_penerbit'   => 'required|string|max:10',
            'nama_penerbit' => 'required|string|max:200'
        ]);
        PenerbitModel::find($id)->update([
            'id_penerbit'   => $request->id_penerbit,
            'nama_penerbit' => $request->nama_penerbit
        ]);
        return redirect('/penerbit')->with('success', 'Data penerbit berhasil diubah!');
    }
    public function destroy(String $id){
        $check = PenerbitModel::find($id);
        if (!$check) {
            return redirect('/penerbit')->with('error', 'Data buku tidak ditemukan');
        }
        try {
            PenerbitModel::destroy($id);
            return redirect('/penerbit')->with('success', 'Data penerbit berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $te) {
            return redirect('/penerbit')->with('error', 'Data penerbit gagal di hapus karena masih terdapat table lain terkait dengan data ini');
        }
    }
}
