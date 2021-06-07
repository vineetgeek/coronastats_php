<!DOCTYPE html>
<html>
  <head>
  <link rel="apple-touch-icon" href="coronavirus.png">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="Weather PWA">
  <meta http-equiv="refresh" content="400">
  <title>Corona Updates</title>
  <?php include 'links.php'; ?>
  <?php include 'style.php'; ?>
  </head>



<body>

<?php

$data = file_get_contents('https://api.covid19india.org/data.json');
$coranalive = json_decode($data, true);



$totalcon = $coranalive['statewise'][0]['confirmed'];
$totalact = $coranalive['statewise'][0]['active'];
$totalrec = $coranalive['statewise'][0]['recovered'];
$totaldec = $coranalive['statewise'][0]['deaths'];

$totaldailyincrease = $coranalive['statewise'][0]['deltaconfirmed'];
$totaldailyrec = $coranalive['statewise'][0]['deltarecovered'];
$totaldailydec = $coranalive['statewise'][0]['deltadeaths'];
$lastupdate = $coranalive['statewise'][0]['lastupdatedtime'];




$statescount = count($coranalive['statewise']);
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
  <a class="navbar-brand pl-5" href="index.php">COVID-19</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto pr-5">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li>
      <a class="nav-link" href="https://github.com/vineet9798/corona-.git" target="_blank"><i class="fab fa-github"></i> Contribute</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#aboutid">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#dailyid">Daily</a>
      </li>
    </ul>
  </div>
</nav>

<div class="main_header pt-5">
  <div class="my-5">
    <h1 class="text-center text-uppercase">let's stay safe and fight against cor<span class="corona_rot"> <img src="coronavirus.png"> </span>na</h1>
    <h5 class="text-center my-5" ><i>Our Data is from multiple sources & we show only the confirmed count & <br>do not update based on rumours. If you are looking for Real-Time count,<br> you are free to also cross check other trackers.</i></h5>

  </div>
</div>
<br>
<center>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- corona ad unit -->
<ins class="adsbygoogle"
     style="display:inline-block;width:970px;height:250px"
     data-ad-client="ca-pub-2309289513710504"
     data-ad-slot="5733240779"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
</center>

<div class="container-fluid sub_section pt-5 pb-5" id="aboutid">
  <div class="section_header text-center mb-5 mt-4">
    <h1> About COVID-19  </h1> 
  </div>
  <div class="row">
    <div class="col-lg-6 col-md-6 col-12 pl-5">
      <h2>What is COVID-19</h2>
      <p>Coronavirus disease (COVID-19) is an infectious disease caused by a newly discovered coronavirus.</p>
      <p>Most people infected with the COVID-19 virus will experience mild to moderate respiratory illness and recover without requiring special treatment.  Older people, and those with underlying medical problems like cardiovascular disease, diabetes, chronic respiratory disease, and cancer are more likely to develop serious illness.</p>
      <p>The best way to prevent and slow down transmission is be well informed about the COVID-19 virus, the disease it causes and how it spreads. Protect yourself and others from infection by washing your hands or using an alcohol based rub frequently and not touching your face. </p>
      <p>The COVID-19 virus spreads primarily through droplets of saliva or discharge from the nose when an infected person coughs or sneezes, so it’s important that you also practice respiratory etiquette (for example, by coughing into a flexed elbow).</p>
    </div>
    <div class="col-lg-5 col-md-6 col-12 pl-5">
      <img src="aboutcorona.jpg" class="img-fluid">
    </div>
  </div>
</div>

<br>
<br>



<div class="table">
<section class="corona_update">

<div class="co_head">
<h3 class="text-center text-uppercase"> COVID-19 LIVE UPDATES OF THE INDIA </h3>
</div>
<div class="text-center">
<h8><i>Last Updated Time:</i> <?php echo $lastupdate ?> <br> <i>Refresh </i> <a href="index.php"><i class="fas fa-sync"></i></a></h8>

</div>

</section>


<div class="table-responsive"  id="dailyid">
<table class="table table-bordered table-striped text-center">
<thead class="thead-dark">
<tr>
<th class="text-capitalize">States</th>
<th class="text-capitalize">Confirmed</th>
<th class="text-capitalize">Active</th>
<th class="text-capitalize">Recovered</th>
<th class="text-capitalize">deaths</th>
</tr>
</thead>



<div class="container-fluid my=5 pt-5 pb-5">
  <div class="row text-center">
    <div class="col-4 text-danger">
      <h4>Confirmed</h4>
      <?php echo number_format($totalcon) ?>
      <small class="pl-1"><i class="fas fa-plus"></i>
    <?php echo number_format($totaldailyincrease) ?></small>
    </div>


    <div class="col-4 text-success">
      <h4>Recovered</h4>
      <?php echo number_format($totalrec) ?>
      <small class="pl-1"> <i class="fas fa-plus"></i>
    <?php echo number_format($totaldailyrec) ?></small>
    </div>
    <div class="col-4">
      <h4>Deceased</h4>
      <?php echo number_format($totaldec) ?>
      <small class="pl-1"><i class="fas fa-plus"></i>
    <?php echo number_format($totaldailydec) ?></small>
    </div>
  </div>
</div>
<div class="container-fluid my=5 pt-5 pb-5">
  <div class="text-center">
  <a href="index.php"><button type="button" class="btn btn-primary btn-lg">Tabular</button></a>
  <a href="graph.html"><button type="button" class="btn btn-secondary btn-lg">Graphically</button></a>
</div>
</div>

<?php


$i=1;
while($i < $statescount){
  $increase = $coranalive['statewise'][$i]['deltaconfirmed'];
  $dailyrec = $coranalive['statewise'][$i]['deltarecovered'];
  $dailydeath = $coranalive['statewise'][$i]['deltadeaths'];


  ?>


  <tr>
  <td><?php echo $coranalive['statewise'][$i]['state'] ?></td>
  <td>
    <?php echo number_format($coranalive['statewise'][$i]['confirmed']) ?>
    <?php if($increase != 0) { ?>
    <small class="text-danger pl-1"><i class="fas fa-arrow-up"></i>
    <?php echo number_format($increase) ?></small>
    <?php } ?>
  </td>
  <td><?php echo number_format($coranalive['statewise'][$i]['active']) ?></td>
  <td>
    <?php echo number_format($coranalive['statewise'][$i]['recovered']) ?>
    <?php if($dailyrec != 0) { ?>
    <small class="text-success pl-1"><i class="fas fa-arrow-up"></i>
    <?php echo number_format($dailyrec) ?></small>
    <?php } ?>

  </td>
  <td><?php echo number_format($coranalive['statewise'][$i]['deaths']) ?>
  <?php if($dailyrec != 0) { ?>
    <small class=" pl-1"><i class="fas fa-arrow-up"></i>
    <?php echo number_format($dailydeath) ?></small>
    <?php } ?>
  </td>
  </tr>

<?php

  $i++;
}


?>


<footer class="page-footer font-small blue">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3"> Made with ❤️ in 🇮🇳 by <a href="https://twitter.com/vineet9798">@VineetSrivastav</a>
  </div>
  <!-- Copyright -->

</footer>

<br>
<br>


</body>
</html>