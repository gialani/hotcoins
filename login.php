<?php
//creates login page session
    session_start();
    echo isset($_SESSION['login']);
    if(isset($_SESSION['login'])) {
      header('LOCATION:index.php'); die();
    }
  
  include("checkUser.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login Page</title>
 
<body style="background-color:#FEA47F;">

<style>

form {
margin: 0 auto; 
width:300px;
  
  padding: 20px;
  border: 1px solid #B0C4DE;
  background: white;
  border-radius: 12px;
}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 300px;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
.header{
    color:#ff3775;
    text-align:center;
}
/* Set a style for all buttons */
button {
    text-align: center;
    background-color:#FEC47F ;
    color: #ff4677;
    padding: 14px 20px;
    margin: 8px 0;
    border: solid;
    cursor: pointer;
    width: 300px;
    font-size: 20px;
}

button:hover {
    opacity: .8;
}

</style>

</head>
<body>


	<div class="header">
		<h2>Login</h2>
	</div>
	
	<form method="post" action="login.php">
		<div class="input-group">
			<label>Username</label>
            <input type="text" placeholder="Enter Your Username" name="username" required title="Choose Anything">
		</div>
		<div class="input-group">
			<label>Password</label>
            <input type="password" placeholder="Enter Your Password" name="password" required title ="Remember Your Password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user">Login</button>
		</div>
		<p>
			Not yet a member? <a href="newAccount.php">Sign up</a>
		</p>
	</form>


</body>
</html>