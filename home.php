<?php
session_start();

?>
<!doctype html>
<html lang="en">
<head>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>


<style>
  
body {
  background-color: white;
}

a:link, a:visited {
  color: white;
  padding: 14px 35px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:active {
  background-color: gray;
}

footer p {
   padding: 10.5px;
   margin: 0px;
   line-height: 100%;
}

footer{
   background-color: #424558;
   position: fixed;
   bottom: 0;
   left: 0;
   right: 0;
   height: 35px;
   text-align: center;
   color: #CCC;
}


<!--

  /* Full height */
  height: 100%; 
  
  /* Center and scale the image nicely */
  background-position: fixed;
  background-repeat: no-repeat;
  background-size: 50% 100%;
}
*{
    margin: 0; 
    padding: 0;
    font-family: verdana;  
}
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
* {
  box-sizing: border-box;
}

.bg-image {
  /* The image used */
  background-image: url("bjp.JPG");
  
  /* Full height */
  height: 100%; 
  
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
} 
/* Position text in the middle of the page/image */
.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 80%;
  padding: 20px;
  text-align: center;
}

footer{
   background-color: #424558;
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    height: 35px;
    text-align: center;
    color: #CCC;
}
footer p {
    padding: 10.5px;
    margin: 0px;
    line-height: 100%;
}
  .image1
	{
		position: relative;
		top: 0;
		left: 0;
	}
  .image2
	{
		position: absolute;
		top: 60px;
		left: 80px;
	}
.dropdown {
  position: relative;
  display: inline-block;
}
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}
.dropdown:hover .dropdown-content {
  display: block;
}


-->

hr{
  border-width: 2px;
  display: block;
  border-style: inset;
}

</style>

</head>
<body>  


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a href="home.php">
     <img src="img/logo.png" alt="Logo" style="width:130px;"></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="">Tools<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="graph.html">Historical Graphs</a></li>
          <li><a href="graph_curr.php">Currency Converter</a></li>
        </ul>
      </li>
      <li><a href="paypal.php">Payout</a></li>
      <li><a href="viewportfolio.php">My portfolio</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="newAccount.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>

  
  

<div class="bg">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="img/home.jpg" alt="First slide" width="1700" height="800">
        </div>
    </div>
    <div class="carousel-caption">
       <h1>HotCoins</h1>
    </div>
</div>
</div>
  
<section>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 order-lg-2">
            <div class="p-5">
              <img class="img-fluid rounded-circle" src="img/coinhome.gif" alt="">
            </div>
          </div>
          <div class="col-lg-6 order-lg-1">
            <div class="p-5">
              <h2 class="display-4">Introduction</h2>
              <p>Take advantage of our low exchange rate and start making some money! Don't forget to check our site daily to see rate changes and they affect your portfolio.</p><br><br> <hr noshade> <br><br>
            </div>
          </div>
        </div>
      </div>
    </section>














   <!-- start sw-rss-feed code --> 
<script type="text/javascript"> 

rssfeed_url = new Array(); 
rssfeed_url[0]="https://rss.dailyfx.com/feeds/forex_market_news";  
rssfeed_frame_width="400"; 
rssfeed_frame_height="300"; 
rssfeed_scroll="on"; 
rssfeed_scroll_step="6"; 
rssfeed_scroll_bar="on"; 
rssfeed_target="_blank"; 
rssfeed_font_size="12"; 
rssfeed_font_face=""; 
rssfeed_border="on"; 
rssfeed_css_url=""; 
rssfeed_title="on"; 
rssfeed_title_name="Hotcoins Newsfeed"; 
rssfeed_title_bgcolor="#2a23ff"; 
rssfeed_title_color="#fff"; 
rssfeed_title_bgimage=""; 
rssfeed_footer="off"; 
rssfeed_footer_name="Hotcoins"; 
rssfeed_footer_bgcolor="#000"; 
rssfeed_footer_color="#000"; 
rssfeed_footer_bgimage=""; 
rssfeed_item_title_length="50"; 
rssfeed_item_title_color="#ff0000"; 
rssfeed_item_bgcolor="#ffe3a7"; 
rssfeed_item_bgimage=""; 
rssfeed_item_border_bottom="on"; 
rssfeed_item_source_icon="off"; 
rssfeed_item_date="on"; 
rssfeed_item_description="on"; 
rssfeed_item_description_length="120"; 
rssfeed_item_description_color="#000"; 
rssfeed_item_description_link_color="#000"; 
rssfeed_item_description_tag="on"; 
rssfeed_no_items="0"; 
rssfeed_cache = "f93f9aa5d64b899975004da4340d7389"; 

</script> 


<script type="text/javascript" src="//feed.surfing-waves.com/js/rss-feed.js"></script> 
<!-- The link below helps keep this service FREE, and helps other people find the SW widget. Please be cool and keep it! Thanks. --> 
<div style="color:#000 ;font-size:10px; text-align:center; width:600px;">powered by <a href="home.php">Hotcoins</a></div> <br><br><br>
<!-- end sw-rss-feed code -->



<footer>
        <p> &copy; 2019 <a style="color:#0a93a6; text-decoration:none;" href="home.php"> Divyesh Patel, Gialani To, Mayur Dudhat, Bansari Jetani </a>| Privacy Policy | Terms of Use </p>
    </footer>
    
     

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>


