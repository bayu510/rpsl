<?php 
require_once("../../config/config.php");
require_once(SITE_ROOT."/src/header-admin.php");
require_once(SITE_ROOT."/src/footer-admin.php");
require_once(SITE_ROOT."/src/koneksi.php");
?>


<head>
<meta charset="UTF-8">
    <style>
        .custom-black-bg {
        background-color: #228B22;
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
            <h2 style="display: flex; float: left;">Jadwal Maintenance</h2>
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
        <div class="table-responsive-sm table-responsie-md table-responsive-lg">
            <form action="" method="post" id="myForm" enctype="multipart/form-data">
                <input type="hidden" name="total" value="<?= @$_POST['count_add'] ?>">
                <table class="table table-hover table-bordered table-sm">
                    <?php for($i=1; $i<=$_POST['count_add']; $i++){ ?>
                        <tr>
                            <!-- Nomor -->
                            <td class="custom-black-bg">No</td>
                            <td> <?= $i ?> </td>
                        </tr>
                        <tr>
                            <!-- Divisi -->
                            <td class="custom-black-bg">Divisi</td>
                                <td><select name="divisi-<?= $i ?>" class="form-control">
                                        <option value="Umum">Umum</option>
                                        <option value="Elektrikal">Elektrikal</option>
                                        <option value="WTP">WTP</option>
                                        <option value="Mekanikal">Mekanikal</option>
                                </select>
                                </td>
                        </tr>
                        <tr>
                            <!-- Unit -->
                            <td class="custom-black-bg">Unit</td>
                            <td><input type="text" name="unit-<?=$i?>" style="form-control"></td>
                        </tr>
                        <tr>
                            <!-- Problem -->
                            <td class="custom-black-bg">Problem</td>
                            <td><input type="text" name="problem-<?=$i?>" style="form-control"></td>
                        </tr>
                        <tr>    
                            <!-- Evaluasi -->
                            <td class="custom-black-bg">Evaluasi</td>
                            <td><input type="text" name="evaluasi-<?=$i?>" style="form-control"></td>
                        </tr>
                        <tr>    
                            <!-- Penanganan -->
                            <td class="custom-black-bg">Penanganan</td>
                            <td><input type="text" name="penanganan-<?=$i?>" style="form-control"></td>
                        </tr>
                        <tr>
                            <!-- Pemisah -->
                           <td> </td> 
                        </tr>
                        <th>Sparepart</th>
                        <tr>
                            <!-- Sparepart -->
                            <td class="custom-black-bg">Sparepart</td>
                            <td> <input type="text" name="sparepart-<?=$i?>" class="form-control" width=20%> </td>
                        </tr>
                        <tr>
                            <!-- Sparepart Quantity -->
                            <td class="custom-black-bg">Quantity Sparepart</td>
                            <td> <input type="number" name="quantity-<?=$i?>" class="form-control" width=20%> </td>
                        </tr>
                        <tr>
                            <!-- Sparepart Satuan-->
                            <td class="custom-black-bg">Satuan Sparepart</td>
                            <td> <input type="text" name="satuan-<?=$i?>" class="form-control" width=20%> </td>
                        </tr>

                        <tr>
                            <!-- Pemisah -->
                            <td></td>
                        </tr>
                        <th>Tanggal</th>
                        <tr>
                            <!-- Before -->
                            <td class="custom-black-bg" width="30%">  Mulai  </td>
                            <td><input type="date" value="<? date('Y-m-d') ?>" name="tanggal-mulai-<?=$i?>" class="form-control" width=20%> </td>
                        </tr>
                        <tr>
                            <!-- After -->
                            <td class="custom-black-bg" width="30%">  Selesai  </td>
                            <td><input type="date" value="<? date('Y-m-d') ?>" name="tanggal-selesai-<?=$i?>" class="form-control" width=20%></td>
                        </tr>

                        <tr>
                            <!-- Pemisah -->
                            <td></td>
                        </tr>
                        <tr>    
                            <!-- Tingkat Kerusakan -->
                            <td class="custom-black-bg">Tingkat Kerusakan</td>
                            <td>
                            <input type="radio" id="radio" value="Major" name="tingkat-kerusakan-<?=$i?>" style="form-control">
                            <label for="radio">Major</label><br>
                            <input type="radio" id="radio"value="Minor" name="tingkat-kerusakan-<?=$i?>" style="form-control">
                            <label for="radio">Minor</label>
                            </td>
                        </tr>
                        <tr>
                            <!-- Status -->
                            <td class="custom-black-bg">Status</td>
                            <td><select name="status-<?= $i ?>" class="form-control">
                                        <option value="Dijadwalkan">Dijadwalkan</option>
                                        <option value="Sedang Berlangsung">Sedang Berlangsung</option>
                                        <option value="Selesai">Selesai</option>
                                </select>
                                </td>
                        </tr>
                        <tr>
                            <!-- Keterangan -->
                            <td class="custom-black-bg">Keterangan</td>
                            <td> <input type="text" name="keterangan-<?=$i?>" class="form-control" width=20%> </td>
                        </tr>
                        <tr>
                            <!-- Lampiran -->
                            <td class="custom-black-bg">Lampiran</td>
                            <td> <input type="file" name="lampiran-<?=$i?>" class="form-control" width=20%> </td>
                        </tr>
                    <?php } ?>
                </table>
                <div class="form-group text-center" style="margin-top: 10px;">
                <button type="submit" name="add" class="btn btn-primary"><i class="fas fa-save"><a href="maintenance"></a></i> TAMBAH DATA</button>
                </div>
            </form>
        </div> 
    </div> <!--Akhir Container-->
<!-- Menambahan ke Database -->
<?php 
    if(isset($_POST['add'])){
        $total = $_POST['total'];

        //Menyimpan input dalalm variabel (Menggunakan looping)
        for($i=1; $i<=$total; $i++){
            //Tanggal
            $tanggal_mulai = $_REQUEST['tanggal-mulai-'.$i];
            $tanggal_selesai = $_REQUEST['tanggal-selesai-'.$i];

            //Sparepart
            $sparepart = $_REQUEST['sparepart-'.$i];
            $quantity = $_REQUEST['quantity-'.$i];
            $satuan = $_REQUEST['satuan-'.$i];

            $divisi = $_REQUEST['divisi-'.$i];
            $unit = $_REQUEST['unit-'.$i];
            $problem = $_REQUEST['problem-'.$i];
            $evaluasi = $_REQUEST['evaluasi-'.$i];
            $penanganan = $_REQUEST['penanganan-'.$i];
            $tingkat_kerusakan = $_REQUEST['tingkat-kerusakan-'.$i];
            $status = $_REQUEST['status-'.$i];
            $keterangan = $_REQUEST['keterangan-'.$i];
            $nama_lampiran = $_FILES['lampiran-'.$i]['name'];
            $isi_lampiran = $_FILES['lampiran-'.$i]['size'];

            echo "spare ". gettype($sparepart). "\n"; 
            echo " echo ". gettype($quantity). "\n";  
            echo " echo $satuan \n"; 
            echo " echo $divisi \n"; 
            echo " echo $unit \n";
            echo " echo $problem \n";
            echo " echo $evaluasi \n";
            echo " echo $penanganan \n";
            echo " echo $tingkat_kerusakan \n";
            echo " echo $status \n";
            echo " echo $keterangan \n";
            echo " nama lampiran $nama_lampiran \n";
            echo  " isi lampiran ". gettype($isi_lampiran).  "\n";

            

            //Insert ke database
            $insert_query = "INSERT INTO maintenance (maintenance_id, jam, divisi, unit, problem, evaluasi, penanganan, tingkat_kerusakan, status, tanggal_mulai, tanggal_selesai)
            VALUES (uuid_generate_v4(), LOCALTIME, $1, $2, $3, $4, $5, $6, $7, $8, $9);"; 
            $prepare_input = pg_prepare($koneksi_operasional, "my_insert", $insert_query);
            $exec_input = pg_execute($koneksi_operasional, "my_insert", array($divisi, $unit, $problem, $evaluasi, $penanganan, $tingkat_kerusakan, $status, $tanggal_mulai, $tanggal_selesai));


            /*$rs = pg_fetch_assoc($exec_input);
            if (!$rs) {
                echo "0 records";
            }*/
?>
<script type="text/javascript">
        // Swal.fire({
        //     title: 'Tambah Data Lagi?',
        //     text: "Data Berhasil disimpan!",
        //     type: 'success',
        //     showCancelButton: true,
        //     confirmButtonColor: '#3085d6',
        //     cancelButtonColor: '#d33',
        //     confirmButtonText: 'Iya!',
        //     cancelButtonText: 'Tidak!',
        // }).then((result) => {
        //     if (result.value) {
        //         window.location = 'maintenance_input';
        //     } else {
        //         window.location = 'maintenance';
        //     }
        // })
    </script>
    <?php
        }
    }
?>


</body>