<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style type="text/css">
	body{
		background-color: lightblue;
		text-align: center;
		margin-top: 40px;
	}
	footer {
    font-size: 12px;
    margin: 0 auto;
    max-width: 1200px;
    position: relative;
    width: 95%;
}
</style>
<script>
    // WRITE THE VALIDATION SCRIPT.
    function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }    
</script>

<?php    
if(isset($_POST['SubmitButton'])){ //check if form was submitted
  $amount = $_POST['amount']; //get input text
  $from = $_POST['from'];
  $to = $_POST['to'];
  
  // set API Endpoint, access key, required parameters
$endpoint = 'convert';
$access_key = '3cd2aeb4aef6ce9a3d64ecbc658ec631';

//$from = 'USD';
//$to = 'EUR';
//$amount = 10;

//$url = 'https://data.fixer.io/api/'.$endpoint.'?access_key='.$access_key.'&from='.$from.'&to='.$to.'&amount='.$amount.'';

// initialize CURL:
$ch = curl_init('https://data.fixer.io/api/'.$endpoint.'?access_key='.$access_key.'&from='.$from.'&to='.$to.'&amount='.$amount.'');   
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// get the JSON data:
$json = curl_exec($ch);
curl_close($ch);

// Decode JSON response:
$conversionResult = json_decode($json, true);

// access the conversion result
//echo $conversionResult['result'];

echo $amount . " " . $from . " = " . $conversionResult['result']. " " . $to ."<br>";

if ($to != '')
{

    echo '<a href="graph.php?from='.$from.'&to='.$to.'">Graph</a>';
}

//print_r ($conversionResult['result']);


}    
?>
<head>
<title>Currency Converter</title>



</head>
<body>
<h1>Currency Converter</h1>
<form id="myForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
 <br>
<label>From</label>
<select name="from" id="from">
      <option value="USD" selected="1" <?php echo (isset($_POST['from']) && $_POST['from'] == 'USD') ? 'selected="selected"' : ''; ?>>United States Dollars - USD</option>
          <option  value="GBP" <?php echo (isset($_POST['from']) && $_POST['from'] == 'GBP') ? 'selected="selected"' : ''; ?>>United Kingdom Pounds - GBP</option>
          <option value="CAD" <?php echo (isset($_POST['from']) && $_POST['from'] == 'CAD') ? 'selected="selected"' : ''; ?>>Canada Dollars - CAD</option>
          <option value="AUD" <?php echo (isset($_POST['from']) && $_POST['from'] == 'AUD') ? 'selected="selected"' : ''; ?>>Australia Dollars - AUD</option>
          <option value="JPY" <?php echo (isset($_POST['from']) && $_POST['from'] == 'JPY') ? 'selected="selected"' : ''; ?>>Japan Yen - JPY</option>
          <option value="NZD" <?php echo (isset($_POST['from']) && $_POST['from'] == 'NZD') ? 'selected="selected"' : ''; ?>>New Zealand Dollars - NZD</option>
          <option value="CHF" <?php echo (isset($_POST['from']) && $_POST['from'] == 'CHF') ? 'selected="selected"' : ''; ?>>Switzerland Francs - CHF</option>
          <option value="ZAR" <?php echo (isset($_POST['from']) && $_POST['from'] == 'ZAR') ? 'selected="selected"' : ''; ?>>South Africa Rand - ZAR</option>
          <option value="DZD" <?php echo (isset($_POST['from']) && $_POST['from'] == 'DZD') ? 'selected="selected"' : ''; ?>>Algeria Dinars - DZD</option>
          <option value="ARS" <?php echo (isset($_POST['from']) && $_POST['from'] == 'ARS') ? 'selected="selected"' : ''; ?>>Argentina Pesos - ARS</option>
          <option value="AUD" <?php echo (isset($_POST['from']) && $_POST['from'] == 'AUD') ? 'selected="selected"' : ''; ?>>Australia Dollars - AUD</option>
          <option value="BHD" <?php echo (isset($_POST['from']) && $_POST['from'] == 'BHD') ? 'selected="selected"' : ''; ?>>Bahrain Dinars - BHD</option>
          <option value="BRL" <?php echo (isset($_POST['from']) && $_POST['from'] == 'BRL') ? 'selected="selected"' : ''; ?>>Brazil Reais - BRL</option>
          <option value="BGN" <?php echo (isset($_POST['from']) && $_POST['from'] == 'BGN') ? 'selected="selected"' : ''; ?>>Bulgaria Leva - BGN</option>
          <option value="CAD" <?php echo (isset($_POST['from']) && $_POST['from'] == 'CAD') ? 'selected="selected"' : ''; ?>>Canada Dollars - CAD</option>
          <option value="CLP" <?php echo (isset($_POST['from']) && $_POST['from'] == 'CLP') ? 'selected="selected"' : ''; ?>>Chile Pesos - CLP</option>
          <option value="CNY" <?php echo (isset($_POST['from']) && $_POST['from'] == 'CNY') ? 'selected="selected"' : ''; ?>>China Yuan Renminbi - CNY</option>
          <option value="CNY" <?php echo (isset($_POST['from']) && $_POST['from'] == 'CNY') ? 'selected="selected"' : ''; ?>>RMB (China Yuan Renminbi) - CNY</option>
          <option value="COP" <?php echo (isset($_POST['from']) && $_POST['from'] == 'COP') ? 'selected="selected"' : ''; ?>>Colombia Pesos - COP</option>
          <option value="CRC" <?php echo (isset($_POST['from']) && $_POST['from'] == 'CRC') ? 'selected="selected"' : ''; ?>>Costa Rica Colones - CRC</option>
          <option value="HRK" <?php echo (isset($_POST['from']) && $_POST['from'] == 'HRK') ? 'selected="selected"' : ''; ?>>Croatian Kuna - HRK</option>
          <option value="CZK" <?php echo (isset($_POST['from']) && $_POST['from'] == 'CZK') ? 'selected="selected"' : ''; ?>>Czech Republic Koruny - CZK</option>
          <option value="DKK" <?php echo (isset($_POST['from']) && $_POST['from'] == 'DKK') ? 'selected="selected"' : ''; ?>>Denmark Kroner - DKK</option>
          <option value="DOP" <?php echo (isset($_POST['from']) && $_POST['from'] == 'DOP') ? 'selected="selected"' : ''; ?>>Dominican Republic Pesos - DOP</option>
          <option value="EGP" <?php echo (isset($_POST['from']) && $_POST['from'] == 'EGP') ? 'selected="selected"' : ''; ?>>Egypt Pounds - EGP</option>
          <option value="EEK" <?php echo (isset($_POST['from']) && $_POST['from'] == 'EEK') ? 'selected="selected"' : ''; ?>>Estonia Krooni - EEK</option>
          <option value="EUR" <?php echo (isset($_POST['from']) && $_POST['from'] == 'EUR') ? 'selected="selected"' : ''; ?>>Euro - EUR</option>
          <option value="FJD" <?php echo (isset($_POST['from']) && $_POST['from'] == 'FJD') ? 'selected="selected"' : ''; ?>>Fiji Dollars - FJD</option>
          <option value="HKD" <?php echo (isset($_POST['from']) && $_POST['from'] == 'HKD') ? 'selected="selected"' : ''; ?>>Hong Kong Dollars - HKD</option>
          <option value="HUF" <?php echo (isset($_POST['from']) && $_POST['from'] == 'HUF') ? 'selected="selected"' : ''; ?>>Hungary Forint - HUF</option>
          <option value="ISK" <?php echo (isset($_POST['from']) && $_POST['from'] == 'ISK') ? 'selected="selected"' : ''; ?>>Iceland Kronur - ISK</option>
          <option value="INR" <?php echo (isset($_POST['from']) && $_POST['from'] == 'INR') ? 'selected="selected"' : ''; ?>>India Rupees - INR</option>
          <option value="IDR" <?php echo (isset($_POST['from']) && $_POST['from'] == 'IDR') ? 'selected="selected"' : ''; ?>>Indonesia Rupiahs - IDR</option>
          <option value="ILS" <?php echo (isset($_POST['from']) && $_POST['from'] == 'ILS') ? 'selected="selected"' : ''; ?>>Israel New Shekels - ILS</option>
          <option value="JMD" <?php echo (isset($_POST['from']) && $_POST['from'] == 'JMD') ? 'selected="selected"' : ''; ?>>Jamaica Dollars - JMD</option>
          <option value="JPY" <?php echo (isset($_POST['from']) && $_POST['from'] == 'JPY') ? 'selected="selected"' : ''; ?>>Japan Yen - JPY</option>
          <option value="JOD" <?php echo (isset($_POST['from']) && $_POST['from'] == 'JOD') ? 'selected="selected"' : ''; ?>>Jordan Dinars - JOD</option>
          <option value="KES" <?php echo (isset($_POST['from']) && $_POST['from'] == 'KES') ? 'selected="selected"' : ''; ?>>Kenya Shillings - KES</option>
          <option value="KRW" <?php echo (isset($_POST['from']) && $_POST['from'] == 'KRW') ? 'selected="selected"' : ''; ?>>Korea (South) Won - KRW</option>
          <option value="KWD" <?php echo (isset($_POST['from']) && $_POST['from'] == 'KWD') ? 'selected="selected"' : ''; ?>>Kuwait Dinars - KWD</option>
          <option value="LBP" <?php echo (isset($_POST['from']) && $_POST['from'] == 'LBP') ? 'selected="selected"' : ''; ?>>Lebanon Pounds - LBP</option>
          <option value="MYR" <?php echo (isset($_POST['from']) && $_POST['from'] == 'MYR') ? 'selected="selected"' : ''; ?>>Malaysia Ringgits - MYR</option>
          <option value="MUR" <?php echo (isset($_POST['from']) && $_POST['from'] == 'MUR') ? 'selected="selected"' : ''; ?>>Mauritius Rupees - MUR</option>
          <option value="MXN" <?php echo (isset($_POST['from']) && $_POST['from'] == 'MXN') ? 'selected="selected"' : ''; ?>>Mexico Pesos - MXN</option>
          <option value="MAD" <?php echo (isset($_POST['from']) && $_POST['from'] == 'MAD') ? 'selected="selected"' : ''; ?>>Morocco Dirhams - MAD</option>
          <option value="NZD" <?php echo (isset($_POST['from']) && $_POST['from'] == 'NZD') ? 'selected="selected"' : ''; ?>>New Zealand Dollars - NZD</option>
          <option value="NOK" <?php echo (isset($_POST['from']) && $_POST['from'] == 'NOK') ? 'selected="selected"' : ''; ?>>Norway Kroner - NOK</option>
          <option value="OMR" <?php echo (isset($_POST['from']) && $_POST['from'] == 'OMR') ? 'selected="selected"' : ''; ?>>Oman Rials - OMR</option>
          <option value="PKR" <?php echo (isset($_POST['from']) && $_POST['from'] == 'PKR') ? 'selected="selected"' : ''; ?>>Pakistan Rupees - PKR</option>
          <option value="PEN" <?php echo (isset($_POST['from']) && $_POST['from'] == 'PEN') ? 'selected="selected"' : ''; ?>>Peru Nuevos Soles - PEN</option>
          <option value="PHP" <?php echo (isset($_POST['from']) && $_POST['from'] == 'PHP') ? 'selected="selected"' : ''; ?>>Philippines Pesos - PHP</option>
          <option value="PLN" <?php echo (isset($_POST['from']) && $_POST['from'] == 'PLN') ? 'selected="selected"' : ''; ?>>Poland Zlotych - PLN</option>
          <option value="QAR" <?php echo (isset($_POST['from']) && $_POST['from'] == 'QAR') ? 'selected="selected"' : ''; ?>>Qatar Riyals - QAR</option>
          <option value="RON" <?php echo (isset($_POST['from']) && $_POST['from'] == 'RON') ? 'selected="selected"' : ''; ?>>Romania New Lei - RON</option>
          <option value="RUB" <?php echo (isset($_POST['from']) && $_POST['from'] == 'RUB') ? 'selected="selected"' : ''; ?>>Russia Rubles - RUB</option>
          <option value="SAR" <?php echo (isset($_POST['from']) && $_POST['from'] == 'SAR') ? 'selected="selected"' : ''; ?>>Saudi Arabia Riyals - SAR</option>
          <option value="SGD" <?php echo (isset($_POST['from']) && $_POST['from'] == 'SGD') ? 'selected="selected"' : ''; ?>>Singapore Dollars - SGD</option>
          <option value="SKK" <?php echo (isset($_POST['from']) && $_POST['from'] == 'SKK') ? 'selected="selected"' : ''; ?>>Slovakia Koruny - SKK</option>
          <option value="ZAR" <?php echo (isset($_POST['from']) && $_POST['from'] == 'ZAR') ? 'selected="selected"' : ''; ?>>South Africa Rand - ZAR</option>
          <option value="KRW" <?php echo (isset($_POST['from']) && $_POST['from'] == 'KRW') ? 'selected="selected"' : ''; ?>>South Korea Won - KRW</option>
          <option value="LKR" <?php echo (isset($_POST['from']) && $_POST['from'] == 'LKR') ? 'selected="selected"' : ''; ?>>Sri Lanka Rupees - LKR</option>
          <option value="SEK" <?php echo (isset($_POST['from']) && $_POST['from'] == 'SEK') ? 'selected="selected"' : ''; ?>>Sweden Kronor - SEK</option>
          <option value="CHF" <?php echo (isset($_POST['from']) && $_POST['from'] == 'CHF') ? 'selected="selected"' : ''; ?>>Switzerland Francs - CHF</option>
          <option value="TWD" <?php echo (isset($_POST['from']) && $_POST['from'] == 'TWD') ? 'selected="selected"' : ''; ?>>Taiwan New Dollars - TWD</option>
          <option value="THB" <?php echo (isset($_POST['from']) && $_POST['from'] == 'THB') ? 'selected="selected"' : ''; ?>>Thailand Baht - THB</option>
          <option value="TTD" <?php echo (isset($_POST['from']) && $_POST['from'] == 'TTD') ? 'selected="selected"' : ''; ?>>Trinidad and Tobago Dollars - TTD</option>
          <option value="TND" <?php echo (isset($_POST['from']) && $_POST['from'] == 'TND') ? 'selected="selected"' : ''; ?>>Tunisia Dinars - TND</option>
          <option value="TRY" <?php echo (isset($_POST['from']) && $_POST['from'] == 'TRY') ? 'selected="selected"' : ''; ?>>Turkey Lira - TRY</option>
          <option value="AED" <?php echo (isset($_POST['from']) && $_POST['from'] == 'AED') ? 'selected="selected"' : ''; ?>>United Arab Emirates Dirhams - AED</option>
          <option value="GBP" <?php echo (isset($_POST['from']) && $_POST['from'] == 'GBP') ? 'selected="selected"' : ''; ?>>United Kingdom Pounds - GBP</option>
          <option value="VEB" <?php echo (isset($_POST['from']) && $_POST['from'] == 'VEB') ? 'selected="selected"' : ''; ?>>Venezuela Bolivares - VEB</option>
          <option value="VND" <?php echo (isset($_POST['from']) && $_POST['from'] == 'VND') ? 'selected="selected"' : ''; ?>>Vietnam Dong - VND</option>
          <option value="ZMK" <?php echo (isset($_POST['from']) && $_POST['from'] == 'ZMK') ? 'selected="selected"' : ''; ?>>Zambia Kwacha - ZMK</option>
</select>

<br><br>
<label>To</label> <select name="to" id="to">
          <option value="USD" selected="1" <?php echo (isset($_POST['to']) && $_POST['to'] == 'USD') ? 'selected="selected"' : ''; ?>>United States Dollars - USD</option>
          <option  value="GBP" <?php echo (isset($_POST['to']) && $_POST['to'] == 'GBP') ? 'selected="selected"' : ''; ?>>United Kingdom Pounds - GBP</option>
          <option value="CAD" <?php echo (isset($_POST['to']) && $_POST['to'] == 'CAD') ? 'selected="selected"' : ''; ?>>Canada Dollars - CAD</option>
          <option value="AUD" <?php echo (isset($_POST['to']) && $_POST['to'] == 'AUD') ? 'selected="selected"' : ''; ?>>Australia Dollars - AUD</option>
          <option value="JPY" <?php echo (isset($_POST['to']) && $_POST['to'] == 'JPY') ? 'selected="selected"' : ''; ?>>Japan Yen - JPY</option>
          <option value="NZD" <?php echo (isset($_POST['to']) && $_POST['to'] == 'NZD') ? 'selected="selected"' : ''; ?>>New Zealand Dollars - NZD</option>
          <option value="CHF" <?php echo (isset($_POST['to']) && $_POST['to'] == 'CHF') ? 'selected="selected"' : ''; ?>>Switzerland Francs - CHF</option>
          <option value="ZAR" <?php echo (isset($_POST['to']) && $_POST['to'] == 'ZAR') ? 'selected="selected"' : ''; ?>>South Africa Rand - ZAR</option>
          <option value="DZD" <?php echo (isset($_POST['to']) && $_POST['to'] == 'DZD') ? 'selected="selected"' : ''; ?>>Algeria Dinars - DZD</option>
          <option value="ARS" <?php echo (isset($_POST['to']) && $_POST['to'] == 'ARS') ? 'selected="selected"' : ''; ?>>Argentina Pesos - ARS</option>
          <option value="AUD" <?php echo (isset($_POST['to']) && $_POST['to'] == 'AUD') ? 'selected="selected"' : ''; ?>>Australia Dollars - AUD</option>
          <option value="BHD" <?php echo (isset($_POST['to']) && $_POST['to'] == 'BHD') ? 'selected="selected"' : ''; ?>>Bahrain Dinars - BHD</option>
          <option value="BRL" <?php echo (isset($_POST['to']) && $_POST['to'] == 'BRL') ? 'selected="selected"' : ''; ?>>Brazil Reais - BRL</option>
          <option value="BGN" <?php echo (isset($_POST['to']) && $_POST['to'] == 'BGN') ? 'selected="selected"' : ''; ?>>Bulgaria Leva - BGN</option>
          <option value="CAD" <?php echo (isset($_POST['to']) && $_POST['to'] == 'CAD') ? 'selected="selected"' : ''; ?>>Canada Dollars - CAD</option>
          <option value="CLP" <?php echo (isset($_POST['to']) && $_POST['to'] == 'CLP') ? 'selected="selected"' : ''; ?>>Chile Pesos - CLP</option>
          <option value="CNY" <?php echo (isset($_POST['to']) && $_POST['to'] == 'CNY') ? 'selected="selected"' : ''; ?>>China Yuan Renminbi - CNY</option>
          <option value="CNY" <?php echo (isset($_POST['to']) && $_POST['to'] == 'CNY') ? 'selected="selected"' : ''; ?>>RMB (China Yuan Renminbi) - CNY</option>
          <option value="COP" <?php echo (isset($_POST['to']) && $_POST['to'] == 'COP') ? 'selected="selected"' : ''; ?>>Colombia Pesos - COP</option>
          <option value="CRC" <?php echo (isset($_POST['to']) && $_POST['to'] == 'CRC') ? 'selected="selected"' : ''; ?>>Costa Rica Colones - CRC</option>
          <option value="HRK" <?php echo (isset($_POST['to']) && $_POST['to'] == 'HRK') ? 'selected="selected"' : ''; ?>>Croatian Kuna - HRK</option>
          <option value="CZK" <?php echo (isset($_POST['to']) && $_POST['to'] == 'CZK') ? 'selected="selected"' : ''; ?>>Czech Republic Koruny - CZK</option>
          <option value="DKK" <?php echo (isset($_POST['to']) && $_POST['to'] == 'DKK') ? 'selected="selected"' : ''; ?>>Denmark Kroner - DKK</option>
          <option value="DOP" <?php echo (isset($_POST['to']) && $_POST['to'] == 'DOP') ? 'selected="selected"' : ''; ?>>Dominican Republic Pesos - DOP</option>
          <option value="EGP" <?php echo (isset($_POST['to']) && $_POST['to'] == 'EGP') ? 'selected="selected"' : ''; ?>>Egypt Pounds - EGP</option>
          <option value="EEK" <?php echo (isset($_POST['to']) && $_POST['to'] == 'EEK') ? 'selected="selected"' : ''; ?>>Estonia Krooni - EEK</option>
          <option value="EUR" <?php echo (isset($_POST['to']) && $_POST['to'] == 'EUR') ? 'selected="selected"' : ''; ?>>Euro - EUR</option>
          <option value="FJD" <?php echo (isset($_POST['to']) && $_POST['to'] == 'FJD') ? 'selected="selected"' : ''; ?>>Fiji Dollars - FJD</option>
          <option value="HKD" <?php echo (isset($_POST['to']) && $_POST['to'] == 'HKD') ? 'selected="selected"' : ''; ?>>Hong Kong Dollars - HKD</option>
          <option value="HUF" <?php echo (isset($_POST['to']) && $_POST['to'] == 'HUF') ? 'selected="selected"' : ''; ?>>Hungary Forint - HUF</option>
          <option value="ISK" <?php echo (isset($_POST['to']) && $_POST['to'] == 'ISK') ? 'selected="selected"' : ''; ?>>Iceland Kronur - ISK</option>
          <option value="INR" <?php echo (isset($_POST['to']) && $_POST['to'] == 'INR') ? 'selected="selected"' : ''; ?>>India Rupees - INR</option>
          <option value="IDR" <?php echo (isset($_POST['to']) && $_POST['to'] == 'IDR') ? 'selected="selected"' : ''; ?>>Indonesia Rupiahs - IDR</option>
          <option value="ILS" <?php echo (isset($_POST['to']) && $_POST['to'] == 'ILS') ? 'selected="selected"' : ''; ?>>Israel New Shekels - ILS</option>
          <option value="JMD" <?php echo (isset($_POST['to']) && $_POST['to'] == 'JMD') ? 'selected="selected"' : ''; ?>>Jamaica Dollars - JMD</option>
          <option value="JPY" <?php echo (isset($_POST['to']) && $_POST['to'] == 'JPY') ? 'selected="selected"' : ''; ?>>Japan Yen - JPY</option>
          <option value="JOD" <?php echo (isset($_POST['to']) && $_POST['to'] == 'JOD') ? 'selected="selected"' : ''; ?>>Jordan Dinars - JOD</option>
          <option value="KES" <?php echo (isset($_POST['to']) && $_POST['to'] == 'KES') ? 'selected="selected"' : ''; ?>>Kenya Shillings - KES</option>
          <option value="KRW" <?php echo (isset($_POST['to']) && $_POST['to'] == 'KRW') ? 'selected="selected"' : ''; ?>>Korea (South) Won - KRW</option>
          <option value="KWD" <?php echo (isset($_POST['to']) && $_POST['to'] == 'KWD') ? 'selected="selected"' : ''; ?>>Kuwait Dinars - KWD</option>
          <option value="LBP" <?php echo (isset($_POST['to']) && $_POST['to'] == 'LBP') ? 'selected="selected"' : ''; ?>>Lebanon Pounds - LBP</option>
          <option value="MYR" <?php echo (isset($_POST['to']) && $_POST['to'] == 'MYR') ? 'selected="selected"' : ''; ?>>Malaysia Ringgits - MYR</option>
          <option value="MUR" <?php echo (isset($_POST['to']) && $_POST['to'] == 'MUR') ? 'selected="selected"' : ''; ?>>Mauritius Rupees - MUR</option>
          <option value="MXN" <?php echo (isset($_POST['to']) && $_POST['to'] == 'MXN') ? 'selected="selected"' : ''; ?>>Mexico Pesos - MXN</option>
          <option value="MAD" <?php echo (isset($_POST['to']) && $_POST['to'] == 'MAD') ? 'selected="selected"' : ''; ?>>Morocco Dirhams - MAD</option>
          <option value="NZD" <?php echo (isset($_POST['to']) && $_POST['to'] == 'NZD') ? 'selected="selected"' : ''; ?>>New Zealand Dollars - NZD</option>
          <option value="NOK" <?php echo (isset($_POST['to']) && $_POST['to'] == 'NOK') ? 'selected="selected"' : ''; ?>>Norway Kroner - NOK</option>
          <option value="OMR" <?php echo (isset($_POST['to']) && $_POST['to'] == 'OMR') ? 'selected="selected"' : ''; ?>>Oman Rials - OMR</option>
          <option value="PKR" <?php echo (isset($_POST['to']) && $_POST['to'] == 'PKR') ? 'selected="selected"' : ''; ?>>Pakistan Rupees - PKR</option>
          <option value="PEN" <?php echo (isset($_POST['to']) && $_POST['to'] == 'PEN') ? 'selected="selected"' : ''; ?>>Peru Nuevos Soles - PEN</option>
          <option value="PHP" <?php echo (isset($_POST['to']) && $_POST['to'] == 'PHP') ? 'selected="selected"' : ''; ?>>Philippines Pesos - PHP</option>
          <option value="PLN" <?php echo (isset($_POST['to']) && $_POST['to'] == 'PLN') ? 'selected="selected"' : ''; ?>>Poland Zlotych - PLN</option>
          <option value="QAR" <?php echo (isset($_POST['to']) && $_POST['to'] == 'QAR') ? 'selected="selected"' : ''; ?>>Qatar Riyals - QAR</option>
          <option value="RON" <?php echo (isset($_POST['to']) && $_POST['to'] == 'RON') ? 'selected="selected"' : ''; ?>>Romania New Lei - RON</option>
          <option value="RUB" <?php echo (isset($_POST['to']) && $_POST['to'] == 'RUB') ? 'selected="selected"' : ''; ?>>Russia Rubles - RUB</option>
          <option value="SAR" <?php echo (isset($_POST['to']) && $_POST['to'] == 'SAR') ? 'selected="selected"' : ''; ?>>Saudi Arabia Riyals - SAR</option>
          <option value="SGD" <?php echo (isset($_POST['to']) && $_POST['to'] == 'SGD') ? 'selected="selected"' : ''; ?>>Singapore Dollars - SGD</option>
          <option value="SKK" <?php echo (isset($_POST['to']) && $_POST['to'] == 'SKK') ? 'selected="selected"' : ''; ?>>Slovakia Koruny - SKK</option>
          <option value="ZAR" <?php echo (isset($_POST['to']) && $_POST['to'] == 'ZAR') ? 'selected="selected"' : ''; ?>>South Africa Rand - ZAR</option>
          <option value="KRW" <?php echo (isset($_POST['to']) && $_POST['to'] == 'KRW') ? 'selected="selected"' : ''; ?>>South Korea Won - KRW</option>
          <option value="LKR" <?php echo (isset($_POST['to']) && $_POST['to'] == 'LKR') ? 'selected="selected"' : ''; ?>>Sri Lanka Rupees - LKR</option>
          <option value="SEK" <?php echo (isset($_POST['to']) && $_POST['to'] == 'SEK') ? 'selected="selected"' : ''; ?>>Sweden Kronor - SEK</option>
          <option value="CHF" <?php echo (isset($_POST['to']) && $_POST['to'] == 'CHF') ? 'selected="selected"' : ''; ?>>Switzerland Francs - CHF</option>
          <option value="TWD" <?php echo (isset($_POST['to']) && $_POST['to'] == 'TWD') ? 'selected="selected"' : ''; ?>>Taiwan New Dollars - TWD</option>
          <option value="THB" <?php echo (isset($_POST['to']) && $_POST['to'] == 'THB') ? 'selected="selected"' : ''; ?>>Thailand Baht - THB</option>
          <option value="TTD" <?php echo (isset($_POST['to']) && $_POST['to'] == 'TTD') ? 'selected="selected"' : ''; ?>>Trinidad and Tobago Dollars - TTD</option>
          <option value="TND" <?php echo (isset($_POST['to']) && $_POST['to'] == 'TND') ? 'selected="selected"' : ''; ?>>Tunisia Dinars - TND</option>
          <option value="TRY" <?php echo (isset($_POST['to']) && $_POST['to'] == 'TRY') ? 'selected="selected"' : ''; ?>>Turkey Lira - TRY</option>
          <option value="AED" <?php echo (isset($_POST['to']) && $_POST['to'] == 'AED') ? 'selected="selected"' : ''; ?>>United Arab Emirates Dirhams - AED</option>
          <option value="GBP" <?php echo (isset($_POST['to']) && $_POST['to'] == 'GBP') ? 'selected="selected"' : ''; ?>>United Kingdom Pounds - GBP</option>
          <option value="VEB" <?php echo (isset($_POST['to']) && $_POST['to'] == 'VEB') ? 'selected="selected"' : ''; ?>>Venezuela Bolivares - VEB</option>
          <option value="VND" <?php echo (isset($_POST['to']) && $_POST['to'] == 'VND') ? 'selected="selected"' : ''; ?>>Vietnam Dong - VND</option>
          <option value="ZMK" <?php echo (isset($_POST['to']) && $_POST['to'] == 'ZMK') ? 'selected="selected"' : ''; ?>>Zambia Kwacha - ZMK</option>

</select><br><br>

<label>Enter Amount:</label>

<input type="text" name="amount" value="1" onkeypress="javascript:return isNumber(event)" />
<br><br>
<input type="submit" name="SubmitButton" />
</form>

<br>
<br><br><br>
<script type="text/javascript" src="jquery-3.3.1.min.js"></script>
</body>
</html>