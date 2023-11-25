<?php
include('db.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $memid = $_POST['memid'];
    $loggedin_user_id = $_SESSION['id'];

    $query_permission = "SELECT sid FROM groups WHERE sid = ? AND sid = (SELECT sid FROM members WHERE memid = ?)";
    $stmt_permission = $conn->prepare($query_permission);
    $stmt_permission->bind_param('ii', $loggedin_user_id, $memid);
    $stmt_permission->execute();
    $result_permission = $stmt_permission->get_result();

    if ($result_permission->num_rows > 0) {
      
        $query = "UPDATE members SET status = 'Accepted' WHERE memid = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $memid);

        if ($stmt->execute()) {
            
            header("Location: request.php");
            exit();
        } else {
            echo "Error accepting member.";
        }

        $stmt->close();
    } else {
        echo "Permission denied. You do not have the required permissions to accept this member.";
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>
