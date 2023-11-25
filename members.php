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
</head>
<body>

    <div><?php include('navbar.php'); ?></div>
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
