<?php

$conn=mysqli_connect('localhost','root','','vaccination1');
if(isset($_GET['id'])){
$id=$_GET['id'];
$sql="DELETE from `vaccination` where `id`=$id";
$res=mysqli_query($conn,$sql);
if($res){
 header("location:../vaccination.php");
}
}else{
 echo "error";
}

?>