<?php
session_start(); 

include('db.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UIU Fydp Horizon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./Styles/apply.css">
    
</head>
<body>
    
   <div>
    <?php include('navbar.php'); ?>
   </div>
    <br> <br><br><br><br>

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