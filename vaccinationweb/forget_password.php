<?php
$conn = mysqli_connect('localhost', 'root', '', 'vaccination1');
session_start();
echo $_SESSION['reset_id'];
if (isset($_POST['submit'])) {
    $pass = $_POST['pass'];
    $password = $_POST['password'];
    $id = $_SESSION['reset_id'];
    if ($pass == $password) {
        $sql = "UPDATE parents set `password`='$pass' where `p-id`= $id";
        $res = mysqli_query($conn, $sql);
        unset($_SESSION['reset_id']);
        unset($_SESSION['reset_code']);
        header('location:login.php');
    }
}


?>


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
            <h2>NEW PASSWORD</h2>
            <div class="inputBox">
                <input type="text" name="pass" required="required">
                <span>Password</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" name="password" required="required">
                <span>Re-enter Password</span>
                <i></i>
            </div>

            <input type="submit" value="Login" name='submit'>
        </form>
    </div>
    <!-- <form action="" method="post">
  <input type="email" name="email" id=""placeholder='email'>
  <input type="password" name="password" id=""placeholder='passowrd'>
  <input type="submit" value="login" name='submit'>
  </form> -->

</body>

</html>