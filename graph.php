<!DOCTYPE HTML>
<html>
<head>
<?php

 if (isset($_GET['from']))
 {
 	$from = $_GET['from'];
 	
 }else
 {
 	$from = 'USD';
 }
 if (isset($_GET['to']))
 {
 	$to = $_GET['to'];
 	
 }
 else
 {
 	$to = 'USD';
 }
 
 
 $startdate = '';
 $enddate = '';
  if ( !isset($_GET['day'])) {
    $_GET['day'] = '7_days';
}

  switch($_GET['day'])
 {
   case "1_month": 
   	$startdate = date("Y-m-d",strtotime("-1 months"));
    $enddate = date("Y-m-d");
   	break;
   case "3_months": 
   $startdate = date("Y-m-d",strtotime("-3 months"));
    $enddate = date("Y-m-d");
   	break;
   case "6_months": 
   	$startdate = date("Y-m-d",strtotime("-6 months"));
    $enddate = date("Y-m-d"); 
   	break;
   case "12_months": 
   	$startdate = date("Y-m-d",strtotime("-12 months"));
    $enddate = date("Y-m-d");
   	break;
   default:      
   	$startdate = date("Y-m-d",strtotime("-7 days"));
    $enddate = date("Y-m-d");
   	break;  // or whatever

 }
  

// set API Endpoint and API key 
$endpoint = 'timeseries';
$access_key = '3cd2aeb4aef6ce9a3d64ecbc658ec631';

// Initialize CURL:
$url = 'https://data.fixer.io/api/timeseries?access_key=3cd2aeb4aef6ce9a3d64ecbc658ec631&start_date='.$startdate.'&end_date='.$enddate.'&base='.$from.'';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Store the data:
$json = curl_exec($ch);
curl_close($ch);

// Decode JSON response:
$exchangeRates = json_decode($json, true);
//echo "<pre>"; print_r($exchangeRates); echo "</pre>";

$chart_array1=array();
foreach($exchangeRates['rates'] as $k_date => $r_value)
{
  
	//$chart_array1[]=array("y"=>$r_value['USD'],"label"=>$k_date);
	$chart_array1[]=array("y"=>$r_value[$to],"label"=>$k_date);
		//print_r ($chart_array1);
}
?>

<script type="text/javascript">
window.onload = function () {
 
 
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Rate of currency"
	},
	axisY: {
		title: "Converted Currency value " 
	},
	data: [{
		type: "line",
		dataPoints: <?php echo json_encode($chart_array1, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
}
</script>
</head>
<body>
Historical Graph of Base <?php echo ($from);?> to <?php echo ($to); ?><br>Dates from <?php echo $startdate;?> to <?php echo $enddate;?>
<br><br>
<a href='graph.php?day=1_month&to=<?=$to;?>'>1 Month | </a>
<a href='graph.php?day=3_months&to=<?=$to;?>'>3 Months | </a>
<a href='graph.php?day=6_months&to=<?=$to;?>'>6 Months | </a>
<a href='graph.php?day=12_months&to=<?=$to;?>'>12 Months</a>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="canvasjs.min.js"></script>
<a href='graph_curr.php'>Currency Converter</a>

</body>
</html>     