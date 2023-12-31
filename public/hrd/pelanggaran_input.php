<?php 
require_once("../../config/config.php");

// Cek role
if (!in_array($_SESSION['role'], ['hrd', 'admin'])) {
    echo "<p style='color: white;'>Akses Dibatasi. Anda tidak memiliki izin yang cukup.</p>";

    // Menambahkan skrip SweetAlert untuk notifikasi yang lebih menarik
    echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Akses Dibatasi',
            }).then(function() {
                window.location.href = '../hrd/pelanggaran.php';
            });
        </script>
    ";
}

require_once(SITE_ROOT."/src/header-admin.php");
require_once(SITE_ROOT."/src/footer-admin.php");
require_once(SITE_ROOT."/src/koneksi.php");
?>

<head>
<style>
	.custom-black-bg {
    background-color: #2ca143;
    color: white;
    }
</style>
</head>

<body>
    <div class="container">
        <!-- Import JS Sweet Alert -->
        <script src="../js/sweetalert2.all.min.js"></script>


        <div class="row">
            <!--Nama Divisi-->
		    <div class="col-md-6 col-sm-12 col">
		    <h2 style="display: flex; float: left;">INPUT DATA PELANGGARAN HRD</h2>
            </div>
            
            <!--Input Jumlah Kolom-->
		    <div class="col-md-6 col-sm-12 col" style="margin-left: auto; max-width:250px;">
                <form action="" method="post">
				    <div class="input-group mb-3">
					    <input type="text" name="count_add" id="count_add" maxlength="2" pattern="[0-9]+" placeholder="Isi Jumlah Kolom" class="form-control" aria-label="" aria-describedby="basic-addon1" required>
					        <div class="input-group-prepend">
						        <button class="btn btn-success" type="submit" name="generate"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path fill="#ffffff" d="M14 12L10 8V11H2V13H10V16M22 12A10 10 0 0 1 2.46 15H4.59A8 8 0 1 0 4.59 9H2.46A10 10 0 0 1 22 12Z" /></svg></button>
					        </div>
				    </div>
			    </form>
		    </div>
        </div>
        <br>

        <div class="table-responsive-sm table-responsie-md table-responsive-lg">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="total" value="<?= @$_POST['count_add'] ?>">
                <table class="table table-hover table-bordered table-sm">
                    <?php for($i=1; $i<=$_POST['count_add']; $i++){ ?>
                        <tr>
                            <!-- Tanggal -->
                            <td class="custom-black-bg">Tanggal</td>
                            <td> <input type="date" value="<? date('Y-m-d') ?>" name="tanggal-<?=$i?>" class="form-control" width=20%> </td>
                        </tr>
                        <tr>
                            <!-- NIK -->
                            <td class="custom-black-bg">NIK</td>
                            <td> <input type="text" name="nik-<?=$i?>" class="form-control" width=20%> </td>
                        </tr>
                        <tr>
                            <!-- Nama -->
                            <td class="custom-black-bg">Nama</td>
                            <td> <input type="text" name="nama-<?=$i?>" class="form-control" width=20%> </td>
                        </tr>
                        <tr>
                            <!-- Bagian -->
                            <td class="custom-black-bg">Bagian</td>
                            <td> <input type="text" name="bagian-<?=$i?>" class="form-control" width=20%> </td>
                        </tr>
                        <tr>
                            <!-- Shift -->
                            <td class="custom-black-bg">Shift</td>
                            <td>
                                <select name="shift-<?=$i?>" class="form-control" style="width: 20%;">
                                    <option value="-">-- Pilih Shift --</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <!-- Pemisah -->
                           <td> </td>
                        </tr>
                        <th>Pelanggaran</th>
                        <tr>
                            <!-- Waktu Pelanggaran -->
                            <td class="custom-black-bg">Waktu Pelanggaran</td>
                            <td> <input type="time" name="waktu-<?=$i?>" class="form-control" width=20%> </td>
                        </tr>
                        <tr>
                            <!-- Tempat Pelanggaran -->
                            <td class="custom-black-bg">Tempat Pelanggaran</td>
                            <td> <input type="text" name="tempat-<?=$i?>" class="form-control" width=20%> </td>
                        </tr>
                        <tr>
                            <!-- Bentuk Pelanggaran-->
                            <td class="custom-black-bg">Bentuk Pelanggaran</td>
                            <td> <input type="text" name="bentuk-pelanggaran-<?=$i?>" class="form-control" width=20%> </td>
                        </tr>
                        <tr>
                            <!-- Potensi Bahaya-->
                            <td class="custom-black-bg">Potensi Bahaya</td>
                            <td> <input type="text" name="potensi-bahaya-<?=$i?>" class="form-control" width=20%> </td>
                        </tr>
                        <tr>
                            <!-- Pemisah -->
                           <td> </td>
                        </tr>
                        <tr>
                            <!-- Sanksi -->
                            <td class="custom-black-bg">Sanksi</td>
                            <td>
                                <select name="sanksi-<?=$i?>" class="form-control" style="width: 23%;">
                                    <option value="-">-- Pilih Sanksi --</option>
                                    <option value="SP1">SP1</option>
                                    <option value="SP2">SP2</option>
                                    <option value="SP3">SP3</option>
                                    <option value="Teguran Lisan">Teguran Lisan</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <!-- Lampiran -->
                            <td class="custom-black-bg">Lampiran</td>
                            <td> <input type="file" name="lampiran-<?=$i?>" class="form-control" width=20%> </td>
                        </tr>
                    <?php } ?>
                </table>
                <div class="form-group text-center" style="margin-top: 10px;">
                <button type="submit" name="add" class="btn btn-primary"><i class="fas fa-save"><a href="pelanggaran"></a></i> TAMBAH DATA</button>
                <a href="pelanggaran" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> CANCEL</a>
            	</div>
            </form>
        </div> 
    </div> <!--Akhir Container-->
<!-- Menambahan ke Database -->
<?php 
    if(isset($_POST['add'])){
        $total = $_POST['total'];

        for($i=1; $i<=$total; $i++){

            //Menyimpan input dalam variabel

            //Lampiran
            if ($_FILES['lampiran-'.$i]['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['lampiran-'.$i]['tmp_name'])) {
                // Upload berhasil
                $nama_lampiran = $_FILES['lampiran-'.$i]['name'];
                $tipe_lampiran = pathinfo($nama_lampiran)['extension'];
                $isi_lampiran = fopen($_FILES['lampiran-'.$i]['tmp_name'], 'rb');
            } else {
                // Upoad gagal
                $nama_lampiran = null;
                $tipe_lampiran = null;
                $isi_lampiran = null;
            }

            $nama = $_POST['nama-'.$i];
            $bagian = $_POST['bagian-'.$i];
            $shift = $_POST['shift-'.$i];
            $nik = EmptyToNull($_POST['nik-'.$i]);
            $bentuk_pelanggaran = $_POST['bentuk-pelanggaran-'.$i];
            $waktu_pelanggaran = EmptyToNull($_POST['waktu-'.$i]).":00";
            $tempat_pelanggaran = EmptyToNull($_POST['tempat-'.$i]);
            $potensi_bahaya = EmptyToNull($_POST['potensi-bahaya-'.$i]);
            $sanksi = EmptyToNull($_POST['sanksi-'.$i]);

            //handle tanggal
            $tanggal = $_POST['tanggal-'.$i];
            $tanggalid = insertOrSelectTanggal($tanggal, $koneksi);

            //Mulai statement
            $koneksi->beginTransaction();

            try{
                // Insert lampiran
                $lampiran_query = "INSERT INTO lampiran_hrd (lampiran_id, nama, tipe, file) 
                                VALUES (UUID(),?,?,?)";
                $prep_lampiran = $koneksi->prepare($lampiran_query);
                $prep_lampiran->bindParam(1, $nama_lampiran);
                $prep_lampiran->bindParam(2, $tipe_lampiran);
                $prep_lampiran->bindParam(3, $isi_lampiran, PDO::PARAM_LOB);

                $prep_lampiran->execute();

                // Mulai mengambil lampiran_id
                $lampiran_index = $koneksi->lastInsertId(); //Mengambil index dari kolom kolom_index

                $query = "SELECT lampiran_id FROM lampiran_hrd WHERE kolom_index=:indeks";
                $prep_index = $koneksi->prepare($query);
                $prep_index->bindParam(':indeks', $lampiran_index);
                $prep_index->execute();

                // Fetch data sesuai kolom_index
                $row = $prep_index->fetch(PDO::FETCH_ASSOC);

                // Get lampiran_id
                $lampiran_id = $row['lampiran_id'];
                //Selesai mengambil lampiran_id
                

                // Insert pelanggaran
                $pelanggaran_query = "INSERT INTO pelanggaran (pelanggaran_id, lampiran_id, tanggal, nik, nama, bagian, shift, 
                                    waktu_pelanggaran, tempat_pelanggaran, bentuk_pelanggaran, potensi_bahaya, sanksi, tanggal_id)
                                    VALUES (UUID(), ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $prep_pelanggaran = $koneksi->prepare($pelanggaran_query);
                $prep_pelanggaran->bindParam(1, $lampiran_id);
                $prep_pelanggaran->bindParam(2, $tanggal);
                $prep_pelanggaran->bindParam(3, $nik);
                $prep_pelanggaran->bindParam(4, $nama);
                $prep_pelanggaran->bindParam(5, $bagian);
                $prep_pelanggaran->bindParam(6, $shift);
                $prep_pelanggaran->bindParam(7, $waktu_pelanggaran);
                $prep_pelanggaran->bindParam(8, $tempat_pelanggaran);
                $prep_pelanggaran->bindParam(9, $bentuk_pelanggaran);
                $prep_pelanggaran->bindParam(10, $potensi_bahaya);
                $prep_pelanggaran->bindParam(11, $sanksi);
                $prep_pelanggaran->bindParam(12, $tanggalid);

                $prep_pelanggaran->execute();

                
                // Commit Statement
                $koneksi->commit();

                ?>
                <script type="text/javascript">
                    Swal.fire({
                        title: 'Tambah Data Lagi?',
                        text: "Data Berhasil disimpan!",
                        type: 'success',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Iya!',
                        cancelButtonText: 'Tidak!',
                    }).then((result) => {
                        if (result.value) {
                            window.location = 'pelanggaran_input';
                        } else {
                            window.location = 'pelanggaran';
                        }
                    })
                </script>
                <?php
            }catch(PDOException $e){
                echo "PDO ERROR: ". $e -> getMessage();
            
                $koneksi -> rollBack();
            } catch(Exception $e) {
                echo "Error: " . $e->getMessage();
                
                $koneksi -> rollBack();
            }
        }
    }
?>
</body>