@extends('layout.app')

@section('content')
<div class="p-3">
    <h3>Edit Akun User</h3>
    <p>Ubah profil akun anda</p>
</div>
<a href="{{ route('user.index') }}" class="btn btn-primary m-2">Kembali</a>
<div class="card">
    <div class="card-body">
        <form class="mt-5" action="{{ route('user.update') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $data->id }}">
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" value="{{ $data->nama }}" class="form-control" name="nama" id="nama">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="emailMahasiswa" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" value="{{ $data->email }}" name="email"
                        id="emailMahasiswa">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="telepon" class="col-sm-2 col-form-label">No Telepon</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="telepon" value="{{ $data->no_telepon }}" id="telepon">
                </div>
            </div>
            <button type="submit" class="float-right btn btn-primary">Kirim</button>
        </form>
    </div>
</div>
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