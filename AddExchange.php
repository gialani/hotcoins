<?php

session_start();
?>
 
<!DOCTYPE html>
<html>
<head>
<style>
body {background-color: powderblue;}
h1   {color: blue;}
p    {color: red;}


.refreshed{ text-align: center; font-size: 10pt }
.btn{background-color: firebrick; color:white; }


#portfolio{
	margin: auto;
}

#panel {
margin: 0 auto; 
width:80%;
  
  padding: 20px;
  border: 1px solid #B0C4DE;
  background: white;
  border-radius: 12px;
}

.slider:hover{	opacity: 1;	}

.slider{ width:60%; 	}




</style>
</head>

<body>
<div id="panel">
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors' , 1);



include ("functions.php") ;


$db = connectDB();




$username = $_SESSION["username"]; 
$curr_bal = $_SESSION["currbal"];
$userid= $_SESSION["userid"];

$OUT = "";

			$OUT .= "<br> Hello, $username!";
			$OUT .=  "<br> Your current balance in USD: $$curr_bal.<br>";
	

print $OUT;



$userid = $_SESSION["userid"];
print  "User ID: $userid";


print "<form action='RabbitMQClient.php' target='_self'>
<div><button type='submit' name = 'type' value = 'Portfolio'>Go back to portfolio</button></div>
</form>";

if ($curr_bal <=0) {
                print "You do not have any money.";
        }		
else{
			


print "<h2>ADD EXCHANGE</h2>";





$currencies= array(
  "AED"=> "United Arab Emirates Dirham",
  "AFN"=> "Afghan Afghani",
  "ALL"=> "Albanian Lek",
  "AMD"=> "Armenian Dram",
  "ANG"=> "Netherlands Antillean Guilder",
  "AOA"=> "Angolan Kwanza",
  "ARS"=> "Argentine Peso",
  "AUD"=> "Australian Dollar",
  "AWG"=> "Aruban Florin",
  "AZN"=> "Azerbaijani Manat",
  "BAM"=> "Bosnia-Herzegovina Convertible Mark",
  "BBD"=> "Barbadian Dollar",
  "BDT"=> "Bangladeshi Taka",
  "BGN"=> "Bulgarian Lev",
  "BHD"=> "Bahraini Dinar",
  "BIF"=> "Burundian Franc",
  "BMD"=> "Bermudan Dollar",
  "BND"=> "Brunei Dollar",
  "BOB"=> "Bolivian Boliviano",
  "BRL"=> "Brazilian Real",
  "BSD"=> "Bahamian Dollar",
  "BTC"=> "Bitcoin",
  "BTN"=> "Bhutanese Ngultrum",
  "BWP"=> "Botswanan Pula",
  "BYN"=> "Belarusian Ruble",
  "BZD"=> "Belize Dollar",
  "CAD"=> "Canadian Dollar",
  "CDF"=> "Congolese Franc",
  "CHF"=> "Swiss Franc",
  "CLF"=> "Chilean Unit of Account (UF)",
  "CLP"=> "Chilean Peso",
  "CNH"=> "Chinese Yuan (Offshore)",
  "CNY"=> "Chinese Yuan",
  "COP"=> "Colombian Peso",
  "CRC"=> "Costa Rican Colón",
  "CUC"=> "Cuban Convertible Peso",
  "CUP"=> "Cuban Peso",
  "CVE"=> "Cape Verdean Escudo",
  "CZK"=> "Czech Republic Koruna",
  "DJF"=> "Djiboutian Franc",
  "DKK"=> "Danish Krone",
  "DOP"=> "Dominican Peso",
  "DZD"=> "Algerian Dinar",
  "EGP"=> "Egyptian Pound",
  "ERN"=> "Eritrean Nakfa",
  "ETB"=> "Ethiopian Birr",
  "EUR"=> "Euro",
  "FJD"=> "Fijian Dollar",
  "FKP"=> "Falkland Islands Pound",
  "GBP"=> "British Pound Sterling",
  "GEL"=> "Georgian Lari",
  "GGP"=> "Guernsey Pound",
  "GHS"=> "Ghanaian Cedi",
  "GIP"=> "Gibraltar Pound",
  "GMD"=> "Gambian Dalasi",
  "GNF"=> "Guinean Franc",
  "GTQ"=> "Guatemalan Quetzal",
  "GYD"=> "Guyanaese Dollar",
  "HKD"=> "Hong Kong Dollar",
  "HNL"=> "Honduran Lempira",
  "HRK"=> "Croatian Kuna",
  "HTG"=> "Haitian Gourde",
  "HUF"=> "Hungarian Forint",
  "IDR"=> "Indonesian Rupiah",
  "ILS"=> "Israeli New Sheqel",
  "IMP"=> "Manx pound",
  "INR"=> "Indian Rupee",
  "IQD"=> "Iraqi Dinar",
  "IRR"=> "Iranian Rial",
  "ISK"=> "Icelandic Króna",
  "JEP"=> "Jersey Pound",
  "JMD"=> "Jamaican Dollar",
  "JOD"=> "Jordanian Dinar",
  "JPY"=> "Japanese Yen",
  "KES"=> "Kenyan Shilling",
  "KGS"=> "Kyrgystani Som",
  "KHR"=> "Cambodian Riel",
  "KMF"=> "Comorian Franc",
  "KPW"=> "North Korean Won",
  "KRW"=> "South Korean Won",
  "KWD"=> "Kuwaiti Dinar",
  "KYD"=> "Cayman Islands Dollar",
  "KZT"=> "Kazakhstani Tenge",
  "LAK"=> "Laotian Kip",
  "LBP"=> "Lebanese Pound",
  "LKR"=> "Sri Lankan Rupee",
  "LRD"=> "Liberian Dollar",
  "LSL"=> "Lesotho Loti",
  "LYD"=> "Libyan Dinar",
  "MAD"=> "Moroccan Dirham",
  "MDL"=> "Moldovan Leu",
  "MGA"=> "Malagasy Ariary",
  "MKD"=> "Macedonian Denar",
  "MMK"=> "Myanma Kyat",
  "MNT"=> "Mongolian Tugrik",
  "MOP"=> "Macanese Pataca",
  "MRO"=> "Mauritanian Ouguiya (pre-2018)",
  "MRU"=> "Mauritanian Ouguiya",
  "MUR"=> "Mauritian Rupee",
  "MVR"=> "Maldivian Rufiyaa",
  "MWK"=> "Malawian Kwacha",
  "MXN"=> "Mexican Peso",
  "MYR"=> "Malaysian Ringgit",
  "MZN"=> "Mozambican Metical",
  "NAD"=> "Namibian Dollar",
  "NGN"=> "Nigerian Naira",
  "NIO"=> "Nicaraguan Córdoba",
  "NOK"=> "Norwegian Krone",
  "NPR"=> "Nepalese Rupee",
  "NZD"=> "New Zealand Dollar",
  "OMR"=> "Omani Rial",
  "PAB"=> "Panamanian Balboa",
  "PEN"=> "Peruvian Nuevo Sol",
  "PGK"=> "Papua New Guinean Kina",
  "PHP"=> "Philippine Peso",
  "PKR"=> "Pakistani Rupee",
  "PLN"=> "Polish Zloty",
  "PYG"=> "Paraguayan Guarani",
  "QAR"=> "Qatari Rial",
  "RON"=> "Romanian Leu",
  "RSD"=> "Serbian Dinar",
  "RUB"=> "Russian Ruble",
  "RWF"=> "Rwandan Franc",
  "SAR"=> "Saudi Riyal",
  "SBD"=> "Solomon Islands Dollar",
  "SCR"=> "Seychellois Rupee",
  "SDG"=> "Sudanese Pound",
  "SEK"=> "Swedish Krona",
  "SGD"=> "Singapore Dollar",
  "SHP"=> "Saint Helena Pound",
  "SLL"=> "Sierra Leonean Leone",
  "SOS"=> "Somali Shilling",
  "SRD"=> "Surinamese Dollar",
  "SSP"=> "South Sudanese Pound",
  "STD"=> "São Tomé and Príncipe Dobra (pre-2018)",
  "STN"=> "São Tomé and Príncipe Dobra",
  "SVC"=> "Salvadoran Colón",
  "SYP"=> "Syrian Pound",
  "SZL"=> "Swazi Lilangeni",
  "THB"=> "Thai Baht",
  "TJS"=> "Tajikistani Somoni",
  "TMT"=> "Turkmenistani Manat",
  "TND"=> "Tunisian Dinar",
  "TOP"=> "Tongan Pa'anga",
  "TRY"=> "Turkish Lira",
  "TTD"=> "Trinidad and Tobago Dollar",
  "TWD"=> "New Taiwan Dollar",
  "TZS"=> "Tanzanian Shilling",
  "UAH"=> "Ukrainian Hryvnia",
  "UGX"=> "Ugandan Shilling",
  "USD"=> "United States Dollar",
  "UYU"=> "Uruguayan Peso",
  "UZS"=> "Uzbekistan Som",
  "VEF"=> "Venezuelan Bolívar Fuerte (Old)",
  "VES"=> "Venezuelan Bolívar Soberano",
  "VND"=> "Vietnamese Dong",
  "VUV"=> "Vanuatu Vatu",
  "WST"=> "Samoan Tala",
  "XAF"=> "CFA Franc BEAC",
  "XAG"=> "Silver Ounce",
  "XAU"=> "Gold Ounce",
  "XCD"=> "East Caribbean Dollar",
  "XDR"=> "Special Drawing Rights",
  "XOF"=> "CFA Franc BCEAO",
  "XPD"=> "Palladium Ounce",
  "XPF"=> "CFP Franc",
  "XPT"=> "Platinum Ounce",
  "YER"=> "Yemeni Rial",
  "ZAR"=> "South African Rand",
  "ZMW"=> "Zambian Kwacha",
  "ZWL"=> "Zimbabwean Dollar"
);


print "<form method='post'>
Select currency to buy with USD: <select name='currencies' action='post' id='curr' onChange= 'document.getElementById('selected').innerHTML = this.value'><option value = ''>Currency</option>";


foreach($currencies as $key => $value){
	//echo "$key - $value";
	print "<option value=$key> $key - $value</option>";
}
print "</select>";

//assigns html select value to php variable and echo it to verify
//print "<br>Current rate: <span id = 'selected'> </span>";







print "<br><br>Select amount in USD: <br><input type='range' min='0' max= $curr_bal class= 'slider' name = 'a' id='myrange' step='.01' value = '0'>$<span id='amount'></span>";


print "<br><button type= 'submit'> Calculate Total - <span id= 'selected'> </button></form>"; 
print "<form class = 'wrapper' action = 'RabbitMQClient.php'>";
																																					
if(isset($_POST['currencies'])){
		if($_POST['currencies'] =="" and $_POST['a'] ==0){
			print "<br>Please select a currency and amount.<br>";
		}
		elseif($_POST['currencies'] !="" and $_POST['a'] ==0){
			print "Please select an amount.<br>";}
		elseif($_POST['currencies'] !="" and $_POST['a'] >0){
			$c = $_POST['currencies'];
			$a = $_POST['a'];
			
		$q = "select ratePerUSD from rates where ISO='$c'";
		($t = mysqli_query ( $db  , $q))  or die (mysqli_error($db));

		while ( $r = mysqli_fetch_array($t, MYSQLI_ASSOC))
			{
					
					$_SESSION['Rate'] = $r['ratePerUSD'];
					
			}
		
		$rate =  $_SESSION['Rate'];
		$_SESSION['a']= $a;
		$_SESSION['c']= $c;
		
		print "<br>Current Rate: $rate";
		
		$total = $rate * $a;
		$_SESSION['toCurrAmt']= $total;
		print "<br>$a USD = $total $c";

		}else
	
			print "Please select a currency<br>";

}













}

?>
<script>
var slider = document.getElementById("myrange");
var output = document.getElementById("amount");
output.innerHTML = slider.value;

slider.oninput = function(){ output.innerHTML = this.value; }

</script>


<br><button type="submit" class="btn" name="type" value="Add">SUBMIT</button>
</form>









</div>
</body>
</html> 


