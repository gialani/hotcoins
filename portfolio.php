<!doctype html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link href="css/slicknav.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
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


nav{
    width: 100%;
    height: 80px;
    background-color: lightblue;
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

#mainNav{min-height:56px;background-color:#fff}#mainNav .navbar-toggler{font-size:80%;padding:.75rem;color:#64a19d;border:1px solid #64a19d}#mainNav .navbar-toggler:focus{outline:0}#mainNav .navbar-brand{color:#161616;font-weight:700;padding:.9rem 0}#mainNav .navbar-nav .nav-item:hover{color:fade(white,80%);outline:0;background-color:transparent}#mainNav .navbar-nav .nav-item:active,#mainNav .navbar-nav .nav-item:focus{outline:0;background-color:transparent}@media (min-width:992px){#mainNav{padding-top:0;padding-bottom:0;border-bottom:none;background-color:transparent;-webkit-transition:background-color .3s ease-in-out;transition:background-color .3s ease-in-out}#mainNav .navbar-brand{padding:.5rem 0;color:rgba(255,255,255,.5)}#mainNav .nav-link{-webkit-transition:none;transition:none;padding:2rem 1.5rem;color:rgba(255,255,255,.5)}#mainNav .nav-link:hover{color:rgba(255,255,255,.75)}#mainNav .nav-link:active{color:#fff}#mainNav.navbar-shrink{background-color:#fff}#mainNav.navbar-shrink .navbar-brand{color:#161616}#mainNav.navbar-shrink .nav-link{color:#161616;padding:1.5rem 1.5rem 1.25rem;border-bottom:.25rem solid transparent}#mainNav.navbar-shrink .nav-link:hover{color:#64a19d}#mainNav.navbar-shrink .nav-link:active{color:#467370}#mainNav.navbar-shrink .nav-link.active{color:#64a19d;outline:0;border-bottom:.25rem solid #64a19d}}.masthead{position:relative;width:100%;height:auto;min-height:35rem;padding:15rem 0;background:-webkit-gradient(linear,left top,left bottom,from(rgba(22,22,22,.1)),color-stop(75%,rgba(22,22,22,.5)),to(#161616)),url(../img/bg-masthead.jpg);background:linear-gradient(to bottom,rgba(22,22,22,.1) 0,rgba(22,22,22,.5) 75%,#161616 100%),url(../img/bg-masthead.jpg);background-position:center;background-repeat:no-repeat;background-attachment:scroll;background-size:cover}.masthead h1{font-family:'Varela Round';font-size:2.5rem;line-height:2.5rem;letter-spacing:.8rem;background:-webkit-linear-gradient(rgba(255,255,255,.9),rgba(255,255,255,0));-webkit-text-fill-color:transparent;-webkit-background-clip:text}.masthead h2{max-width:20rem;font-size:1rem}@media (min-width:768px){.masthead h1{font-size:4rem;line-height:4rem}}@media (min-width:992px){.masthead{height:100vh;padding:0}.masthead h1{font-size:6.5rem;line-height:6.5rem;letter-spacing:.8rem}.masthead h2{max-width:30rem;font-size:1.25rem}}.btn{-webkit-box-shadow:0 .1875rem .1875rem 0 rgba(0,0,0,.1)!important;box-shadow:0 .1875rem .1875rem 0 rgba(0,0,0,.1)!important;padding:1.25rem 2rem;font-family:'Varela Round';font-size:80%;text-transform:uppercase;letter-spacing:.15rem;border:0}.btn-primary{background-color:#64a19d}.btn-primary:hover{background-color:#4f837f}.btn-primary:focus{background-color:#4f837f;color:#fff}.btn-primary:active{background-color:#467370!important}.about-section{padding-top:10rem;background:-webkit-gradient(linear,left top,left bottom,from(#161616),color-stop(75%,rgba(22,22,22,.9)),to(rgba(22,22,22,.8)));background:linear-gradient(to bottom,#161616 0,rgba(22,22,22,.9) 75%,rgba(22,22,22,.8) 100%)}.about-section p{margin-bottom:5rem}.projects-section{padding:10rem 0}.projects-section .featured-text{padding:2rem}@media (min-width:992px){.projects-section .featured-text{padding:0 0 0 2rem;border-left:.5rem solid #64a19d}}.projects-section .project-text{padding:3rem;font-size:90%}@media (min-width:992px){.projects-section .project-text{padding:5rem}.projects-section .project-text hr{border-color:#64a19d;border-width:.25rem;width:30%}}.signup-section{padding:10rem 0;background:-webkit-gradient(linear,left top,left bottom,from(rgba(22,22,22,.1)),color-stop(75%,rgba(22,22,22,.5)),to(#161616)),url(../img/bg-signup.jpg);background:linear-gradient(to bottom,rgba(22,22,22,.1) 0,rgba(22,22,22,.5) 75%,#161616 100%),url(../img/bg-signup.jpg);background-position:center;background-repeat:no-repeat;background-attachment:scroll;background-size:cover}.signup-section .form-inline input{-webkit-box-shadow:0 .1875rem .1875rem 0 rgba(0,0,0,.1)!important;box-shadow:0 .1875rem .1875rem 0 rgba(0,0,0,.1)!important;padding:1.25rem 2rem;height:auto;font-family:'Varela Round';font-size:80%;text-transform:uppercase;letter-spacing:.15rem;border:0}.contact-section{padding:5rem 0 0}.contact-section .card{border:0;border-bottom:.25rem solid #64a19d}.contact-section .card h4{font-size:.8rem;font-family:'Varela Round';text-transform:uppercase;letter-spacing:.15rem}.contact-section .card hr{border-color:#64a19d;border-width:.25rem;width:3rem}.contact-section .social{margin-top:5rem}.contact-section .social a{text-align:center;height:3rem;width:3rem;background:rgba(255,255,255,.1);border-radius:100%;line-height:3rem;color:rgba(255,255,255,.3)}.contact-section .social a:hover{color:rgba(255,255,255,.5)}.contact-section .social a:active{color:#fff}body{font-family:Nunito;letter-spacing:.0625em}a{color:#64a19d}a:focus,a:hover{text-decoration:none;color:#3c6360}.bg-black{background-color:#161616!important}.bg-primary{background-color:#64a19d!important}.text-primary{color:#64a19d!important}
</style>

</head>
<body>  

<nav class="navbar navbar-expand-md navbar-light fixed-top" style="background-color: #82cbff;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
     <div class="container-fluid">
     <div class="row">
     <div class="navbar-header">
        <a class="navbar-brand" href="#">
          <img src="img/Logo.JPG" alt="Logo" style="width:170px;">
        </a>
     </div>
     </div>
     </div>
     </div>
 
    <ul class="navbar-nav ml-auto">
    
      <li class="nav-item">
          <a class="nav-link" href="home.php">Home</a>
      </li>
      
      <li class="nav-item submenu dropdown">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tools</a>
              <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="charts.php" style="color: black">Currency Converter</a></li>
                  
              </ul>
      </li> 
      
      <li class="nav-item">
          <a class="nav-link" href="portfolio.php">My Portfolio</a>
      </li>
      
     </ul>
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
                <div class="project-text w-100 my-auto text-center text-lg-left">
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
















