@extends('layout.app')

@section('content')
<div class="p-3">
    <h3>Akun User</h3>
    <p>Daftar Akun yang terdaftar di aplikasi</p>
</div>
<a href="{{ route('user.create') }}" class="m-2 btn btn-primary">Tambah Data</a>
<div class="card">
    <div class="card-body">
        <table class="table table-stripped" id="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Opsi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@push('script')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="{{asset('/plugins/datatables/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('/plugins/datatables/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('/plugins/datatables/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
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