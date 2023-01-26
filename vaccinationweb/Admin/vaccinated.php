<?php
include('../db.php');
session_start();
if ($_GET['id']) {
    $id = $_GET['id'];
    $sql1 = "SELECT * from booking where id=$id";
    $res1 = mysqli_query($conn, $sql1);
    while ($row = mysqli_fetch_assoc($res1)) {
        $mid = $row['userid'];
        $childid = $row['childid'];
        $message=' Yayy! You have been vaccinated.';
        $sql2 = "INSERT into `notification` VALUES(null,$mid,'$message',current_timestamp(6))";
        $res2 = mysqli_query($conn, $sql2);
        $sql4 = "INSERT into `status` VALUES(null,1,$childid)";
        $res4 = mysqli_query($conn, $sql4);
    }
    $sql = "UPDATE booking set `vaccinated`=1 where `id`=$id";
    $res = mysqli_query($conn, $sql);
    header('location:vaccinedate.php');
} else {
    header('location:vaccinedate.php');
}
?>