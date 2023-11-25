<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gid = mysqli_real_escape_string($conn, $_POST['gid']);
    $supervisorSelect = mysqli_real_escape_string($conn, $_POST['supervisorSelect']);
    list($supervisorName, $supervisorID) = explode('|', $supervisorSelect);

    // Insert into assign table
    $insertQuery = "INSERT INTO assign (gid, supervisor, supervisorid, status) VALUES ('$gid', '$supervisorName', '$supervisorID', 'Accepted')";

    if (mysqli_query($conn, $insertQuery)) {
        echo "Assignment successful";
        // Redirect to applicants.php
        header("Location: applicants.php");
        exit();
    } else {
        echo "Error assigning supervisor: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}

mysqli_close($conn);
?>
