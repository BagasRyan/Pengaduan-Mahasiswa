@extends('layout.app')

@section('content')
<a href="{{ route('user.create') }}" class="m-2 btn btn-primary">Tambah Data</a>
<table class="table table-stripped" id="table">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Opsi</th>
    </tr>
    @foreach($users as $data)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $data->nama }}</td>
        <td>{{ $data->email }}</td>
        <td>
            <a href="{{ route('user.edit', $data->id) }}" class="btn btn-success">Edit</a>
            <button onclick="onDelete(this)" id="{{ $data->id }}" class="btn btn-danger">Hapus</button>
        </td>
    </tr>
    @endforeach
</table>
@endsection

@push('script')
<script src="{{ asset('js/user.js') }}"></script>
@if(session('tambah'))
<script>
    Swal.fire({
        title: 'Berhasil',
        text: `{{ session('tambah') }}`,
        icon: 'success',
        showConfirmButton: false,
        timer: 1500
    })
</script>
@endif

@if(session('update'))
<script>
    Swal.fire({
        title: 'Berhasil',
        text: `{{ session('update') }}`,
        icon: 'success',
        showConfirmButton: false,
        timer: 1500
    });
</script>
@endif

@endpush