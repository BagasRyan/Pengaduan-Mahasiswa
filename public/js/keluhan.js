$(document).ready(function(){
    $('#table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            url: '/keluhan'
        },
        column: [{
            width: "5%",
            render: function(data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            },
        },
        {
            data: 'kode_laporan'
        },
        {
            data: 'nama_mahasiswa'
        },
        {
            data: 'keluhans'
        },
        {
            data: 'status'
        }
    ]
    });
})



function onDelete(data){
    const CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
    const id = data.id;

    Swal.fire({
        title: `Apakah anda yakin ingin hapus data ini?`,
        text: "Data yang telah dihapus tidak bisa dikembalikan",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Tidak'
    }).then(function(result){
        if(result.isConfirmed){
            $.ajax({
                url: `keluhan/delete/${id}`,
                method: 'POST',
                data: {
                    _token: CSRF_TOKEN
                },
                success: function(data){
                    if(data.status == 'success'){
                    Swal.fire({
                        title: 'Berhasil',
                        text: data.message,
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500,
                        didClose: function(){
                            window.location.reload();
                        }
                    })
                    } else {
                        Swal.fire({
                            title: 'Gagal',
                            text: data.message,
                            icon: 'error',
                        })
                    } 
                }
        })
        }
    })
}