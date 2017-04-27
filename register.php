<?php
session_start();
// connect to database
$db = mysql_connect("localhost","root","","authentication");
if(isset($_POST['register_btn'])){
	session_start();
	$username = mysql_real_escape_string($_POST['username']);
	$email = mysql_real_escape_string($_POST['email']);
	$password = mysql_real_escape_string($_POST['password']);
	$password2 = mysql_real_escape_string($_POST['password2']);
   if($password == $password2){
   	// create user
 // hash password before storing it , for security purposes
   	   	$password = md5($password);

   	$sql ="INSERT INTO users(username,email,password) VALUES('$username'
   	,'$email','$password')  ";
   	mysql_query($db,$sql);
   	   	$_SESSION['message']= "You are now loged in";
   	  	$_SESSION['username']= $username;
   	  	// redirect to home page
   	  	header("location : home.php");
   }else{
   	// failed
   	$_SESSION['message']= "the two passwords are not matched";
  }
 }
?>





<!DOCTYPE html>
<html>
<head>
	<title>Register and login ,php mysql</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
	<h1>Register and login ,php mysql</h1>
</div>
<form method="post" action="register.php">
<table>
	<tr>
		<td>username</td>
		<td><input type="text" name="username" class="textInput"></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><input type="email" name="email" class="textInput"></td>
	</tr>
	<tr>
		<td>password</td>
		<td><input type="password" name="password" class="textInput"></td>
	</tr>
	<tr>
		<td>password again</td>
		<td><input type="password" name="password2" class="textInput"></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" name="register_btn" value="Register"></td>
	</tr>
</table>
</form>
</body>
</html>