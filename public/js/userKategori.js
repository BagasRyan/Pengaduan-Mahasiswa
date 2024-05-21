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
                url: `userKategori/delete/${id}`,
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