<?php
require_once("../../config/config.php");

// Cek role
if (!in_array($_SESSION['role'], ['hrd', 'admin', 'manager'])) {
    echo "<p style='color: white;'>Akses Dibatasi. Anda tidak memiliki izin yang cukup.</p>";

    // Menambahkan skrip SweetAlert untuk notifikasi yang lebih menarik
    echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Akses Dibatasi',
                text: 'Anda tidak memiliki izin yang cukup.',
            }).then(function() {
                window.location.href = '../index.php';
            });
        </script>
    ";

    die(); // Menghentikan eksekusi skrip setelah menampilkan pesan dan notifikasi
}

require_once("hrd_data.php");
require_once(SITE_ROOT . "/src/header-admin.php");
require_once(SITE_ROOT . "/src/footer-admin.php");

// Konversi data menjadi format JSON
$data_json = json_encode($hrd_arr);
// Tampilkan semua jenis error
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRD</title>
    <style>
  .btn-container {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .btn-container .btn {
    margin-right: 5px; /* Adjust the margin to add space between buttons */
  }

  .btn-container .btn-danger,
  .btn-container .btn-success {
    font-size: 12px; /* Adjust the font size as needed */
    width: 60px;
  }
</style>

    <!-- Inisialisasi variabel JSON -->
    <script>
        var jsonData = <?php echo $data_json; ?>;
    </script>


    <!-- Inisialisasi DataTables -->
   <script>
    console.log(jsonData);
    $(document).ready(function () {
        // Menambah nomor ke setiap objek
        for (var i = 0; i < jsonData.length; i++) {
            jsonData[i].nomor = i + 1;
        }
        $('#myTable').DataTable({
            data: jsonData,
            columns: [
                { data: 'nomor', title: 'No' }, // Menambah kolom nomor
                { data: 'tanggal' },
                { data: 'nik' },
                { data: 'nama_hrd' },
                { data: 'bagian' },
                { data: 'shift' },
                { data: 'waktu_pelanggaran' },
                { data: 'tempat_pelanggaran' },
                { data: 'bentuk_pelanggaran' },
                { data: 'potensi_bahaya' },
                { data: 'sanksi' },
                { data: 'nama_lampiran',
                  render: function(data, type, row){
                    if (data){
                    var encodedLampiranId = encodeURIComponent(row.lampiran_id);
                    return '<a href= "pelanggaran_lampiran.php?la='+ encodedLampiranId +'" target="_blank">'+ data +'</a>';
                    }else{
                      return data;
                    }
                 }},
                {
                    "data": null,
                    "render": function(data, type, row, meta) {
                        var encodedID = encodeURIComponent(row.pelanggaran_id);
                        var editButton = '<a href="pelanggaran_edit.php?pe=' + encodedID + '" class="btn btn-success btn-custom d-flex justify-content-center align-items-center">Edit</a>';
                        var deleteButton = '<button class="btn btn-danger btn-custom d-flex justify-content-center align-items-center" onclick="confirmDelete(\'' + encodedID + '\')">Hapus</button>';
                        return '<div class="btn-container">' + editButton + deleteButton + '</div>';
                    }
                }
            ],
            "dom": 'Bfrtip',
            "buttons": [
                {
                    extend: 'excel', className: 'btn-info',
                    exportOptions: {
                        columns: ':visible:not(:last-child)' // Exclude the last visible column (Opsi column)
                    }
                },
                {
                    extend: 'pdf', className: 'btn-info',
                    exportOptions: {
                        columns: ':visible:not(:last-child)' // Exclude the last visible column (Opsi column)
                    }
                },
                {
                    extend: 'print', className: 'btn-info',
                    exportOptions: {
                        columns: ':visible:not(:last-child)' // Exclude the last visible column (Opsi column)
                    }
                }
            ]
        });

        // Tambahkan tombol Tambah Data
            // Tambahkan tombol Tambah Data
                var tambahButton = '<button id="tambahButton" class="btn btn-info">Tambah Data</button>';
                $('.dt-buttons').append(tambahButton); // Menambahkan tombol ke div dt-buttons

                // Style untuk menengahkan tombol Tambah Data
                var buttonMargin = 'auto'; // Sesuaikan dengan margin yang diinginkan atau gunakan 'auto' untuk tengah
                $('#tambahButton').css({
                    'margin-left': '10px',  // Sesuaikan dengan jarak yang diinginkan dari tombol sebelumnya
                    'margin-right': buttonMargin,
                });

        // Center-align the text in the header cells
        $('#myTable thead th, #myTable tbody td').css('text-align', 'center');
        
        // Atur aksi klik untuk tombol Tambah Data
        $('#tambahButton').on('click', function() {
            window.location.href = "pelanggaran_input";
        });
    });
</script>
<script>
    function confirmDelete(hrdID) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: 'Data akan dihapus permanen!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                window.location.href = 'pelanggaran_delete.php?pe=' + hrdID;
            }
        });
    }
</script>

</head>

<body class="container-fluid">
    <center><h3>DATA PELANGGARAN HRD</h3></center>
    <br>
    <!-- Menampilkan tabel -->
    <table id="myTable" class="table table-bordered">
        <!-- Header Tabel berwarna gelap -->
        <thead class="thead-dark">
            <tr class="text-center">
                <tr>
                    <th rowspan="2">No.</th>
                    <th rowspan="2">Tanggal</th>
                    <th rowspan="2">NIK</th>
                    <th rowspan="2">Nama</th>
                    <th rowspan="2">Bagian</th>
                    <th rowspan="2">Shift</th>
                    <th colspan="4">Pelanggaran</th>
                    <th rowspan="2">Sanksi</th>
                    <th rowspan="2">Lampiran</th>
                    <th rowspan="2">Opsi</th>
                </tr>
                <tr>
                    <!-- Pelanggaran -->
                    <th>Waktu</th>
                    <th>Tempat</th>
                    <th>Bentuk Pelanggaran</th>
                    <th>Potensi Bahaya</th>
                </tr>
        </thead>
    </table>
</body>
</html>
