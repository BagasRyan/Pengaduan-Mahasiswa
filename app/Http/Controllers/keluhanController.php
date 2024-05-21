<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DataTables;
use Session;

class keluhanController extends Controller
{

    public function index(){

        if(request()->ajax()){
            $data = DB::table('keluhan')->get();
            
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    return `
                    <a href="" class="btn btn-success btn-sm"><i class="fas fa-pen"></i></a>
                    <button onclick="onDelete(this)"  class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                    `;
                })
                ->rawColumns(['action'])
                ->make();
        }

        $keluhan = DB::table('keluhan')->get();

        return view('keluhan.index', compact('keluhan'));
    }

    public function create(){
        return view('keluhan.create');
    }

    public function store(Request $request){

        // Mengambil kode terakhir
        $kode_terakhir = DB::table('keluhan')->max('kode_laporan');

        // Jika tidak ada data sebelumnya, set kode awal
        if (!$kode_terakhir) {
            $kode_baru = 'LPR1';
        } else {
            // Menambahkan 1 ke kode terakhir
            $nomor_terakhir = intval(substr($kode_terakhir, 3)); // Mengambil nomor dari kode terakhir dan mengonversi ke integer
            $nomor_baru = $nomor_terakhir + 1;

            // Membuat kode baru dengan format yang diinginkan
            $kode_baru = 'LPR' . str_pad($nomor_baru, 2); // Format nomor dengan 2 digit
        }

        DB::table('keluhan')->insert([
            'kode_laporan' => $kode_baru,
            'nama_mahasiswa' => $request->nama,
            'email' => $request->email,
            'no_telepon' => $request->telepon,
            'keluhan' => $request->keluhan
        ]);

        
        return redirect()->route('keluhan.index')->with('tambah', 'Data berhasil ditambahkan');
    }

    public function edit($id){

        $data = DB::table('keluhan')->where('id', $id)->first();

        return view('keluhan.edit', compact('data'));
    }

    public function update(Request $request){

        $id = $request->id;

        DB::table('keluhan')->where('id', $id)->update([
            'nama_mahasiswa' => $request->nama,
            'email' => $request->email,
            'no_telepon' => $request->telepon,
            'keluhan' => $request->keluhan
        ]);

        return redirect()->route('keluhan.index')->with('update', 'Data berhasil diedit');
    }

    public function delete($id){

        $data = DB::table('keluhan')->where('id', $id)->delete();

        if($data){
            return response()->json([
                'message' => 'Data berhasil dihapus',
                'status' => 'success'   
            ]);
        } else {
            return response()->json([
                'message' => 'Data gagal dihapus',
                'status' => 'error'
            ]);
        }

    }

    public function myComplaint($id){
        $keluhan = DB::table('keluhan')->where('id_mahasiswa', $id)->get();

        return view('keluhan.myComplaint', compact('keluhan'));
    }
}
