<?php
require_once("../../config/config.php");

// Cek role
if (!in_array($_SESSION['role'], ['hse', 'admin'])) {
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
                window.location.href = '../hse/kecelakaan_kerja.php';
            });
        </script>
    ";
}

require_once("hse_data.php");
require_once(SITE_ROOT . "/src/header-admin.php");
require_once(SITE_ROOT . "/src/footer-admin.php");
require_once(SITE_ROOT . "/src/koneksi.php");

// Retrieve Data for Editing
if (isset($_GET['ke'])) {
    $kecelakaan_kerja_id = $_GET['ke'];

    $edit_query = "SELECT * FROM kecelakaan_kerja WHERE kecelakaan_kerja_id = ?;";

    $prepare_edit = $koneksi->prepare($edit_query);
    $prepare_edit->bindParam(1, $kecelakaan_kerja_id, PDO::PARAM_INT);
    $prepare_edit->execute();

    $editData = $prepare_edit->fetch(PDO::FETCH_ASSOC);

} else {
    ?>
    <script type="text/javascript">
        Swal.fire({
            title: 'Update Gagal',
            text: "Request Gagal",
            type: 'warning',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Kembali',
        }).then((result) => {
            window.location = 'kecelakaan_kerja';
        });
    </script>
    <?php
    exit; // Keluar dari skrip jika tidak ada data yang ditemukan
}
?>
<head>
    <style>
        .custom-black-bg {
            background-color: #2ca143;
            color: white;
        }
    </style>
    <!-- Import JS Sweet Alert -->
    <script src="../js/sweetalert2.all.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <!--Nama Divisi-->
            <div class="col-md-6 col-sm-12 col">
            <h2 style="display: flex; float: left;">EDIT DATA KECELAKAAN KERJA</h2>
            </div>
        </div>
        <br>

        <form action="" method="post">
            <!-- Display existing data for editing -->
            <table class="table table-hover table-bordered table-sm">
                <tr>
                    <!-- Tanggal -->
                    <td class="custom-black-bg">Tanggal</td>
                    <td> <input type="date" value="<?= $editData['tanggal'] ?? date('Y-m-d') ?>" name="tanggal" class="form-control" width=20%> </td>
                </tr>
                <tr>
                    <!-- Jenis Kecelakaan Kerja -->
                    <td class="custom-black-bg">Jenis Kecelakaan Kerja</td>
                    <td>
                        <select name="jenis" class="form-control" style="width: 30%;">
                            <option value="Ringan" <?php echo ($editData['jenis_kecelakaan_kerja'] == 'Ringan') ? 'selected' : ''; ?>>Ringan</option>
                            <option value="Sedang" <?php echo ($editData['jenis_kecelakaan_kerja'] == 'Sedang') ? 'selected' : ''; ?>>Sedang</option>
                            <option value="Berat" <?php echo ($editData['jenis_kecelakaan_kerja'] == 'Berat') ? 'selected' : ''; ?>>Berat</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <!-- Penanganan -->
                    <td class="custom-black-bg">Penanganan</td>
                    <td> <input type="text" value="<?= $editData['penanganan'] ?>" name="penanganan" class="form-control" width=20%> </td>
                </tr>
                <tr>
                    <!-- Area Kejadian -->
                    <td class="custom-black-bg">Area</td>
                    <td> <input type="text" value="<?= $editData['area_kejadian'] ?>" name="area" class="form-control" width=20%> </td>
                </tr>
                <tr>
                    <!-- Waktu Kejadian -->
                    <td class="custom-black-bg">Waktu</td>
                    <td> <input type="time" value="<?= $editData['waktu_kejadian'] ?>" name="waktu" class="form-control" width=20%> </td>
                </tr>
                <tr>
                    <!-- Jam Kerja Kejadian -->
                    <td class="custom-black-bg">Jam Kerja</td>
                    <td>
                        <select name="jam" class="form-control" style="width: 30%;">
                            <option value="Pagi" <?php echo ($editData['jam_kerja_kejadian'] == 'Pagi') ? 'selected' : ''; ?>>Pagi</option>
                            <option value="Sore" <?php echo ($editData['jam_kerja_kejadian'] == 'Sore') ? 'selected' : ''; ?>>Sore</option>
                            <option value="Malam" <?php echo ($editData['jam_kerja_kejadian'] == 'Malam') ? 'selected' : ''; ?>>Malam</option>
                            <option value="Non-Shift" <?php echo ($editData['jam_kerja_kejadian'] == 'Non-Shift') ? 'selected' : ''; ?>>Non-Shift</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <!-- Penyebab -->
                    <td class="custom-black-bg">Penyebab</td>
                    <td> <input type="text" value="<?= $editData['penyebab'] ?>" name="penyebab" class="form-control" width=20%> </td>
                </tr>
            </table>
            <div class="form-group text-center" style="margin-top: 10px;">
                <button type="submit" name="update" class="btn btn-primary">
                    <i class="fas fa-save"></i> UPDATE DATA
                </button>
                <a href="kecelakaan_kerja" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> CANCEL</a>
            </div>
        </form>
    </div>

    <?php
    // Update Data
    if (isset($_POST['update'])) {
        
        //Simpat input dalam variabel
        $jenis = $_POST['jenis'];
        $penanganan = $_POST['penanganan'];
        $area = $_POST['area'];
        $waktu = $_POST['waktu'];
        $jam_kerja = $_POST['jam'];
        $penyebab = $_POST['penyebab'];

        //handle tanggal
        $tanggal = $_POST['tanggal'];
        $tanggalid = insertOrSelectTanggal($tanggal, $koneksi);

        // Update data in the database
        $update_query = "UPDATE kecelakaan_kerja 
                         SET tanggal = ?, 
                             jenis_kecelakaan_kerja = ?, 
                             penanganan = ?, 
                             area_kejadian = ?, 
                             waktu_kejadian = ?, 
                             jam_kerja_kejadian = ?, 
                             penyebab = ?,
                             tanggal_id = ?
                         WHERE kecelakaan_kerja_id = ?";
        
        $prepare_update = $koneksi->prepare($update_query);

        $prepare_update->bindParam(1, $tanggal);
        $prepare_update->bindParam(2, $jenis);
        $prepare_update->bindParam(3, $penanganan);
        $prepare_update->bindParam(4, $area);
        $prepare_update->bindParam(5, $waktu);
        $prepare_update->bindParam(6, $jam_kerja);
        $prepare_update->bindParam(7, $penyebab);
        $prepare_update->bindParam(8, $tanggalid);
        $prepare_update->bindParam(9, $kecelakaan_kerja_id);

        try {
            $prepare_update->execute();
            ?>
            <script type="text/javascript">
                Swal.fire({
                    text: "Data Berhasil diedit!",
                    type: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                }).then((result) => {
                    if (result.value) {
                        window.location = 'kecelakaan_kerja';
                    }
                });
            </script>
            <?php
        } catch(PDOException $e) {
            echo "Error in SQL query: " . $e->getMessage();
            
            $koneksi -> rollBack();
        } catch(Exception $e) {
            echo "Error: " . $e->getMessage();

            $koneksi -> rollBack();
        }
    }
    ?>

</body>
