<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <link rel="stylesheet" href="register.css">
 <title>Document</title>
</head>
<body><div class="body">
	<div class="box">
		<form autocomplete="off" method="post">
			<h2>Register</h2>
			<div class="inputBox">
				<input type="text" name="name" required="required">
     <span>Username</span>
				 <i></i>
			</div>
    <div class="inputBox">
				<input type="email" name="email" required="required">
				<span>Email</span>
				<i></i>
			</div>
			<div class="inputBox">
				<input type="password" name="password" required="required">
				<span>Password</span>
				<i></i>
			</div>


			<div class="links">
				<a href="#" style="visibility:hidden;">Forgot Password ?</a>
				<a href="login.php">Login</a>
			</div>
			<input type="submit" value="Register" name='submit'>
		</form>
	</div>
</div>    
  <!-- <form action="" method="post">
  <input type="text" name="name" id=""placeholder='name'>
  <input type="email" name="email" id=""placeholder='email'>
  <input type="text" name="address" id=""placeholder='address'>
  <input type="text" name="contact" id=""placeholder='contact'>
  <input type="password" name="password" id=""placeholder='passowrd'>
  <input type="submit" value="Register" name='submit'>
  </form> -->

</body>
</html>
<?php
$conn=mysqli_connect('localhost','root','','vaccination1');
if(isset($_POST['submit'])){
$name=$_POST['name'];
$email=$_POST['email'];
$passsword=password_hash($_POST['password'],PASSWORD_DEFAULT);
$sql="INSERT INTO parents VALUES (null,'$name','$passsword','$email')";
$res=mysqli_query($conn,$sql) or die('REGISTRATION FAILED');
header('location:login.php');
}
?>