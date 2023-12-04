<?php 
  require_once(realpath(dirname(dirname(__FILE__)))."/config/config.php");
  require_once("cek_status.php");
  require_once("koneksi.php");
  require_once("footer-admin.php");
  require_once("functions.php");
  error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link href="<?= SITE_URL?>/public/assets/img/rpsl1.png" rel='icon' type='image/x-icon'/>
  <title>Website Inputan PT. RPSL</title>

  <!--JQUERY IMPORT-->
  <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="<?= SITE_URL?>/public/assets/js/jquery.js"></script>
  

  <!--CSS IMPORT-->
  <link rel="stylesheet" href= "<?= SITE_URL?>/public/assets/css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href= "<?= SITE_URL?>/public/assets/bootstrap4/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href= "<?= SITE_URL?>/public/assets/bootstrap4/dist/css/bootstrap.min.css.map">
  <link rel="stylesheet" href= "<?= SITE_URL?>/public/assets/bootstrap4/dist/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href= "<?= SITE_URL?>/public/assets/bootstrap4/dist/css/bootstrap-grid.min.css.map">
  <link rel="stylesheet" href= "<?= SITE_URL?>/public/assets/bootstrap4/dist/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href= "<?= SITE_URL?>/public/assets/bootstrap4/dist/css/bootstrap-reboot.min.css.map">
  <link rel="stylesheet" href= "<?= SITE_URL?>/public/assets/DataTables/datatables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
 
  <!--JS IMPORT-->
  <script src="<?= SITE_URL?>/public/assets/DataTables/datatables.min.js"></script>
	<script src="<?= SITE_URL?>/public/assets/js/sweetalert.min.js"></script>
	<script src="<?= SITE_URL?>/public/assets/js/sweetalert2.all.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<script src="<?= SITE_URL?>/public/assets/bootstrap4/dist/js/bootstrap.min.js"></script>
	<script src="<?= SITE_URL?>/public/assets/bootstrap4/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-success">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a href="<?= SITE_URL ?>/public/index" class="navbar-brand">
            <img id="logoBrand" src="<?= SITE_URL?>/public/assets/img/rpsl1.png" width="35px">
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= SITE_URL?> /public/operasional/operasional" class="nav-item nav-link">
            <svg style="width:24px;height:24px;vertical-align: middle;" viewBox="0 0 100 100">
              <path fill="#ffffff" d="M8.329,37.328l2.891,.658c.27,.851,.613,1.681,1.026,2.474l-1.581,2.511c-.791,1.255-.736,2.583,.143,3.462l2.251,2.251c.879,.879,2.206,.932,3.462,.143l2.511-1.581c.795,.411,1.624,.755,2.474,1.026l.658,2.891c.329,1.448,1.305,2.347,2.548,2.347h3.186c1.241,0,2.219-.9,2.548-2.347l.656-2.891c.853-.27,1.683-.613,2.476-1.026l2.509,1.581c1.258,.789,2.585,.736,3.464-.143l2.251-2.251c.879-.879,.932-2.206,.141-3.462l-1.579-2.511c.411-.795,.755-1.624,1.026-2.474l2.889-.658c1.448-.329,2.347-1.307,2.347-2.548v-3.186c0-1.241-.9-2.219-2.347-2.548l-2.889-.658c-.27-.851-.613-1.681-1.026-2.474l1.579-2.511c.791-1.256,.738-2.583-.141-3.462l-2.251-2.251c-.879-.879-2.206-.932-3.464-.143l-2.509,1.581c-.795-.411-1.624-.755-2.476-1.026l-.656-2.891c-.329-1.448-1.307-2.347-2.548-2.347h-3.186c-1.243,0-2.219,.9-2.548,2.347l-.658,2.891c-.851,.272-1.679,.615-2.474,1.026l-2.511-1.581c-1.256-.789-2.583-.736-3.462,.143l-2.251,2.251c-.879,.879-.934,2.206-.143,3.462l1.581,2.511c-.413,.795-.757,1.624-1.026,2.474l-2.891,.658c-1.448,.329-2.347,1.307-2.347,2.548Zm8.705-4.141c0-5.114,4.159-9.273,9.273-9.273s9.273,4.159,9.273,9.273-4.159,9.273-9.273,9.273-9.273-4.159-9.273-9.273Zm2.045,0c0-3.985,3.241-7.228,7.228-7.228s7.228,3.243,7.228,7.228-3.243,7.228-7.228,7.228-7.228-3.243-7.228-7.228Zm53.825-10.072h6.421v1.959h-6.421v-1.959Zm-13.386-13.686h-3.66c3.081-4.374,8.029-6.958,13.423-6.958s10.339,2.588,13.422,6.958h-3.665c-2.324-2.81-5.836-4.604-9.76-4.604s-7.436,1.794-9.76,4.604Zm20.9,2.045h5.06c.858,0,1.556,.698,1.556,1.556v3.397c0,.858-.698,1.556-1.556,1.556h-3.55c.006-.166,.012-.331,.012-.498,0-2.174-.551-4.222-1.521-6.012Zm-29.262,4.954v-3.397c0-.858,.698-1.556,1.556-1.556h5.426c-.97,1.79-1.521,3.838-1.521,6.012,0,.167,.006,.332,.013,.498h-3.917c-.858,0-1.556-.698-1.556-1.556ZM26.176,91.386c.272,.471,.343,1.022,.201,1.553-.142,.531-.48,.973-.951,1.244l-5.319,3.071c-.978,.565-2.233,.228-2.797-.75L2.218,70.366c-.272-.471-.343-1.022-.201-1.553s.48-.973,.951-1.244l5.319-3.071c.312-.18,.66-.272,1.014-.272,.179,0,.36,.024,.539,.071,.531,.142,.973,.48,1.244,.951l15.091,26.139Zm69.262-21.733l-33.813,19.522c-1.638,.946-3.538,1.199-5.35,.713l-23.198-6.216c-.014-.004-.028-.007-.043-.01-1.817-.404-3.058-.571-4.955,.524l-2.774,1.602-9.808-16.988,16.631-9.602c1.241-.717,3.068-.899,4.441-.444,.019,.006,.038,.012,.057,.017l23.268,6.235c1.147,.307,2.109,1.048,2.708,2.086s.76,2.241,.452,3.389c-.628,2.344-2.992,3.684-5.381,3.055l-17.501-4.634c-.546-.144-1.105,.181-1.25,.727-.145,.546,.181,1.105,.727,1.25l17.493,4.632s0,0,0,0h0s2.787,.738,2.787,.738c1.882,.498,2.857,.161,5.466-1.345l24.803-14.32c2.501-1.444,5.71-.584,7.154,1.917,1.444,2.501,.584,5.71-1.917,7.154Zm-3.485-18.186H46.649c.517-14.641,12.047-21.32,22.778-21.32h.008c10.613,.003,22.016,6.685,22.518,21.32Zm-12.06-33.98c0,1.235-.209,2.438-.621,3.584h-6.954c-.805,0-1.46,.655-1.46,1.46v3.129c0,.805,.655,1.46,1.46,1.46h1.43c-1.387,.647-2.899,.984-4.472,.984-5.854,0-10.617-4.763-10.617-10.617s4.763-10.617,10.617-10.617,10.617,4.763,10.617,10.617Z" />
            </svg><b style="color: white;"> OPERASIONAL </b>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= SITE_URL?> /public/maintenance/maintenance" class="nav-item nav-link">
            <svg style="width:24px;height:24px;vertical-align: middle;" viewBox="0 0 100 100">
              <path fill="#ffffff" d="M92,81.2c1,1,1,2.5,0,3.5l-7.5,7.5c-1,1-2.5,1-3.5,0L52.4,63.4l11-11L92,81.2z"/><path fill="#FFFFFF" d="M12.8,19.4l-6.4-8.8l4.5-4.5l8.8,6.4l3.5,5.8l-0.5,0.5l14.9,15.1l5-5l4.4,4.4l-1.2,1.2l1.9,1.9l-11,11l-1.9-2l-1.2,1.2  l-4.4-4.4l5-5L19.1,22.3l-0.5,0.5L12.8,19.4z"/><path fill="#FFFFFF" d="M34.8,89.9c-4.7,4.7-11.4,6.2-17.3,4.4l8.2-8.2l-2.5-9.2L14,74.4l-8.2,8.2C4,76.6,5.4,69.9,10.1,65.2  c4.8-4.8,11.7-6.2,17.8-4.2L61,27.9c-2-6-0.6-13,4.2-17.8C69.9,5.4,76.6,4,82.6,5.7L74.3,14l2.5,9.2l9.2,2.5l8.2-8.2  c1.8,5.9,0.3,12.6-4.4,17.3C85.1,39.6,78.1,41,72.1,39L39,72.1C41,78.2,39.6,85.1,34.8,89.9z" />
            </svg><b style="color: white;"> MAINTENANCE </b>
          </a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="wtpDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <svg style="width:24px;height:24px;vertical-align: middle;" viewBox="0 0 50 50">
              <path fill="#FFFFFF" d="M22.053,13.927c-1.485,4.154-6.542,6.757-6.542,13.215c0,5.415,4.161,9.815,9.282,9.815c5.114,0,9.275-4.4,9.275-9.815  c0-5.74-4.956-9.061-6.536-13.202c-0.906-2.353-2.444-7.211-2.739-9.729C24.484,6.728,22.896,11.549,22.053,13.927z M26.651,32.978  c-0.597,0-1.109-0.324-1.478-0.791c-0.987-1.251,0.625-4.788,0.937-6.344c0.498-2.499,0.828-4.925,1.023-6.584  c0.228,0.472,0.467,0.937,0.688,1.353c0.845,1.616,1.73,3.304,2.269,4.694c0.319,0.975,0.497,1.789,0.513,2.418  c-0.087,1.919-1.041,3.662-2.66,4.799C27.526,32.82,27.085,32.978,26.651,32.978z"/><path fill="#FFFFFF" d="M49.871,23.498l-5.887-6.895c-0.233-0.289-0.634-0.294-0.883-0.018l-6.227,6.739c-0.239,0.262-0.157,0.49,0.197,0.49  l0.528,0.005l1.979,0.025c0.401,0.005,0.274,0.606,0.279,0.944c-0.005,0.244-0.913,9.792-7.911,15.151  c-3.286,2.518-7.215,3.699-10.671,3.699c-2.596,0-4.991-0.675-6.983-1.329c-0.35-0.116-1.01-0.34-1.69-0.543  c0.305,0.233,0.685,0.487,1.172,0.771c8.64,5.023,17.77,4.207,25.59-2.335c7.187-6.008,7.125-15.415,7.125-15.509  c0.016-0.299-0.01-0.758,0.376-0.746l2.029,0.03l0.762,0.018C50.014,24.005,50.104,23.785,49.871,23.498z"/><path fill="#FFFFFF" d="M35.977,8.425c-2.096-1.182-4.212-1.997-6.323-2.504c0.167,0.556,0.335,1.109,0.507,1.642  c2.437,0.183,4.375,0.753,5.4,1.119c0.721,0.284,1.299,0.472,1.766,0.619C36.996,9.05,36.565,8.75,35.977,8.425z"/><path fill="#FFFFFF" d="M4.154,26.652c0.025,0.286,0.099,0.832-0.233,0.832H1.832H0.338c-0.355,0-0.442,0.229-0.203,0.497l5.968,6.823  c0.244,0.274,0.629,0.284,0.878,0.011l6.143-6.834c0.251-0.276,0.158-0.497-0.192-0.497H12.4h-1.882  c-0.348,0-0.33-0.135-0.386-0.949c-0.01-0.152-0.317-8.663,7.579-15.156c0.109-0.086,0.239-0.155,0.345-0.238  c0.157-0.381,0.34-0.716,0.487-1.086c0.406-1.079,0.908-2.565,1.373-4.093c-3.314,0.847-6.511,2.568-9.482,5.153  C3.479,17.205,4.141,26.553,4.154,26.652z" /></svg>
              <b style="color: white;">WTP</b>
          </a>
            <div class="dropdown-menu" aria-labelledby="wtpDropdown" style="background-color: white;">
              <a class="dropdown-item text-success font-weight-bold" href="<?= SITE_URL ?>/public/wtp/sungai">Sungai</a>
              <a class="dropdown-item text-success font-weight-bold" href="<?= SITE_URL ?>/public/wtp/cooling_tower">Cooling Tower</a>
              <a class="dropdown-item text-success font-weight-bold" href="<?= SITE_URL ?>/public/wtp/boiler">Boiler</a>
              <a class="dropdown-item text-success font-weight-bold" href="<?= SITE_URL ?>/public/wtp/ro">RO</a>
            </div>
        </li>

        <li class="nav-item">
          <a href="<?= SITE_URL;?> /public/hrd/pelanggaran" class="nav-item nav-link">
            <svg style="width:24px;height:24px;vertical-align: middle;" viewBox="0 0 30 30">
              <path fill="#ffffff" d="M88,232H40c-13.3,0-24,10.7-24,24c0,13.3,10.7,24,24,24h48V232z"/><path fill="#FFFFFF" d="M12,5c0-1.1030273,0.8969727-2,2-2h12c1.1030273,0,2,0.8969727,2,2v22c0,1.1030273-0.8969727,2-2,2H14   c-1.1030273,0-2-0.8969727-2-2h-1c0,1.6542969,1.3457031,3,3,3h12c1.6542969,0,3-1.3457031,3-3V5c0-1.6542969-1.3457031-3-3-3H14   c-1.6542969,0-3,1.3457031-3,3"/><path fill="#FFFFFF" d="M25.0169678,26C24.4553223,26,24,25.5523071,24,25v-1.5908203   c-0.7056274-0.2792969-1.4354858-0.6503906-2.0303345-1.105957l-1.406189,0.7963257   c-0.4860229,0.2752686-1.1069336,0.1116333-1.3878174-0.3657837l-2.0387573-3.4650269   c-0.2816772-0.4787598-0.1146851-1.0914307,0.3728027-1.3674316l1.4020996-0.7938843   C18.8562012,16.7285156,18.8288574,16.3632813,18.8288574,16c0-0.3637695,0.0273438-0.7285156,0.0829468-1.1074219   l-1.4020996-0.7938843c-0.4874878-0.276001-0.65448-0.8886719-0.3728027-1.3674316l2.0387573-3.4650269   c0.2808838-0.477417,0.9017944-0.6410522,1.3878174-0.3657837l1.406189,0.7963257   C22.5645142,9.2412109,23.2943726,8.8706055,24,8.5908203V7c0-0.5523071,0.4553223-1,1.0169678-1H27V5c0-0.5523071-0.4476929-1-1-1   h-4c0,1.1045532-0.8954468,2-2,2s-2-0.8954468-2-2h-4c-0.5522461,0-1,0.4476929-1,1v22c0,0.5523071,0.4477539,1,1,1h12   c0.5523071,0,1-0.4476929,1-1v-1H25.0169678z"/><path fill="#FFFFFF" d="M27,19c-1.6568546,0-3-1.3431454-3-3s1.3431454-3,3-3"/><path fill="#FFFFFF" d="M23,16c0-2.2055664,1.7944336-4,4-4V7h-2v1.9360352c0,0.2119141-0.1841431,0.4008789-0.3880005,0.4716797   c-0.8354492,0.2890625-1.5970459,0.7177734-2.2630005,1.2749023c-0.164978,0.1381836-0.3997803,0.1577148-0.5861816,0.0527344   l-1.7161255-0.9682617L18,13.2319336l1.7136841,0.9667969c0.187439,0.1054688,0.2866211,0.3154297,0.2472534,0.5239258   C19.876709,15.1694336,19.8358154,15.5869141,19.8358154,16s0.0408936,0.8305664,0.1251221,1.2773438   c0.0393677,0.2084961-0.0598145,0.418457-0.2472534,0.5239258L18,18.7680664l2.0466919,3.4648438l1.7161255-0.9682617   c0.1864014-0.1054688,0.4212036-0.0849609,0.5861816,0.0527344c0.6659546,0.5571289,1.4275513,0.9858398,2.2630005,1.2749023   C24.8158569,22.6630859,25,22.8520508,25,23.0639648V25h2v-5C24.7944336,20,23,18.2055664,23,16z"/><circle fill="#FFFFFF" cx="7.5" cy="18.5" r="2.5"/><path fill="#FFFFFF" d="M9,21H6c-1.6568604,0-3,1.3431396-3,3v1c0,0.5523071,0.4476929,1,1,1h7c0.5523071,0,1-0.4476929,1-1v-1   C12,22.3431396,10.6568604,21,9,21z"/><circle fill="#FFFFFF" cx="7.5" cy="7.5" r="2.5"/><path fill="#FFFFFF" d="M9,10H6c-1.6568604,0-3,1.3431396-3,3v1c0,0.5523071,0.4476929,1,1,1h7c0.5523071,0,1-0.4476929,1-1v-1   C12,11.3431396,10.6568604,10,9,10z" />
            </svg><b style="color: white;">HRD</b></a>
        </li>
        <li class="nav-item">
          <a href="<?= SITE_URL;?> /public/hse/kecelakaan_kerja" class="nav-item nav-link">
            <svg style="width:24px;height:24px;vertical-align: middle;" viewBox="0 0 60 60">
              <path fill="#ffffff" d="M88,232H40c-13.3,0-24,10.7-24,24c0,13.3,10.7,24,24,24h48V232z"/><path fill="#FFFFFF" d="M61,35.85v-7.7L52.31,26.7a20.38,20.38,0,0,0-2.21-5.31l5.13-7.18L49.79,8.77,42.61,13.9a20.38,20.38,0,0,0-5.31-2.21L35.85,3h-7.7L26.7,11.69a20.38,20.38,0,0,0-5.31,2.21L14.21,8.77,8.77,14.21l5.13,7.18a20.38,20.38,0,0,0-2.21,5.31L3,28.15v7.7l8.69,1.45a20.38,20.38,0,0,0,2.21,5.31L8.77,49.79l5.44,5.44,7.18-5.13a20.38,20.38,0,0,0,5.31,2.21L28.15,61h7.7l1.45-8.69a20.38,20.38,0,0,0,5.31-2.21l7.18,5.13,5.44-5.44L50.1,42.61a20.38,20.38,0,0,0,2.21-5.31ZM32,47A15,15,0,1,1,47,32,15,15,0,0,1,32,47Zm2-17h5v4H34v5H30V34H25V30h5V25h4ZM32,19A13,13,0,1,0,45,32,13,13,0,0,0,32,19Zm9,17H36v5H28V36H23V28h5V23h8v5h5Z" />
            </svg><b style="color: white;">HSE</b>
          </a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <ul class="nav nav-pills">

          <!--user-->
          <li class="nav-item">
            <a id="log" href="<?= SITE_URL;?> /public/users/user_data" data-toggle="tooltip" data-placement="bottom" title="Data Pengguna" class="nav-item nav-link">
              <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                <path fill="#FFFFFF" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" />
              </svg>
            </a>
          </li>

          <!--logout-->
          <li class="nav-item">
            <a href="<?= SITE_URL;?> /src/logout.php" id="log" data-toggle="tooltip" data-placement="bottom" title="Logout" class="nav-item nav-link">
              <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                <path fill="#FFFFFF" d="M14.08,15.59L16.67,13H7V11H16.67L14.08,8.41L15.5,7L20.5,12L15.5,17L14.08,15.59M19,3A2,2 0 0,1 21,5V9.67L19,7.67V5H5V19H19V16.33L21,14.33V19A2,2 0 0,1 19,21H5C3.89,21 3,20.1 3,19V5C3,3.89 3.89,3 5,3H19Z" />
              </svg>
            </a>
          </li>
        </ul>
      </form>
    </div>
  </nav>
</body>
<br><br><br><br>