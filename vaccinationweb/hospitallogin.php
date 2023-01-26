<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <link rel="stylesheet" href="login.css">
 <title>Document</title>
</head>
<body>
<div class="box">
		<form autocomplete="off" method="post">
			<h2>LOG IN</h2>
			<div class="inputBox">
				<input type="text" name="email" required="required">
				<span>Email</span>
				<i></i>
			</div>
			<div class="inputBox">
				<input type="password" name="password" required="required">
				<span>Password</span>
				<i></i>
			</div>
			<div class="links">
				<a href="forgot.php">Forgot Password ?</a>
				<a href="register.php">Register</a>
			</div>
			<input type="submit" value="Login" name='submit'>
		</form>
	</div>
</body>
</html>
<?php
include('db.php');
if(isset($_POST['submit'])){
$email=$_POST['email'];
$passsword=$_POST['password'];
$sql="SELECT * FROM hospital where hname='$email'";
$res=mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0){
$row=mysqli_fetch_assoc($res);
if (password_verify($passsword,$row['hpassword'])){
 session_start();
 $_SESSION['hid']=$row['hid'];
 header('location:Admin/vaccinedate.php');

}
else {
 echo "Password incorrect";
}
}
else{
 echo "invalid email";
}
}


?>