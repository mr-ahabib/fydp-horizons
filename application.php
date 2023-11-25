<?php
include('db.php');
session_start();

$sid = $_SESSION['id'];

$query = "SELECT * FROM members WHERE memid = $sid";
$result = mysqli_query($conn, $query);

if ($result && $row = mysqli_fetch_assoc($result)) {
    $gid = $row['gid'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $topic = mysqli_real_escape_string($conn, $_POST['topic']);
    $supervisor1ID = mysqli_real_escape_string($conn, $_POST['supervisorSelect1']);
    $supervisor2ID = mysqli_real_escape_string($conn, $_POST['supervisorSelect2']);
    $supervisor3ID = mysqli_real_escape_string($conn, $_POST['supervisorSelect3']);

    $insertQuery = "INSERT INTO application (`gid`, `topic`, `supervisor1ID`, `supervisor2ID`, `supervisor3ID`, `status`) VALUES ('$gid','$topic','$supervisor1ID','$supervisor2ID','$supervisor3ID','Pending')";

    if (mysqli_query($conn, $insertQuery)) {
        echo "Application submitted successfully";
        header("Location: homepage.php");
        exit(); 
    } else {
        echo "Error submitting application: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
