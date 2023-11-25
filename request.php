<?php
session_start(); 
include('db.php');


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RequestPage</title>
    <link rel="stylesheet" href="request.css">
</head>

<body>

    <div id="main_div">

        <div class="header">
            <a href="https://www.uiu.ac.bd/" class="logo"><img width="65px" src="uiu_logo.png"></a>
            <a href="#fydpHorizon" class="name">UIU FYDP Horizon</a>
    
            <div class="header-right">
              <a class="active" href="#home"><img width="30px" src="request.png"> Requests</a>
              <a href="#home"><img width="30px" src="mess.webp"> Messages</a>
              <a href="#home"><img width="30px" src="images.png"> Profile</a>
            </div>
        </div>


        <div class="left_div">
            <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>

            <div id="mySidenav" class="sidenav">
               <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <br><br><br><br><br><br>
                <a href="homepage.php">Home</a>
                <a href="apply.php">Application</a>
                <a href="#">Published Papers</a>
                <a href="Facultylist.php">Faculties</a>
                <a href="request.php">Requests</a>
                <a href="#">Notifications</a>
                <a href="group.php">Create Group</a>
                <br><br><br><br><br><br><br><br>
                <a href="#">Settings</a>
            </div>

            <script>
                function openNav() {
                  document.getElementById("mySidenav").style.width = "250px";
                  document.getElementById("mainDiv").style.marginLeft = "250px";
                  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
                }
                
                function closeNav() {
                  document.getElementById("mySidenav").style.width = "0";
                  document.getElementById("mainDiv").style.marginLeft= "0";
                  document.body.style.backgroundColor = "white";
                }
            </script>
        </div>



        <div class="form_div">
            <div class="square">
                
                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>ID</th>
                        <th>View</th>
                        <th>Accept</th>
                        <th>Remove</th>
                    </tr>
                    </thead>
              <tbody>
    <?php
    include('db.php');
   

    $sid = $_SESSION['id'];


    $query_check_group = "SELECT sid FROM groups WHERE sid = ?";
    $stmt_check_group = $conn->prepare($query_check_group);
    $stmt_check_group->bind_param('i', $sid);
    $stmt_check_group->execute();
    $result_check_group = $stmt_check_group->get_result();

    if ($result_check_group->num_rows > 0) {
       

        $query_group = "SELECT gid FROM members WHERE memid = ? LIMIT 1";
        $stmt_group = $conn->prepare($query_group);
        $stmt_group->bind_param('i', $sid);
        $stmt_group->execute();
        $result_group = $stmt_group->get_result();

        if ($row_group = $result_group->fetch_assoc()) {
            $group_id = $row_group['gid'];

            $query_members = "SELECT * FROM members WHERE gid = ? AND status = 'Pending'";
            $stmt_members = $conn->prepare($query_members);
            $stmt_members->bind_param('i', $group_id);
            $stmt_members->execute();
            $result_members = $stmt_members->get_result();

            if ($result_members->num_rows > 0) {
                while ($row = $result_members->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['mname'] . '</td>';
                    echo '<td>' . $row['memid'] . '</td>';
                    echo '<td><button class="button1 button1" type="button" onclick="viewMember(' . $row['memid'] . ')">View</button></td>';
                    echo '<td>';
                    echo '<form action="acceptReq.php" method="post">';
                    echo '<input type="hidden" name="memid" value="' . $row['memid'] . '">';
                    echo '<button class="button2 button1" type="submit">Accept</button>';
                    echo '</form>';
                    echo '</td>';
                    echo '<td>';
                    echo '<form action="removeReq.php" method="post" onsubmit="return confirm(\'Are you sure you want to remove this member?\');">';
                    echo '<input type="hidden" name="memid" value="' . $row['memid'] . '">';
                    echo '<button class="button3 button1" type="submit">Remove</button>';
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="5">No members found.</td></tr>';
            }
        } else {
            echo '<tr><td colspan="5">Group ID not found for the user.</td></tr>';
        }
    } else {
        echo '<tr><td colspan="5">User does not have the required permissions to view this information.</td></tr>';
    }
?>
</tbody>



    </table>



            </div>
        </div>


        



    </div>
    
</body>
</html>