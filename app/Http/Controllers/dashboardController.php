<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;

class dashboardController extends Controller
{
    public function index(){

        $totalMahasiswa = DB::table('mahasiswa')->count('nama');
        $totalKeluhan = DB::table('keluhan')->count('keluhan');
        $totalAkun = DB::table('users')->count('nama');

        return view('dashboard', compact('totalMahasiswa', 'totalKeluhan', 'totalAkun'));
    }
}
