<?php
include('db.php');
session_start();
      $sid=  $_SESSION['id'] ;
      
      $name=  $_SESSION['name'] ;
$gid=$_GET['gid'];

$s = "SELECT * FROM groups WHERE id=$gid";
    $result = mysqli_query($conn, $s);

    while ($row = mysqli_fetch_array($result)) {
        $gname = $row['gname'];
        $limit = $row['limits'];
        $field = $row['field'];
       
    }


$sql="INSERT INTO `members`(`gid`, `gname`, `memid`, `mname`, `topic`, `status`) VALUES ('$gid','$gname','$sid','$name','$field','Pending')";
mysqli_query($conn, $sql);
header("location:homepage.php");




?>