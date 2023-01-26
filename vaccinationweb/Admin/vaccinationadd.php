<?php
$conn=mysqli_connect('localhost','root','','vaccination1');
$sql1="SELECT * from hospital";
$res1=mysqli_query($conn,$sql1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  
<form action="" method="post">
<input type="text" name="name" id="" placeholder="Name">
<select name="ava" id="">
 <option value="1">Yes</option>
 <option value="0">No</option>
</select>
<select name="hospital" id="">
<?php
  if(mysqli_num_rows($res1)>0){
    while($row=mysqli_fetch_assoc($res1)){
      ?>
<option value="<?php echo $row['hid'];?>"><?php echo $row['hname'];?></option>
<?php
}}
?>
</select>
<input type="submit" name="submit" id="">
</form>
<?php
if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $ava=$_POST['ava'];
  $hospital=$_POST['hospital'];
  $sql="INSERT INTO `vaccination` VALUES (null,'$name','$hospital','$ava')";
  $res=mysqli_query($conn,$sql) or die('REGISTRATION FAILED');
  header('location:vaccination.php');
}
?>
</body>
</html>