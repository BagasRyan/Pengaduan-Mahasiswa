@extends('layout.app')

@section('title', 'Dashboard')

@section('header', 'Dashboard')

@section('content')
<div class="p-3">
    <h3>Dashboard</h3>
    <p>Menampilkan seluruh data keluhan</p>
</div>
<div class="row">
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $totalAkun }}</h3>

                <p>Total Akun</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $totalMahasiswa }}</h3>

                <p>Total Mahasiswa</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $totalKeluhan }}</h3>

                <p>Total Keluhan</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
        </div>
    </div>
</div>
@endsection