<?php
require_once("../../config/config.php");
require_once(SITE_ROOT."/src/header-admin.php");
require_once(SITE_ROOT."/src/footer-admin.php");
require_once("wtp_data.php");

// Konversi data menjadi format JSON
$data_json = json_encode($sungai_arr);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEMAKAIAN CHEMICAL SUNGAI</title>
    <style>
    body {
        font-family: Arial, sans-serif;
    }
    .btn-custom {
        width: 60px; /* Adjust the width as needed */
        /* Add any other styles as needed */
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
				{ data: 'koagulan' },
                { data: 'soda_ash'},
                { data: 'flokulan' },
				{ data: 'm3_air'},
				{ data: null,
				render: function(data, type, row){ //Cost per hari

					var cost_koagulan = (row.cost_koagulan || 0) * row.koagulan;
					var cost_soda_ash = (row.cost_soda_ash || 0) * row.soda_ash;
					var cost_flokulan = (row.cost_flokulan || 0) * row.flokulan;

					return "Rp."+Math.round((cost_koagulan+cost_soda_ash+cost_flokulan));
				} },
				{ data: null,
				render: function(data, type, row){ //Cost per m3
					
					var cost_koagulan = (row.cost_koagulan || 0) * row.koagulan;
					var cost_soda_ash = (row.cost_soda_ash || 0) * row.soda_ash;
					var cost_flokulan = (row.cost_flokulan || 0) * row.flokulan;

					return "Rp."+Math.round((cost_koagulan+cost_soda_ash+cost_flokulan)/row.m3_air);
				} },
                {
                    "data": null,
                    "render": function(data, type, row, meta) {
                        var editButton = '<a href="sungai_edit?id=' + row.sungai_id + '" class="btn btn-warning btn-custom d-flex justify-content-center align-items-center">Edit</a>';
                        var deleteButton = '<a href="sungai_delete?id=' + row.sungai_id + '" class="btn btn-danger btn-custom d-flex justify-content-center align-items-center" onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ini?\')">Hapus</a>';
                        return editButton + deleteButton;
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
        var tambahButton = '<button id="tambahButton" class="btn btn-info">Tambah Data</button>';
        $('.dt-buttons').append(tambahButton); // Menambahkan tombol ke div dt-buttons

        // Style untuk menengahkan tombol Tambah Data
        $('#tambahButton').css({
            'margin-left': '380px', // Sesuaikan dengan margin yang diinginkan
            'margin-right': '380px', // Sesuaikan dengan margin yang diinginkan
        });

        // Center-align the text in the header cells
        $('#myTable thead th, #myTable tbody td').css('text-align', 'center');
        
        // Atur aksi klik untuk tombol Tambah Data
        $('#tambahButton').on('click', function() {
            window.location.href = "sungai_input";
        });
    });
</script>

</head>
<body class="container-fluid">
    <center><h3>PEMAKAIAN CHEMICAL SUNGAI</h3></center>
    <br>
    <!-- Menampilkan tabel -->
    <table id="myTable" class="table table-bordered">
        <!--Header Tabel berwarna gelap-->    
		<thead class="thead-dark">
				<tr class="text-center">
					<tr>
			    		<th rowspan="2">No.</th>
						<th rowspan="2">Tanggal</th>
						<th colspan="3">Pemakaian Chemical</th>
			    		<th rowspan="2">Meteran Air(m<sup>3</sup>)</th>
						<th rowspan="2">Cost Harian</th>
			    		<th rowspan="2">Cost/m<sup>3</sup></th>
			    		<th rowspan="2">Opsi</th>
			    	</tr>
			    	<tr>
			    		<!-- Pemakaian Chemical -->
					    <th>Koagulan<br>(S-1009)</th>
					    <th>Soda<br>(Ash)</th>
					    <th>Flokulan<br>(S-1101)</th>
			    	</tr>
                </tr>
        </thead>
    </table>
</body>
</html>