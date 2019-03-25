<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {

var dataPoints = [];
	
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title: {
		text: "Daily Sales Data"
	},
	axisY: {
		title: "USD",
		titleFontSize: 24
	},
	data: [{
		type: "column",
		yValueFormatString: "#,### Units",
		dataPoints: dataPoints
	}],
  axisX:{
		//title: "USD",
		titleFontSize: 24
	},
  data: [{
		type: "column",
		xValueFormatString: "#,### Units",
		dataPoints: dataPoints
	}]
  });

function addData(data) {
	//	for (var i = 0; i < data.length; i++) {
		dataPoints.push({
			x: data["Realtime Currency Exchange Rate"]["3. To_Currency Code"],
			y: parseFloat (data["Realtime Currency Exchange Rate"]["5. Exchange Rate"])	
		});
	//}
	chart.render();

}

$.getJSON("https://www.alphavantage.co/query?function=CURRENCY_EXCHANGE_RATE&from_currency=USD&to_currency=INR&apikey=NPMKYJPM9WGX5735", addData);
$.getJSON("https://www.alphavantage.co/query?function=CURRENCY_EXCHANGE_RATE&from_currency=USD&to_currency=EUR&apikey=NPMKYJPM9WGX5735", addData);
$.getJSON("https://www.alphavantage.co/query?function=CURRENCY_EXCHANGE_RATE&from_currency=USD&to_currency=AUD&apikey=NPMKYJPM9WGX5735", addData);
$.getJSON("https://www.alphavantage.co/query?function=CURRENCY_EXCHANGE_RATE&from_currency=USD&to_currency=OMR&apikey=NPMKYJPM9WGX5735", addData);
$.getJSON("https://www.alphavantage.co/query?function=CURRENCY_EXCHANGE_RATE&from_currency=USD&to_currency=CAD&apikey=NPMKYJPM9WGX5735", addData);


}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>