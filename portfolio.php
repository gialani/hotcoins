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
.bg-image {
  /* The image used */
  
  
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
<!--
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
-->
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
          <li><a href="">Historical Graphs</a></li>
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
  
  
  <section id="about" class="about-section text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2 class="text-white mb-4">Portfolio</h2>
            <p class="text-white-50">Take a look at your..... Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</p>
          </div>
        </div>
        <img src="img/moneyportfolio.gif" class="img-fluid" alt="" style="width:300px;">
      </div>
      <div> <br>
        <a class="nav-link" href="addexchange.php">Add Exchange</a>
        <a class="nav-link" href="trade.php">Trade</a>
      </div>
       <br>
    </section>


    <section id="projects" class="projects-section bg-light">
      <div class="container">
      
        <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
          <div class="col-lg-6">
            <img class="img-fluid" src="img/exchangeportfolio.gif" alt="">
          </div>
          <div class="col-lg-6">
            <div class="bg-black text-center h-100 project">
              <div class="d-flex h-100">
                <div class="project-text w-180 my-auto text-center text-lg-left">
                  <h4 class="text-white">Exchanges</h4>
                  <p class="mb-0 text-white-50"> USD --> INR  <br> USD --> CAD  <br> USD --> EUR </p>
		
                  <hr class="d-none d-lg-block mb-0 ml-0">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row justify-content-center no-gutters">
          <div class="col-lg-6">
            <img class="img-fluid" src="img/bankportfolio.jpg" alt="" style="width:600px">
          </div>
          <div class="col-lg-6 order-lg-first">
            <div class="bg-black text-center h-100 project">
              <div class="d-flex h-100">
                <div class="project-text w-100 my-auto text-center text-lg-right">
                  <h4 class="text-white">Balance</h4>
                  <p class="mb-0 text-white-50">You currently have $100 left in your account.</p>
                  <hr class="d-none d-lg-block mb-0 mr-0">
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section> 
    
    

<footer>
        <p>© 2018<a style="color:#0a93a6; text-decoration:none;" href="index.html"> Bansari Jetani </a>| Privacy Policy | Terms of Use </p>
    </footer>
    
     

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>


