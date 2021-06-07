<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Document</title>
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
<div class="updates">
  <div class="container-fluid pt-3 pb-1">
  <div class="row text-center">
  <div class="my-5 col-sm ">
    
    <h1><span class="corona_rot"><img src="coronavirus.png"></a></span></h1>
    </div>  
    <div class="vl"></div>
    <div class=" col-sm text-danger">
      <h5>Confirmed</h5>
      <?php echo number_format($totalcon) ?>
      <small class="pl-1"><i class="fas fa-plus"></i>
    <?php echo number_format($totaldailyincrease) ?></small>
    </div>
    <div class="vl"></div>
    <div class="col-sm text-success">
      <h5>Recovered</h5>
      <?php echo number_format($totalrec) ?>
      <small class="pl-1"> <i class="fas fa-plus"></i>
    <?php echo number_format($totaldailyrec) ?></small>
    </div>
    <div class="vl"></div>
    <div class="col-sm">
      <h5>Deceased</h5>
      <?php echo number_format($totaldec) ?>
      <small class="pl-1"><i class="fas fa-plus"></i>
    <?php echo number_format($totaldailydec) ?></small>
    </div>

  </div>
</div>
</div>

<style>

.updates{
    margin: auto;
    width: 60%;
    border: 1px solid black;
    padding: auto;
    font-size: 1em;

    }


.corona_rot img{
    position: relative;
    bottom: 50px;
    animation: gocorona 3s linear infinite;   
}

@keyframes gocorona{
    0% { transform: rotate(0); }
    100% { transform: rotate(360deg); }
}
.vl {
  border-left: 1px solid black;
  height: 100px;
}

</style>
</body>
</html>