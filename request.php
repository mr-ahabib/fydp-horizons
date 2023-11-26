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
    <link rel="stylesheet" href="request.css">

    <style>
        <style>

        .table th, .table td {
            text-align: center;
        }
        .navbar-custom {
            background-color: #42b1fa;
        }
        .navbar-brand {
            text-align: center;
            width: 100%;
            color: #ffffff; 
        }
        body {
            background-color: #f8f9fa; 
        }
        .container {
            background-color: #ffffff; 
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .d-flex{
            margin-left: 850px;
        }

        
        input#searchInput {
        height: 40px;
        margin-top: -48px;
        margin-left: 250px;
        }

    </style>
</head>

<body>
   
<nav class="navbar navbar-dark navbar-custom fixed-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#" style=" background-color: transparent;"><h3>UIU Fydp Horizon</h3></a>

        <!-- Updated search form -->
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="searchInput">
        </form>

        <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Menu</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav flex-grow-1 ps-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="homepage.php">Home</a>
                        <a class="nav-link active" aria-current="page" href="#">Publish Paper</a>
                        <a class="nav-link active" aria-current="page" href="Facultylist.php">Mentors</a>
                        <a class="nav-link active" aria-current="page" href="Note.php">Note</a>
                        <a class="nav-link active" aria-current="page" href="#">Notifications</a>
                        <a class="nav-link active" aria-current="page" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
    <br> <br><br><br><br>

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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get the table and search input element
            const facultyTable = document.getElementById('facultyTable');
            const searchInput = document.getElementById('searchInput');

            // Add event listener for the search input
            searchInput.addEventListener('input', function () {
                const searchText = searchInput.value.toLowerCase();

                // Loop through each row in the table body
                const rows = facultyTable.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
                for (let i = 0; i < rows.length; i++) {
                    const row = rows[i];
                    const facultyName = row.getElementsByTagName('td')[0].innerText.toLowerCase();
                    const facultyField = row.getElementsByTagName('td')[1].innerText.toLowerCase();

                    // Show or hide the row based on the search text in name or field
                    if (facultyName.includes(searchText) || facultyField.includes(searchText)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                }
            });
        });
    </script>
</body>
</html>