<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userKategoriController extends Controller
{
    public function index(){
        $userCategory = DB::table('kategori_user')->get();

        return view('userKategori.index', compact('userCategory'));
    }

    public function create(){
        return view('userKategori.create');
    }

    public function store(Request $request){
        
        DB::table('kategori_user')->insert(['nama' => $request->nama]);

        return redirect()->route('user.kategori.index')->with('tambah', 'Data  berhasil ditambahkan');
    }

    public function edit($id){
        $data = DB::table('kategori_user')->where('id', $id)->first();

        return view('userKategori.edit', compact('data'));
    }

    public function update(Request $request){
        $id = $request->id;

        DB::table('kategori_user')->where('id', $id)->update(['nama' => $request->nama]);

        return redirect()->route('user.kategori.index')->with('update', 'Data berhasil diedit');
    }

    public function delete($id){
        $data = DB::table('kategori_user')->where('id', $id)->delete();

        if($data){
            return response()->json([
                'message' => 'Data berhasil ditambhakan',
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'message' => 'Data berhasil ditambahkan',
                'status' => 'error'
            ]);
        }
    }
}
