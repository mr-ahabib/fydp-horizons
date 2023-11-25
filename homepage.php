<?php
session_start(); 

include('db.php'); 



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="homepage.css">
</head>

<body>
    <div id="mainDiv">

        <div id="header">
            <div class="logo">
                <a href="https://www.uiu.ac.bd/"><img width="70px" src="./img/uiu_logo.png"></a>
            </div>

            <div id="text_div">
                <div class="label"><p class="friends-loan-cloud">UIU FYDP Horizon</p></div>
            </div>


            <div id="header_icons_2">
                <div class="photo_1"> 
                    <a href="#"><img src="./img/mess.webp" alt="photo_2"></a> 
                </div>
                <div class="photo_2"> 
                    <a href="#"><img src="./img/images.png" alt="photo_2"></a> 
                </div>
            </div>
        </div>

        <script>
            window.onscroll = function() {myFunction()};
            
            var navbar = document.getElementById("header");
            var sticky = navbar.offsetTop;
            
            function myFunction() {
              if (window.pageYOffset >= sticky) {
                navbar.classList.add("sticky")
              } else {
                navbar.classList.remove("sticky");
              }
            }
            </script>


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
                <a href="members.php">Members</a>
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



        <div class="center_div1">
    <?php
    include('db.php');
    $s = "SELECT * FROM groups";
    $result = mysqli_query($conn, $s);

    while ($row = mysqli_fetch_array($result)) {
        $gname = $row['gname'];
        $limit = $row['limits'];
        $field = $row['field'];
        $des = $row['des'];
        
        $gid = $row['id'];
        $mem = "SELECT COUNT(*) AS total_members FROM members WHERE gid = $gid AND status='Accepted'";
        $mem_result = mysqli_query($conn, $mem);
        $mem_row = mysqli_fetch_array($mem_result);
        $total_members = $mem_row['total_members'];
    ?>
    <div class="squareS">
        <br>
        <br>
        <h2>Group Name: <?php echo $gname; ?></h2>
        <p>Current members: <?php echo $total_members; ?></p>
        <p>Limit: <?php echo $limit; ?></p>
        <p>Field: <?php echo $field; ?></p>
        <p>Description: <?php echo $des; ?></p>
        <button class="button" type="button" onclick="redirectToAccess('<?php echo $gid; ?>')">Access</button>

        <script>
            function redirectToAccess(gid) {
                window.location.href = 'access.php?gid=' + gid;
            }
        </script>
    </div>
    <?php
    }
    ?>
</div>


       

       

        
       <div class="profile_div">
    <?php
    include("db.php");
    
    $sid = $_SESSION['id'];
    $query = "SELECT * FROM members WHERE memid = $sid";
    $result = mysqli_query($conn, $query);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        $gid = $row['gid'];
        $groupName = $row['gname'];

        $field = $row['topic'];

        $groupMembersQuery = "SELECT COUNT(*) as totalMembers FROM members WHERE gid = $gid AND status='Accepted'";
        $groupMembersResult = mysqli_query($conn, $groupMembersQuery);

        if ($groupMembersResult && $groupMembersRow = mysqli_fetch_assoc($groupMembersResult)) {
            $totalMembers = $groupMembersRow['totalMembers'];
    ?>
            <h1>My Group</h1>
            <br>
            <h2 style="color: rgb(0, 98, 255);">Group Name: <?php echo $groupName; ?></h2>
            <p>Current members: <?php echo $totalMembers; ?></p>
            <p>Mentor's mail: xyz@gmail.com</p>
            <p>Field: <?php echo $field; ?></p>
            <p>Status: .....</p>
        </div>
    <?php
        }
    }
    ?>


    </div>
</body>


</html>