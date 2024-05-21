@extends('layout.app')

@section('content')
<a href="{{ route('keluhan.create') }}" class="btn btn-primary m-2">Tambah Data</a>
<table class="table table-stripped" id="table">
    <tr>
        <th>No</th>
        <th>kode Laporan</th>
        <th>Nama</th>
        <th>Keluhan</th>
        <th>Status</th>
        <th>Opsi</th>
    </tr>
    @forelse($keluhan as  $data)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $data->kode_laporan }}</td>
        <td>{{ $data->nama_mahasiswa }}</td>
        <td>{{ $data->keluhan }}</td>
        <td>{{ $data->status }}</td>
        <td>
            <a href="{{ route('keluhan.edit', $data->id) }}" class="btn btn-success btn-sm">Edit</a>
            <button onclick="onDelete(this)" id="{{ $data->id }}" class="btn btn-danger btn-sm">Hapus</button>
        </td>
    </tr>
    @empty
    <tr><td colspan="6" class="text-center">Data masih kosong</td></tr>
    @endforelse
</table>
@endsection

@push('script')
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="{{asset('/plugins/datatables/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('/plugins/datatables/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('/plugins/datatables/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script> -->
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
    })
</script>
@endif
@endpush