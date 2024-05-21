@extends('layout.app')



@section('content')
<a href="{{ route('user.kategori.index') }}" class="btn btn-primary m-2">Kembali</a>
<h3>Tambah Kategori User Baru</h3>
<form class="mt-5" action="{{ route('user.kategori.store') }}" method="POST">
    @csrf
    <hr>
    <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="nama" id="nama">
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