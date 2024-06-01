const query = document.URL;
const id = query.substring(query.lastIndexOf("/") + 1);

$(document).ready(function(){
    $('#table').DataTable({
        preocessing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            url: `/keluhan/${id}`,
        },
        columns: [{
            width: "5%",
            render: function(data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            },
        },
        {
            data: 'kode_laporan',
            name: 'kode_laporan'
        },
        {
            data: 'nama_mahasiswa',
            name: 'nama_mahasiswa'
        },
        {
            data: 'email',
            name: 'email'
        },
        {
            data: 'status',
            name: 'status'
        }
    ]
    });
});