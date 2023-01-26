<?php
include('../db.php');
session_start();
if ($_GET['id']) {
    $id = $_GET['id'];
    $sql1 = "SELECT * from booking where id=$id";
    $res1 = mysqli_query($conn, $sql1);
    while ($row = mysqli_fetch_assoc($res1)) {
        $mid = $row['userid'];
        $message='Your application has been accepted please come tomorrow and get vaccinated.';
        $sql2 = "INSERT into `notification` VALUES(null,$mid,'$message',current_timestamp(6))";
        $res2 = mysqli_query($conn, $sql2);
    }
    $sql = "UPDATE booking set `bookingkey`=1 where `id`=$id";
    $res = mysqli_query($conn, $sql);
    header('location:request.php');
} else {
    header('location:request.php');
}
?>