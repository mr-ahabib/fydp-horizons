<?php
include('db.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UIU Fydp Horizon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        /* Custom CSS for table design */
        .table th, .table td {
            text-align: center;
        }
        .navbar-custom {
            background-color: #42b1fa; /* Change this color to your desired navbar color */
        }
        .navbar-brand {
            text-align: center;
            width: 100%;
            color: #ffffff; /* Change this color to your desired text color */
        }
        body {
            background-color: #f8f9fa; /* Change this color to your desired background color */
        }
        .container {
            background-color: #ffffff; /* Change this color to your desired container background color */
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .d-flex{
            margin-left: 850px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark navbar-custom fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#"><h3>UIU Fydp Horizon</h3></a>

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
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                            <a class="nav-link active" aria-current="page" href="#">Publish Paper</a>
                            <a class="nav-link active" aria-current="page" href="#">Mentors</a>
                            <a class="nav-link active" aria-current="page" href="#">Notifications</a>
                            <a class="nav-link active" aria-current="page" href="#">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <br> <br><br><br><br>
    <div class="container mt-5">
        <h2 class="text-center">Members List</h2> <br><hr>
        <table class="table" id="facultyTable">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>ID</th>
                    <th>View</th>
                </tr>
            </thead>
           <?php
include('db.php');


$sid = $_SESSION['id'];


$gidQuery = "SELECT DISTINCT gid FROM `members` WHERE memid = $sid AND status = 'Accepted'";
$gidResult = mysqli_query($conn, $gidQuery);


while ($gidRow = mysqli_fetch_assoc($gidResult)) {
    $specificGid = $gidRow['gid'];

    
    $s = "SELECT * FROM `members` WHERE gid = '$specificGid' AND status = 'Accepted'";
    $result = mysqli_query($conn, $s);

    while ($row = mysqli_fetch_array($result)) {
        $gid = $row['gid'];
        $gname = $row['gname'];
        $memid = $row['memid'];
        $mname = $row['mname'];
        $topic = $row['topic'];
        $status = $row['status'];
        ?>
        <tbody>
            <tr>
                <td><?php echo $mname ?></td>
                <td><?php echo $memid ?></td>
               
                <td>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewProfileModal">View Profile</button>
                </td>
            </tr>
        </tbody>
    <?php
    }
}
?>


        </table>
    </div>

    <!-- Modal for View Profile -->
    <div class="modal fade" id="viewProfileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Faculty Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Add content for the profile here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- Add additional buttons if needed -->
                </div>
            </div>
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
