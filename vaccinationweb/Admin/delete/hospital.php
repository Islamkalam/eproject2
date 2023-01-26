<?php

$conn=mysqli_connect('localhost','root','','vaccination1');
if(isset($_GET['id'])){
$id=$_GET['id'];
$sql="DELETE from hospital where `hid`=$id";
$res=mysqli_query($conn,$sql);
if($res){
 header("location:../hospital.php");
}
}else{
 echo "error";
}

?>