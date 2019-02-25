<?php 

//bring user name and password from account.php to make it private
include ("account.php");

//displays errors incase there are any and the code doesn't work
ini_set('display_errors','On');
error_reporting(E_ERROR|E_WARNING|E_PARSE|E_NOTICE);

//connects to the database
$db= mysqli_connect ($hostname,$username,$password,$project);
if (mysqli_connect_errno())
{
echo "Failed To Connect To MySQL:" .mysqli_connect_error();
exit();
}

print "Successfully Connected to MySQL.<br><br><br>";

mysqli_select_db($db,$project);
//end the connect code
//*****************************************************

	// variable declaration
	$username = "";
	$errors = array(); 
	$_SESSION['success'] = "";


	//To register a new User
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}
   
   
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = SHA1($password);//encrypt the password before saving in the database
			$query = "INSERT INTO userTbl (username, password) 
					  VALUES('$username', '$password')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: login.php');
		}

	}
 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = SHA1($password);
			$query = "SELECT * FROM userTbl WHERE user_name='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) > 0) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: https://web.njit.edu/~bj93/202/index.html');// changed the file path to link
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}
 
 //LOGOUT USER
  
    

?>