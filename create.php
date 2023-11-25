<?php
include('db.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $gname = $_POST['gname'];
    $limit = $_POST['limits'];
    $field = $_POST['field'];
    $des = $_POST['des'];
    $sid = $_SESSION['id'];

    
    $checkGroupQuery = "SELECT * FROM `groups` WHERE `sid` = '$sid'";
    $checkGroupResult = mysqli_query($conn, $checkGroupQuery);

    if (mysqli_num_rows($checkGroupResult) > 0) {
        echo "<script>alert('You have already created a group.');window.location.href='group.php';</script>";
         
    } else {
        
        $sql_groups = "INSERT INTO `groups`(`sid`, `gname`, `limits`, `field`, `des`) VALUES ('$sid','$gname','$limit','$field','$des')";
        $result_groups = mysqli_query($conn, $sql_groups);

        if ($result_groups) {
            $gid = mysqli_insert_id($conn);

            $memid = $_SESSION['id'];
            $name = $_SESSION['name'];
            $sql_member = "INSERT INTO `members`(`gid`, `gname`, `memid`, `mname`, `topic`,`status`) VALUES ('$gid', '$gname', '$memid', '$name', '$field','Accepted')";
            $result_member = mysqli_query($conn, $sql_member);

            if ($result_member) {
                header("Location: homepage.php");
                exit();
            } else {
                echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
            }
        } else {
            echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
        }
    }
}
?>
