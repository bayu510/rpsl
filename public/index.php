<style> 
  body {
  background: url("assets/img/ab.png")
    no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  font-family: "HelveticaNeue", "Arial", sans-serif;
  }

  .card-body:hover{
  filter: invert(1);
  }
</style>

<?php #script PHP untuk menampilkan data dari database

  session_start(); 
  require_once("../config/config.php");
  require_once(SITE_ROOT. "/src/header-admin.php");
  require_once(SITE_ROOT. "/src/footer-admin.php");
  
  if($_SESSION['level']==""){
    header("location:index.php?pesan=gagal");
  }

  $operasional = pg_query($koneksi_operasional, "SELECT * FROM operasional");
  $timbangan = pg_query($koneksi_timbangan, "SELECT * FROM timbangan");
  $boiler = pg_query($koneksi_boiler, "SELECT * FROM boiler");
  $wtp = pg_query($koneksi_wtp, "SELECT * FROM wtp");
  $turbin = pg_query($koneksi_turbin, "SELECT * FROM turbin");

  $data1 = pg_num_rows($operasional);
  $data2 = pg_num_rows($timbangan);
  $data3 = pg_num_rows($boiler);
  $data4 = pg_num_rows($wtp);
  $data5 = pg_num_rows($turbin);
?>

<div class="container">
  <div class="text-right">
    <img src="<?= SITE_URL?>/public/assets/img/rpsl1.png" style="width: 110px; filter: drop-shadow(3px 4px 3px black)">
  </div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br>


<div class="container">
  <div class="row">
  <div class="col-sm">
    <a href="operasional/operasional_cabang" target="_blank" style="text-decoration: none;">
  <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
  <div class="card-body">
    <svg style="width:40px;height:40px; float: right; margin-top: 5px;" viewBox="0 0 24 24"><path fill="#FFFFFF" d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H8C8.55228 23 9 22.5523 9 22C9 21.4477 8.55228 21 8 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V7C19 7.55228 19.4477 8 20 8C20.5523 8 21 7.55228 21 7V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM13.5067 11.3155C13.6011 10.0209 14.6813 9 16 9H17C18.3186 9 19.3988 10.0209 19.4933 11.3155C20.6616 10.75 22.0859 11.175 22.7452 12.317L23.2452 13.183C23.9045 14.325 23.5605 15.7709 22.4866 16.5C23.5605 17.2291 23.9045 18.675 23.2452 19.817L22.7452 20.683C22.0859 21.825 20.6616 22.25 19.4933 21.6845C19.3988 22.9791 18.3186 24 17 24H16C14.6813 24 13.6011 22.9791 13.5067 21.6845C12.3384 22.25 10.9141 21.825 10.2548 20.683L9.7548 19.817C9.09548 18.675 9.43952 17.2291 10.5134 16.5C9.43952 15.7709 9.09548 14.325 9.7548 13.183L10.2548 12.317C10.9141 11.175 12.3384 10.75 13.5067 11.3155ZM16 11C15.7238 11 15.5 11.2239 15.5 11.5V12.4678C15.5 12.8474 15.285 13.1943 14.945 13.3633C14.8128 13.429 14.6852 13.5029 14.5629 13.5844C14.2464 13.7952 13.8378 13.8083 13.5085 13.6181L12.6699 13.134C12.4307 12.9959 12.1249 13.0778 11.9868 13.317L11.4868 14.183C11.3488 14.4222 11.4307 14.728 11.6699 14.866L12.5088 15.3504C12.8375 15.5402 13.0304 15.8997 13.0069 16.2785C13.0023 16.3516 13 16.4255 13 16.5C13 16.5745 13.0023 16.6484 13.0069 16.7215C13.0304 17.1003 12.8375 17.4598 12.5088 17.6496L11.6699 18.134C11.4307 18.272 11.3488 18.5778 11.4868 18.817L11.9868 19.683C12.1249 19.9222 12.4307 20.0041 12.6699 19.866L13.5085 19.3819C13.8378 19.1917 14.2464 19.2048 14.5629 19.4156C14.6852 19.4971 14.8128 19.571 14.945 19.6367C15.285 19.8057 15.5 20.1526 15.5 20.5322V21.5C15.5 21.7761 15.7238 22 16 22H17C17.2761 22 17.5 21.7761 17.5 21.5V20.5323C17.5 20.1526 17.715 19.8057 18.055 19.6367C18.1872 19.571 18.3148 19.4971 18.4372 19.4156C18.7536 19.2048 19.1622 19.1917 19.4915 19.3819L20.3301 19.866C20.5693 20.0041 20.8751 19.9222 21.0131 19.683L21.5131 18.817C21.6512 18.5778 21.5693 18.272 21.3301 18.134L20.4912 17.6496C20.1625 17.4599 19.9696 17.1004 19.9931 16.7215C19.9977 16.6484 20 16.5745 20 16.5C20 16.4255 19.9977 16.3516 19.9931 16.2785C19.9696 15.8996 20.1625 15.5401 20.4912 15.3504L21.3301 14.866C21.5693 14.728 21.6512 14.4222 21.5131 14.183L21.0131 13.317C20.8751 13.0778 20.5693 12.9959 20.3301 13.134L19.4915 13.6181C19.1622 13.8083 18.7536 13.7952 18.4372 13.5844C18.3148 13.5029 18.1872 13.429 18.055 13.3633C17.715 13.1943 17.5 12.8474 17.5 12.4677V11.5C17.5 11.2239 17.2761 11 17 11H16ZM18.5 16.5C18.5 17.6046 17.6046 18.5 16.5 18.5C15.3954 18.5 14.5 17.6046 14.5 16.5C14.5 15.3954 15.3954 14.5 16.5 14.5C17.6046 14.5 18.5 15.3954 18.5 16.5Z" /></svg>
    <h1 class="card-title" style="display: inline;"><?= $data1 ?></h1>
    <p class="card-text">OPERASIONAL</p>
  </div>
</div>
  </a>
</div>

  <div class="col-sm">
    <a href="timbangan/timbangan" target="_blank" style="text-decoration: none;">
  <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
  <div class="card-body">
    <svg style="width:40px;height:40px; float: right; margin-top: 5px;" viewBox="0 0 35 24"><path fill="#FFFFFF" d="M32,17.1C32,17.1,32,17,32,17.1c0-0.1,0-0.1,0-0.1c0-0.1,0-0.2,0-0.3l-4-12c0,0,0,0,0,0c0,0,0-0.1-0.1-0.1
  c0-0.1-0.1-0.1-0.1-0.2c0,0-0.1-0.1-0.1-0.1c-0.1-0.1-0.1-0.1-0.2-0.1c0,0-0.1,0-0.1-0.1C27.2,4,27.1,4,27,4h-8.2
  c-0.3-0.8-1-1.5-1.8-1.8V1c0-0.6-0.4-1-1-1s-1,0.4-1,1v1.2c-0.8,0.3-1.5,1-1.8,1.8H5C4.9,4,4.8,4,4.6,4.1c0,0-0.1,0-0.1,0.1
  c-0.1,0-0.1,0.1-0.2,0.1c0,0-0.1,0.1-0.1,0.1C4.2,4.4,4.2,4.5,4.1,4.5c0,0,0,0.1-0.1,0.1c0,0,0,0,0,0l-4,12c0,0.1,0,0.2,0,0.3
  c0,0,0,0,0,0c0,0,0,0.1,0,0.1c0,0,0,0.1,0,0.1C0.1,19.8,2.3,22,5,22s4.9-2.2,5-4.8c0,0,0-0.1,0-0.1c0,0,0-0.1,0-0.1c0,0,0,0,0,0
  c0-0.1,0-0.2,0-0.3L6.4,6h6.8c0.3,0.8,1,1.5,1.8,1.8V20c-1.1,0-2,0.9-2,2v4h-2.6c-1.3,0-2.4,0.8-2.8,2.1l-0.5,1.6
  C6.9,30,7,30.3,7.2,30.6C7.4,30.8,7.7,31,8,31h16c0.3,0,0.6-0.2,0.8-0.4c0.2-0.3,0.2-0.6,0.1-0.9l-0.5-1.6C24,26.8,22.9,26,21.6,26
  H19v-4c0-1.1-0.9-2-2-2V7.8c0.8-0.3,1.5-1,1.8-1.8h6.8l-3.6,10.7c0,0.1,0,0.2,0,0.3c0,0,0,0,0,0c0,0,0,0.1,0,0.1c0,0,0,0.1,0,0.1
  c0.1,2.7,2.3,4.8,5,4.8S31.9,19.8,32,17.1C32,17.1,32,17.1,32,17.1z M2.4,16L5,8.2L7.6,16H2.4z M16,6c-0.6,0-1-0.4-1-1s0.4-1,1-1
  s1,0.4,1,1S16.6,6,16,6z M27,8.2l2.6,7.8h-5.2L27,8.2z" /></svg>
    <h1 class="card-title" style="display: inline;"><?= $data2 ?></h1>
    <p class="card-text">TIMBANGAN</p>
  </div>
</div>
</a>
</div>
  
  <div class="col-sm">
    <a href="boiler/boiler" target="_blank" style="text-decoration: none;">
  <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
  <div class="card-body">
    <svg style="width:40px;height:40px; float: right; margin-top: 5px;" viewBox="0 0 24 24"><path fill="#FFFFFF" d="M5 5C5 2.79086 6.79086 1 9 1H15C17.2091 1 19 2.79086 19 5V21H15.144L15.8865 22.9999H13.8865L13.144 21H11.144L11.8865 22.9999H9.88653L9.14397 21H5V5ZM9 3H15C16.1046 3 17 3.89543 17 5V7H7V5C7 3.89543 7.89543 3 9 3ZM7 9H17V19H7V9Z" /></svg>
    <h1 class="card-title" style="display: inline;"><?= $data3 ?></h1>
    <p class="card-text">BOILER</p>
  </div>
</div>
</a>
</div>

<div class="col-sm">
  <a href="wtp/wtp" target="_blank" style="text-decoration: none;">
  <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
  <div class="card-body">
    <svg style="width:40px;height:40px; float: right; margin-top: 5px;" viewBox="0 0 24 24"><path fill="#FFFFFF" d="M21 14.7C21 18.1794 19.0438 21 15.5 21C11.9562 21 10 18.1794 10 14.7C10 11.2206 15.5 3 15.5 3C15.5 3 21 11.2206 21 14.7Z" /></svg>
    <h1 class="card-title" style="display: inline;"><?= $data4 ?></h1>
    <p class="card-text">WTP</p>
  </div>
</div>
</a>
</div>

<div class="col-sm">
  <a href="turbin/turbin" target="_blank" style="text-decoration: none;">
  <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
  <div class="card-body">
    <svg style="width:40px;height:40px; float: right; margin-top: 5px;" viewBox="0 0 24 24"><path fill="#FFFFFF" d="M10 2H9C6.17157 2 4.75736 2 3.87868 2.87868C3 3.75736 3 5.17157 3 8V21.25H2C1.58579 21.25 1.25 21.5858 1.25 22C1.25 22.4142 1.58579 22.75 2 22.75H17.25C17.6642 22.75 18 22.4142 18 22C18 21.5858 17.6642 21.25 17.25 21.25H16V17.75H17.5714C17.9462 17.75 18.25 18.0538 18.25 18.4286V18.5C18.25 19.7427 19.2574 20.75 20.5 20.75C21.7426 20.75 22.75 19.7427 22.75 18.5V7.60177C22.75 7.44511 22.75 7.33702 22.7441 7.23161C22.6884 6.24063 22.2422 5.31214 21.5031 4.64962C21.4245 4.57915 21.3401 4.51163 21.2178 4.41378L19.9685 3.41438C19.6451 3.15562 19.1731 3.20806 18.9143 3.53151C18.6556 3.85495 18.708 4.32692 19.0315 4.58568L20.2646 5.57215C20.4091 5.68774 20.4585 5.72768 20.5019 5.76653C20.9453 6.16405 21.2131 6.72114 21.2465 7.31573C21.2497 7.37384 21.25 7.43743 21.25 7.62247V8H20.5C19.6716 8 19 8.67157 19 9.5V11.9189C19 12.5645 19.4131 13.1377 20.0257 13.3419L21.25 13.75V18.5C21.25 18.9142 20.9142 19.25 20.5 19.25C20.0858 19.25 19.75 18.9142 19.75 18.5V18.4286C19.75 17.2254 18.7746 16.25 17.5714 16.25H16V8C16 5.17157 16 3.75736 15.1213 2.87868C14.2426 2 12.8284 2 10 2ZM9.88587 9.35688C10.2411 9.56999 10.3562 10.0307 10.1431 10.3859L9.32464 11.75H11C11.2702 11.75 11.5195 11.8953 11.6527 12.1305C11.7858 12.3656 11.7821 12.6542 11.6431 12.8859L10.1431 15.3859C9.93001 15.7411 9.46931 15.8562 9.11413 15.6431C8.75894 15.43 8.64377 14.9693 8.85688 14.6141L9.67536 13.25H8C7.7298 13.25 7.48048 13.1047 7.34735 12.8695C7.21422 12.6344 7.21786 12.3458 7.35688 12.1141L8.85688 9.61413C9.06999 9.25894 9.53069 9.14377 9.88587 9.35688Z" /></svg>
    <h1 class="card-title" style="display: inline;"><?= $data5 ?></h1>
    <p class="card-text">TURBIN</p>
  </div>
</div>
</a>
</div>

</div> <!-- row -->

</div> <!-- penutup kontainer -->

<!-- coba coba -->

<script src="js/jquery.js"></script>
<script src="js/highcharts.js"></script>
<script src="js/exporting.js"></script>

<?php #Masukkan Template Footer
  require_once("footer-admin.php");
?>