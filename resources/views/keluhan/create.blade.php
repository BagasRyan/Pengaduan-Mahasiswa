@extends('layout.app')

@section('content')
<a href="{{ route('keluhan.index') }}" class="btn btn-primary m-2">Kembali</a>
<form class="mt-5" action="{{ route('keluhan.store') }}" method="POST">
    @csrf
    <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="nama" id="nama">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="staticEmail" name="email" value="email@example.com">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="telepon" class="col-sm-2 col-form-label">No Telepon</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="telepon" id="telepon">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="keluhan" class="col-12 col-form-label">Keluhan</label>
        <div class="col-12">
            <textarea class="form-control" style="height: 300px;" name="keluhan"></textarea>
            <!-- <input type="text" class="form-control" id="keluhan"> -->
        </div>
    </div>

    <button type="submit" class="float-right btn btn-primary">Kirim</button>
</form>
@endsection