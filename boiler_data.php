<?php
$koneksi = pg_connect("host=localhost dbname=rpsl_operasional user=postgres password=bayu0510");

$operasional = pg_query($koneksi, "SELECT t1.generation, t1.pm_kwh_pltbm, t2.tanggal, t2.waktu, t2.shift, t2.supervisor, t2.keterangan,  t3.ekspor, t3.pemakaian_sendiri, t3.kwh_loss, t4.kg_cangkang, t4.kg_palmfiber, t4.kg_woodchips, t4.kg_serbukkayu, t4.kg_sabutkelapa, t4.kg_efbpress, t4.kg_opt
                                FROM produksi_kwh t1
                                INNER JOIN operasional t2 ON t1.produksi_id=t2.produksi_id
                                INNER JOIN pemakaian_kwh t3 ON t2.pemakaian_id=t3.pemakaian_id
                                INNER JOIN pemakaian_bahan_bakar t4 ON t2.pemakaian_bahan_bakar_id=t4.pemakaian_bahan_bakar_id");
$operasional_arr = pg_fetch_all($operasional);

$row_operasional = pg_num_rows($operasional);

?>