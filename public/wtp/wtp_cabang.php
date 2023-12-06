<?php
require_once ("../../config/config.php");
require_once (SITE_ROOT."/src/header-admin.php");
require_once (SITE_ROOT."/src/footer-admin.php");
?>

<style> 
  body {
  background: url("../assets/img/wttp.png")
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



<body>

  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div class="container" >
  <div class="row">
    <div class="col-sm">
      <a href="<?= SITE_URL?>/public/wtp/sungai" target="_blank" style="text-decoration: none;">
      <div class="card text-white" style="background-color: #0066cc; max-width: 18rem; filter: drop-shadow(3px 4px 3px black)">
         <div class="card-body">
          <svg style="width:40px;height:40px; float: right; margin-top: 5px;" viewBox="0 0 25 25"><path fill="#FFFFFF" d="M18,13.29a2.979,2.979,0,0,1-1.94-.681,1.617,1.617,0,0,0-2.126,0,3.095,3.095,0,0,1-3.876,0,1.612,1.612,0,0,0-2.121,0A2.975,2.975,0,0,1,6,13.29a2.968,2.968,0,0,1-1.936-.682A1.529,1.529,0,0,0,3,12.21a.75.75,0,0,1,0-1.5,2.974,2.974,0,0,1,1.937.682A1.525,1.525,0,0,0,6,11.79a1.552,1.552,0,0,0,1.061-.4,3.093,3.093,0,0,1,3.875,0,1.612,1.612,0,0,0,2.122,0,3.1,3.1,0,0,1,3.879,0,1.618,1.618,0,0,0,2.128,0A2.979,2.979,0,0,1,21,10.71a.75.75,0,0,1,0,1.5,1.554,1.554,0,0,0-1.064.4A2.986,2.986,0,0,1,18,13.29Z"/><path fill="#FFFFFF" d="M18,17.29a2.984,2.984,0,0,1-1.94-.681,1.617,1.617,0,0,0-2.126,0,3.095,3.095,0,0,1-3.876,0,1.612,1.612,0,0,0-2.121,0A2.975,2.975,0,0,1,6,17.29a2.968,2.968,0,0,1-1.936-.682A1.529,1.529,0,0,0,3,16.21a.75.75,0,0,1,0-1.5,2.974,2.974,0,0,1,1.937.682A1.525,1.525,0,0,0,6,15.79a1.547,1.547,0,0,0,1.061-.4,3.093,3.093,0,0,1,3.875,0,1.613,1.613,0,0,0,2.122,0,3.1,3.1,0,0,1,3.879,0,1.62,1.62,0,0,0,2.128,0A2.984,2.984,0,0,1,21,14.71a.75.75,0,0,1,0,1.5,1.558,1.558,0,0,0-1.064.4A2.981,2.981,0,0,1,18,17.29Z"/><path fill="#FFFFFF" d="M18,9.29a2.979,2.979,0,0,1-1.94-.681,1.617,1.617,0,0,0-2.126,0,3.095,3.095,0,0,1-3.876,0,1.612,1.612,0,0,0-2.121,0A2.975,2.975,0,0,1,6,9.29a2.968,2.968,0,0,1-1.936-.682A1.529,1.529,0,0,0,3,8.21a.75.75,0,0,1,0-1.5,2.974,2.974,0,0,1,1.937.682A1.525,1.525,0,0,0,6,7.79a1.552,1.552,0,0,0,1.061-.4,3.093,3.093,0,0,1,3.875,0,1.612,1.612,0,0,0,2.122,0,3.1,3.1,0,0,1,3.879,0,1.618,1.618,0,0,0,2.128,0A2.979,2.979,0,0,1,21,6.71a.75.75,0,1,1,0,1.5,1.554,1.554,0,0,0-1.064.4A2.986,2.986,0,0,1,18,9.29Z" /></svg>
          <h1 class="card-title" style="display: inline;"></h1>
          <p class="card-text">SUNGAI</p>
        </div>
      </div>
      </a>
    </div>

    <div class="col-sm">
      <a href="<?= SITE_URL?>/public/wtp/cooling_tower" target="_blank" style="text-decoration: none;">
      <div class="card text-white" style="background-color:  #28A745; max-width: 18rem;filter: drop-shadow(3px 4px 3px black)">
        <div class="card-body">
          <svg style="width:40px;height:40px; float: right; margin-top: 5px;" viewBox="0 0 70 70"><path fill="#FFFFFF" d="M15.076,46.997c0.125,0.881,0.417,1.732,0.862,2.503c0.444,0.771,1.035,1.449,1.736,1.998l2.054-3.561   c-0.235-0.276-0.421-0.59-0.544-0.938L15.076,46.997z"/><path fill="#FFFFFF" d="M22,33c4.781,0,8.956,2.601,11.214,6.456c-0.728-2.797-1.376-5.62-1.952-8.456H29H12.738   c-0.576,2.835-1.223,5.656-1.953,8.456C13.044,35.601,17.219,33,22,33z"/><path fill="#FFFFFF" d="M22,43c0.187,0,0.369,0.022,0.547,0.055l2.052-3.55c-1.652-0.665-3.545-0.665-5.197,0l2.052,3.55   C21.631,43.022,21.813,43,22,43z"/><path fill="#FFFFFF" d="M38.119,35H50h1.881c-0.267-1.329-0.519-2.661-0.736-4H38.854C38.638,32.339,38.386,33.671,38.119,35z"/><path fill="#FFFFFF" d="M13.138,29H29h1.863c-0.253-1.332-0.497-2.666-0.715-4H24H13.853C13.634,26.337,13.39,27.669,13.138,29z"/><path fill="#FFFFFF" d="M9,46c0-0.104,0.013-0.204,0.016-0.307C7.436,50.882,5.606,55.996,3.504,61h23.832l1.733-4.116   C26.986,58.239,24.538,59,22,59C14.832,59,9,53.168,9,46z"/><path fill="#FFFFFF" d="M58.183,55.51c-2.517-5.977-4.485-12.179-5.885-18.51H50H37.702c-1.4,6.331-3.368,12.533-5.885,18.51L29.506,61h30.987   L58.183,55.51z"/><path fill="#FFFFFF" d="M22,35c-6.065,0-11,4.935-11,11s4.935,11,11,11c3.51,0,6.827-1.704,8.897-4.557c0.746-1.893,1.434-3.809,2.068-5.742   C32.982,46.469,33,46.237,33,46C33,39.935,28.065,35,22,35z M30.994,45.995c0.002,1.583-0.413,3.141-1.2,4.505   c-0.786,1.363-1.928,2.501-3.301,3.292l-0.866,0.498l-3.083-5.345C22.367,48.978,22.186,49,22,49c-0.186,0-0.367-0.022-0.544-0.055   l-3.083,5.345l-0.866-0.498c-1.373-0.79-2.515-1.928-3.301-3.292c-0.787-1.363-1.202-2.921-1.2-4.504l0.001-0.999l6.178,0.003   c0.124-0.346,0.308-0.659,0.542-0.934l-3.093-5.351l0.865-0.5c2.742-1.588,6.26-1.588,9.002,0l0.864,0.5l-3.091,5.351   c0.234,0.274,0.418,0.587,0.542,0.933l6.178-0.003L30.994,45.995z"/><path fill="#FFFFFF" d="M26.325,51.498c0.701-0.549,1.292-1.227,1.736-1.998c0.445-0.771,0.737-1.623,0.862-2.503l-4.108,0.002   c-0.124,0.348-0.309,0.663-0.545,0.939L26.325,51.498z"/><circle fill="#FFFFFF" cx="22" cy="46" r="1"/><path fill="#FFFFFF" d="M28,21c0-1.102-0.446-2.1-1.168-2.824C27.551,17.31,28,16.213,28,15c0-2.452-1.768-4.483-4.098-4.909   C24.579,9.238,25,8.173,25,7c0-2.761-2.239-5-5-5s-5,2.239-5,5c0,0.743,0.172,1.441,0.463,2.075   C14.292,9.773,13.5,11.038,13.5,12.5c0,1.142,0.484,2.165,1.251,2.894C14.283,16.155,14,17.042,14,18c0,2.761,2.239,5,5,5   c0.5,0,0.973-0.096,1.429-0.232C21.083,24.086,22.429,25,24,25C26.209,25,28,23.209,28,21z"/><path fill="#FFFFFF" d="M39.268,24.591C39.102,25.031,39,25.502,39,26c0,2.209,1.791,4,4,4c1.924,0,3.528-1.359,3.911-3.169   C47.259,26.93,47.62,27,48,27c2.209,0,4-1.791,4-4c0-0.498-0.102-0.969-0.268-1.409C53.07,20.944,54,19.586,54,18   c0-2.02-1.502-3.673-3.447-3.944C51.43,13.322,52,12.233,52,11c0-1.867-1.284-3.422-3.014-3.863C48.988,7.091,49,7.047,49,7   c0-2.209-1.791-4-4-4s-4,1.791-4,4c0,1.233,0.57,2.322,1.447,3.056C40.502,10.327,39,11.98,39,14c0,1.233,0.57,2.322,1.447,3.056   C38.502,17.327,37,18.98,37,21C37,22.586,37.93,23.944,39.268,24.591z" /></svg>
          <h1 class="card-title" style="display: inline;"></h1>
          <p class="card-text">COOLING TOWER</p>
        </div>
      </div>
      </a>
    </div>

    <div class="col-sm">
      <a href="<?= SITE_URL?>/public/wtp/boiler" target="_blank" style="text-decoration: none;">
      <div class="card text-white" style="background-color: #FF4500; max-width: 18rem;filter: drop-shadow(3px 4px 3px black)">
         <div class="card-body">
          <svg style="width:40px;height:40px; float: right; margin-top: 5px;" viewBox="0 0 70 70"><path fill="#FFFFFF"  d="M16.41,13.31c1.93,0,3.76,0.44,5.41,1.21v-3.66c0-0.3-0.24-0.55-0.55-0.55h-9.99c-0.3,0-0.55,0.24-0.55,0.55v3.66   c1.65-0.77,3.48-1.21,5.4-1.21H16.41z"/><path fill="#FFFFFF" d="M17.9,5.68c0-0.29,0.23-0.52,0.52-0.52h24.62c0.28,0,0.52,0.23,0.52,0.52v20.61h3.23V3.54c0-0.89-0.72-1.62-1.62-1.62   h-28.9c-0.89,0-1.62,0.72-1.62,1.62v5.73h3.23V5.68z"/><path fill="#FFFFFF" d="M39.13,27.95v2.2h-9.44v25.93h25.98c1.89,0,3.42-1.54,3.42-3.43v-3.45h2.27c0.45,0,0.81-0.36,0.81-0.81V37.82   c0-0.45-0.36-0.81-0.81-0.81h-2.27v-3.45c0-1.89-1.53-3.42-3.42-3.42h-4.43v-2.2c0-0.34-0.28-0.62-0.62-0.62H39.75   C39.41,27.33,39.13,27.61,39.13,27.95z M44.69,36.55c3.61,0,6.55,2.94,6.55,6.55c0,3.61-2.94,6.56-6.55,6.56s-6.56-2.94-6.56-6.56   C38.14,39.49,41.08,36.55,44.69,36.55z"/><rect fill="#FFFFFF" x="29.69" y="57.12" width="23.85" height="2.01"/><rect fill="#FFFFFF" x="17.77" y="55.72" width="6.33" height="3.41"/><rect fill="#FFFFFF" x="17.77" y="50.71" width="6.33" height="3.97"/><rect fill="#FFFFFF" x="17.77" y="45.68" width="6.33" height="3.98"/><rect fill="#FFFFFF" x="17.77" y="40.67" width="6.33" height="3.97"/><rect fill="#FFFFFF" x="17.77" y="35.65" width="6.33" height="3.97"/><rect fill="#FFFFFF" x="17.77" y="30.64" width="6.33" height="3.97"/><rect fill="#FFFFFF" x="17.77" y="25.62" width="6.33" height="3.97"/><path fill="#FFFFFF" d="M16.72,50.18c0-0.01,0-0.01,0-0.01v-5c0,0,0,0,0-0.01v-5c0,0,0,0,0-0.01V30.12c0-0.01,0-0.01,0-0.01V25.1c0,0,0,0,0-0.01   v-4.46c0-0.28,0.23-0.52,0.52-0.52s0.52,0.24,0.52,0.52v3.94h6.33v-3.94c0-0.28,0.23-0.52,0.52-0.52c0.29,0,0.52,0.24,0.52,0.52   v4.46c0,0.01,0,0.01,0,0.01v5.02c0,0,0,0,0,0.01v10.02c0,0.01,0,0.01,0,0.01v5c0,0.01,0,0.01,0,0.01v5c0,0,0,0,0,0.01v8.95h3.49   V26.91c0-6.89-5.49-12.53-12.23-12.55h-0.25C9.4,14.38,3.91,20.02,3.91,26.91v32.22h12.81V50.18z M10.66,55.37H6.97   c-0.28,0-0.52-0.23-0.52-0.52c0-0.29,0.24-0.52,0.52-0.52h3.69c0.28,0,0.52,0.23,0.52,0.52C11.18,55.13,10.94,55.37,10.66,55.37z    M6.44,50.27c0-0.28,0.24-0.52,0.52-0.52h2.48c0.29,0,0.52,0.24,0.52,0.52c0,0.29-0.23,0.52-0.52,0.52H6.97   C6.68,50.79,6.44,50.56,6.44,50.27z M10.66,46.23H6.97c-0.28,0-0.52-0.23-0.52-0.52s0.24-0.52,0.52-0.52h3.69   c0.28,0,0.52,0.23,0.52,0.52S10.94,46.23,10.66,46.23z M6.44,41.14c0-0.29,0.24-0.52,0.52-0.52h2.48c0.29,0,0.52,0.23,0.52,0.52   c0,0.28-0.23,0.52-0.52,0.52H6.97C6.68,41.66,6.44,41.42,6.44,41.14z M10.66,37.09H6.97c-0.28,0-0.52-0.23-0.52-0.52   c0-0.28,0.24-0.52,0.52-0.52h3.69c0.28,0,0.52,0.24,0.52,0.52C11.18,36.86,10.94,37.09,10.66,37.09z M6.44,32   c0-0.29,0.24-0.52,0.52-0.52h2.48c0.29,0,0.52,0.23,0.52,0.52c0,0.28-0.23,0.52-0.52,0.52H6.97C6.68,32.52,6.44,32.28,6.44,32z    M10.66,27.95H6.97c-0.28,0-0.52-0.23-0.52-0.52c0-0.28,0.24-0.52,0.52-0.52h3.69c0.28,0,0.52,0.24,0.52,0.52   C11.18,27.72,10.94,27.95,10.66,27.95z" /></svg>
          <h1 class="card-title" style="display: inline;"></h1>
          <p class="card-text">BOILER</p>
        </div>
      </div>
      </a>
    </div>

    <div class="col-sm">
      <a href="<?= SITE_URL?>/public/operasional/operasional_maintenance" target="_blank" style="text-decoration: none;">
      <div class="card text-white" style="background-color: #336699; max-width: 18rem;filter: drop-shadow(3px 4px 3px black)">
        <div class="card-body">
          <svg style="width:40px;height:40px; float: right; margin-top: 5px;" viewBox="0 0 70 70"><path fill="#FFFFFF"  d="M60.68023,32.24756q.03308-3.08036-.00184-6.1607c-.04961-.00184-.09923-.00276-.14793-.0046H59.12191s-.00827-8.59373-.01562-10.46812a7.85353,7.85353,0,0,0-1.55556-4.4131c-.03033-.0487-.05881-.09647-.08637-.14517a5.61371,5.61371,0,0,0,1.641-5.5359,5.8967,5.8967,0,0,0-2.99168-3.73225l-.00735-.02389a5.10146,5.10146,0,0,0-1.11361-.42266A3.68085,3.68085,0,0,0,53.97008,1.174Q31.41533,1.16017,8.86057,1.173a5.72888,5.72888,0,0,0-5.3457,4.26424A5.639,5.639,0,0,0,6.015,11.745a6.38557,6.38557,0,0,0,1.652.67717c-.04319,15.642-.00551,31.28586-.01654,46.92878-.8738.01654-1.74668,0-2.62048.01195-.00276,1.15312-.00919,2.30532-.00367,3.45844.034.00092.10015.00276.13322.0046q26.174-.02481,52.348.00367l.09.00184c-.02757-1.15771.01562-2.31543-.02113-3.47222-.81592-.01287-1.63183.00183-2.44774-.00276.00735-2.24927.00184-4.49855,0-6.74782a6.19034,6.19034,0,0,0,3.98308-5.7509c.01654-3.90959-.01194-7.82009.00368-11.72967.25176-.00092.50535-.00276.75894-.01011q.00138-.38039-.00275-.76079h.00092v-.441h-.44287l.0101-1.66582S60.26676,32.2494,60.68023,32.24756ZM45.47007,59.37023c.01746-.4392.01378-.87839.00827-1.31667.19387-.02205.38866-.04043.58253-.0634-.00276-.45665-.00092-.91423-.00276-1.37088-1.17057.01011-2.34115-.00368-3.51173-.00368-.00827.47044-.01378.94088.0147,1.41132.16723,0,.33629.00183.50535.00551-.01286.44011-.00918.88115.00551,1.32126-3.55951-.011-7.119.02573-10.67761-.00919.02848-.43552.023-.87288.01838-1.3084q.30183-.01929.60366-.03675c-.00368-.46125-.00092-.92158-.00919-1.38283-1.16322-.00367-2.32553.00184-3.48876-.00183q-.00276.7029.00735,1.40671c.16171.00735.32342.0147.48606.023-.01471.4346-.00643.87012-.0046,1.30565-3.49335.00367-6.98671.0147-10.48007.00275,0-.0395-.00092-.11853-.00092-.158-.00643-.39417-.00643-.78743-.00368-1.18068.17826-.00827.35651-.01654.53476-.02756-.00092-.45574-.00275-.91148.00092-1.36721-1.15955.02389-2.31818-.00184-3.47682.0147q.00964.685.00643,1.37089c.16815.00459.33629.00826.50443.01285.01746.4438.01379.88759.01838,1.3323-2.07653.00091-4.15307.011-6.22961.00367-.01929-15.63374.00552-31.26839-.00827-46.90213,1.92585-.02849,3.85354.01194,5.77939-.02573-.00643,1.053.00827,3.40239.00184,3.82413a1.72863,1.72863,0,0,0-1.97915,1.72c2.4018.03858,4.80544.02481,7.20816.00183a1.70338,1.70338,0,0,0-1.99109-1.72462c-.00735-.41715.00551-2.77392-.00643-3.8177q4.88307.02341,9.76891-.00092c-.00276,1.05021,0,3.40882-.00552,3.8324a1.68714,1.68714,0,0,0-1.96536,1.721c2.41558.01195,4.83117.02205,7.24674-.00184a1.74809,1.74809,0,0,0-2.02875-1.73565c-.01654-.42082-.00735-2.78494-.01194-3.82873,3.271.05237,6.54476.02114,9.81576.00827-.01195,1.0447-.00092,3.41342-.0046,3.83608A1.70038,1.70038,0,0,0,40.762,17.98561c2.40364.00552,4.80819.01195,7.21183-.00275a1.74935,1.74935,0,0,0-2.04714-1.7283c-.00092-.4199.01379-2.78219.011-3.82505,1.99017.0395,3.98125-.01471,5.97233.01377q.00828,19.50612.00184,39.01223c-.23337.00184-.46584-.00092-.6983-.00552,0-.22419,0-.44838.00459-.67165H49.19313c.02114-8.43662.01654-23.10743.011-31.73884-3.25814-.00459-6.519-.00367-9.77718.02481,0,9.17718.01011,24.46821-.00826,33.48735a3.61613,3.61613,0,0,0,3.71295,3.48509c1.04837-.03583,2.105.07075,3.14788-.05513a3.67175,3.67175,0,0,0,2.69123-2.29246c.7571.00459,1.75219.00184,2.24652.00459,0,0,0-.54853.00459-.7911.23154,0,.46309-.00092.69555-.00092-.011,2.14636.00092,4.29365.00551,6.44C49.77291,59.37483,47.621,59.339,45.47007,59.37023ZM57.62607,46.673a4.80649,4.80649,0,0,1-2.48633,4.31846q-.011-19.29386-.00276-38.58956a4.91518,4.91518,0,0,0,1.15129-.40979c.13231.17.26278.34271.38039.52556a6.00468,6.00468,0,0,1,.95374,3.19015c-.00368,2.02968.00643,4.05843.00643,6.08811v4.29181h-.55221v.00276c-.30964.01469-.61929.02205-.92893.02573-.01654,2.04253-.0046,4.08507-.00552,6.12761.38224-.0046,1.14853-.00276,1.14853-.00276l.00276,1.675h-.43185v.441h.00092c0,.26.00275.521.01287.781.25083-.00642.50259-.011.75526-.01929Q57.621,40.89642,57.62607,46.673Z"/><path fill="#FFFFFF" d="M13.46294,19.06983c.011,9.18912.0046,24.40388.00092,33.39179a3.57927,3.57927,0,0,0,3.48049,3.565c1.075-.01378,2.15739.06616,3.22782-.04778a3.57478,3.57478,0,0,0,2.98893-3.51632c.01378-8.99986-.011-24.24218.0101-33.42488C19.93511,19.0395,16.69719,19.03123,13.46294,19.06983Z"/><path fill="#FFFFFF" d="M36.12107,19.04869c-3.26-.01378-6.52639-.02664-9.78269.034.02021,9.247.00643,24.52057.00368,33.56636A3.605,3.605,0,0,0,28.5996,55.7905a6.15587,6.15587,0,0,0,2.40363.24165,18.2313,18.2313,0,0,0,2.12616-.045,3.59,3.59,0,0,0,2.98616-3.61831C36.12566,43.4048,36.11923,28.19188,36.12107,19.04869Z" /></svg>
          <h1 class="card-title" style="display: inline;"></h1>
          <p class="card-text">RO</p>
        </div>
      </div>
      </a>
    </div>
  </div>
</div>

</body>