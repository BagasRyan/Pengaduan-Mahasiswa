<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use DataTables;
use Session;

class userController extends Controller
{
    public function index(){

        if(request()->ajax()){
            $users = DB::table('mahasiswa')->get();

            return Datatables::of($users)
            ->addColumn('option', function($users){
                return '
                <a href="'.route('user.edit', $users->id).'" class="btn btn-sm btn-success">Edit</a>
                <button class="btn btn-sm btn-danger" onclick="onDelete(this)" id="'.$users->id.'">Hapus</button>
                ';
            })
            ->rawColumns(['option'])
            ->make();
        }

        return view('user.index');
    }

    public function create(){

        $userKategori = DB::table('kategori_user')->get();

        return view('user.create', compact('userKategori'));
    }

    public function store(Request $request){

        try{
        DB::beginTransaction();

        $idMahasiswa = DB::table('mahasiswa')->insertGetId([
            'nama' => $request->nama,
            'email' => $request->emailMahasiswa,
            'no_telepon' => $request->telepon
        ]);

        DB::table('users')->insert([
            'id_kategori_user' => $request->userKategori,
            'mahasiswa_id' => $idMahasiswa,
            'nama' => $request->nama,
            'email' => $request->emailAkun,
            'password' => Hash::make($request->password),
        ]); 

        DB::commit();

        return redirect()->route('user.index')->with('tambah', 'Data berhasil ditambahkan');

        } catch(\Exception $e){
            DB::rollback();

            return redirect()->back()->with('gagal', 'Data gagal disimpan');

        }
    }

    public function edit($id){
        $data = DB::table('mahasiswa')->where('id', $id)->first();

        return view('user.edit', compact('data'));
    }

    public function update(Request $request){

        $id = $request->id;

        DB::table('mahasiswa')->where('id', $id)->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_telepon' => $request->telepon
        ]);

        return redirect()->route('user.index')->with('update', 'Data berhasil diedit');
    }

    public function delete($id){

        $mahasiswa = DB::table('mahasiswa')->where('id', $id)->delete();
        $users = DB::table('users')->where('mahasiswa_id', $id)->delete();

        if($mahasiswa && $users){

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
}
