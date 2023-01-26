<?php
include('../db.php');
session_start();
if ($_GET['id']) {
    $id = $_GET['id'];
    $sql1 = "SELECT c.cname,c.cnic,d.vsid,d.userid,d.cfkid,h.hname,v.name FROM vaccination_status d INNER JOIN childs c ON d.cfkid=c.id INNER JOIN hospital h ON d.chfkid=h.hid INNER JOIN vaccination v ON d.vfkid=v.id where vsid=$id";
    $res1 = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($res1)) {
        while ($row = mysqli_fetch_assoc($res1)) {
            $name = $row['cname'];
            $cnic = $row['cnic'];
            $hospital = $row['hname'];
            $vaccine = $row['name'];
            $userid = $row['userid'];
            $childid = $row['cfkid'];
            $sql = "INSERT INTO booking VALUES (null,'$name','$cnic','$hospital','$vaccine',0,$userid,0,$childid)";
            $res = mysqli_query($conn, $sql) or die('REGISTRATION FAILED');
        }
    }
    $sql = "UPDATE vaccination_status set `statuskey`=1 where `vsid`=$id";
    $res = mysqli_query($conn, $sql);
    
    header('location:appointment.php');
} else {
    header('location:appointment.php');
}
?>