<?php
 include('checkUser.php')
 ?>

<!DOCTYPE html>
<html>
<head>
<title>Create Account</title>

 <style>
 form {
 
margin: 0 auto; 
width:500px;
  
  padding: 20px;
  border: 1px solid #B0C4DE;
  background: white;
  border-radius: 12px;
}
h1{
text-align:center;
}
.button{
        font-size: 24px;
        cursor: pointer;
        background-color: lightblue;
        border-radius: 50px;
        box-shadow: 0 4px #099;
      }
.button:hover {background-color: #FF7F50}
.button:active {
        box-shadow: 0 5px #666;
        transform: translateY(5px);
        }
 /* Full-width input fields */
input[type=text], input[type=password],input[type=email] {
    width: 250px;
    padding: 12px 20px;
    margin: 0px 20;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
</style>
 
</head>
<body style="background-image:url('Pay.jpg');">
      
    <h1 style= color:red>New Account</h1>  

<h1 style= color:red>Please Fill Out the Form Below</h1>

	<form method="post" action="newAccount.php">
<center>
   User Name:
   <input type="text" name= "username"  placeholder = "Enter your user name" pattern="([A-Za-z]).{2,}" title="Name must be only letters and must be atleast 5 letters" autofocus required>
   <br><br>
   
   Password:
   <input placeholder="Enter your password" type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 5 or more characters" required>
 <br><br>
   Email:
  <input placeholder="Enter email address" type="Email" name="Email Address" pattern="[A-Za-z]{3}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 5 or more characters" required>
<br><br>
  
  <button type="submit" name="reg_user" class="button">Register</button>
 </center>
 
</form>


</script>
  </body>
</html>
