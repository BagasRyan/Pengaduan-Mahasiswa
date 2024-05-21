@extends('layout.app')

@section('content')
<a href="{{ route('user.index') }}" class="btn btn-primary m-2">Kembali</a>
<h3>Tambah User Baru</h3>
<form class="mt-5" action="{{ route('user.store') }}" method="POST">
    @csrf
    <h4>Data Diri</h4>
    <hr>
    <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="nama" id="nama">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="emailMahasiswa" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" name="emailMahasiswa" id="emailMahasiswa">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="telepon" class="col-sm-2 col-form-label">No Telepon</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="telepon" id="telepon">
        </div>
    </div>


    <h4 class="mt-5">Akun Login</h4>
    <hr>
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Kategori User</label>
        <div class="col-sm-10">
            <select class="form-control" name="userKategori">
            @foreach($userKategori as $data)
                <option value="{{ $data->id }}">{{ $data->nama }}</option>
            @endforeach
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="staticEmail" name="emailAkun" value="email@example.com">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="password" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="password" id="password">
        </div>
    </div>


    <button type="submit" class="float-right btn btn-primary">Kirim</button>
</form>
@endsection

@push('script')
@if(session('gagal'))
<script>
    Swal.fire({
        title: 'Gagal',
        text: `{{ session('gagal') }}`,
        icon: 'error',
        showConfirmButton: false,
        timer: 1500
    })
</script>
@endif
@endpush