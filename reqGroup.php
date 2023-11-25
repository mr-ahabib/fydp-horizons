<?php
include('db.php');
$id = $_GET['id'];
$gid = $_GET['gid'];
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
                             <a class="nav-link active" aria-current="page" href="Admin.php">Home</a><hr>
                            <a class="nav-link active" aria-current="page" href="#">Add Mentor</a><hr>
                            <a class="nav-link active" aria-current="page" href="mentors.php">All Mentors</a><hr>
                            <a class="nav-link active" aria-current="page" href="applicants.php">Requests</a><hr>
                            <a class="nav-link active" aria-current="page" href="#">All Groups</a><hr>
                           
                      
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <br> <br><br><br><br>
    <div class="container mt-5">
    <h2 class="text-center">Faculty List</h2> <br><hr>
    <table class="table" id="facultyTable">
        <thead>
            <tr>
                <th>Faculty Name for Supervisor 1</th>
                <th>Faculty Name for Supervisor 2</th>
                <th>Faculty Name for Supervisor 3</th>
            </tr>
        </thead>
        <?php
        include('db.php');
        $s = "SELECT * FROM `application`";
        $result = mysqli_query($conn, $s);
        while ($row = mysqli_fetch_array($result)) {
            $supervisor1ID = $row['supervisor1ID'];
            $supervisor2ID = $row['supervisor2ID'];
            $supervisor3ID = $row['supervisor3ID'];

            $facultyQuery1 = "SELECT name FROM `faculty` WHERE id = $supervisor1ID";
            $facultyQuery2 = "SELECT name FROM `faculty` WHERE id = $supervisor2ID";
            $facultyQuery3 = "SELECT name FROM `faculty` WHERE id = $supervisor3ID";

            $result1 = mysqli_query($conn, $facultyQuery1);
            $result2 = mysqli_query($conn, $facultyQuery2);
            $result3 = mysqli_query($conn, $facultyQuery3);

           
            $facultyName1 = ($result1 && $faculty1 = mysqli_fetch_assoc($result1)) ? $faculty1['name'] : "N/A";
            $facultyName2 = ($result2 && $faculty2 = mysqli_fetch_assoc($result2)) ? $faculty2['name'] : "N/A";
            $facultyName3 = ($result3 && $faculty3 = mysqli_fetch_assoc($result3)) ? $faculty3['name'] : "N/A";
        ?>
        <tbody>
            <tr>
                <td><?php echo $facultyName1 ?></td>
                <td><?php echo $facultyName2 ?></td>
                <td><?php echo $facultyName3 ?></td>
            </tr>

        </tbody>
        <?php } ?>
    </table>
</div>



    <div class="container mt-5">
    <h2 class="text-center">Student List</h2> <br><hr>
    <table class="table" id="facultyTable">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Student ID</th>
                <th>View Profile</th>
            </tr>
        </thead>
        <?php
   
    $gid = $_GET['gid'];

   
    include('db.php');


    $studentQuery = "SELECT * FROM `members` WHERE gid = $gid AND status='Accepted'";
    $studentResult = mysqli_query($conn, $studentQuery);

    
    if ($studentResult) {
        while ($studentRow = mysqli_fetch_assoc($studentResult)) {
            $studentName = $studentRow['mname'];
            $studentID = $studentRow['memid'];
          
            ?>
            <tbody>
                <tr>
                    <td><?php echo $studentName ?></td>
                    <td><?php echo $studentID ?></td>
                    <td>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewProfileModal">View Profile</button>
                    </td>
                </tr>
            </tbody>
            <?php
        }
    } else {
      
        ?>
        <tbody>
            <tr>
                <td colspan="3">No members found for the specified group.</td>
            </tr>
        </tbody>
        <?php
    }
?>

    </table>
</div>
<br>
<br>



<div class="containers">
    <div class="center-content">
        <form action="assign.php" method="post">
            <label for="supervisorSelect">Choose Supervisor:</label>
            <select id="supervisorSelect" name="supervisorSelect" class="supervisor-select">
                <option value="choose">Choose Supervisor</option>

                <?php
                include('db.php');
                $s = "SELECT * FROM `application` WHERE gid = $gid";
                $result = mysqli_query($conn, $s);

                while ($row = mysqli_fetch_array($result)) {
                    $supervisor1ID = $row['supervisor1ID'];
                    $supervisor2ID = $row['supervisor2ID'];
                    $supervisor3ID = $row['supervisor3ID'];

                    // Get faculty names for each supervisor
                    $facultyQuery1 = "SELECT id, name FROM `faculty` WHERE id = $supervisor1ID";
                    $facultyQuery2 = "SELECT id, name FROM `faculty` WHERE id = $supervisor2ID";
                    $facultyQuery3 = "SELECT id, name FROM `faculty` WHERE id = $supervisor3ID";

                    $result1 = mysqli_query($conn, $facultyQuery1);
                    $result2 = mysqli_query($conn, $facultyQuery2);
                    $result3 = mysqli_query($conn, $facultyQuery3);

                    // Fetch faculty names
                    $facultyName1 = ($result1 && $faculty1 = mysqli_fetch_assoc($result1)) ? $faculty1['name'] : "N/A";
                    $facultyName2 = ($result2 && $faculty2 = mysqli_fetch_assoc($result2)) ? $faculty2['name'] : "N/A";
                    $facultyName3 = ($result3 && $faculty3 = mysqli_fetch_assoc($result3)) ? $faculty3['name'] : "N/A";

                    // Display faculty names in the dropdown options
                    echo "<option value='$facultyName1|$supervisor1ID'>$facultyName1</option>";
                    echo "<option value='$facultyName2|$supervisor2ID'>$facultyName2</option>";
                    echo "<option value='$facultyName3|$supervisor3ID'>$facultyName3</option>";
                }
                ?>
            </select>

            <input type="text" id="selectedSupervisor" name="selectedSupervisor" readonly>

            <input type="hidden" name="gid" value="<?php echo $gid; ?>">

            <button type="submit" class="btn btn-primary">Assign</button>
        </form>
    </div>
</div>



<style>
    .containers {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 10vh; 
    }

    .center-content {
        text-align: center;
    }
</style>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var supervisorSelect = document.getElementById("supervisorSelect");
        var selectedSupervisor = document.getElementById("selectedSupervisor");

        supervisorSelect.addEventListener("change", function () {
            // Set the selected faculty name and id to the input field
            var selectedOption = supervisorSelect.options[supervisorSelect.selectedIndex];
            var selectedValues = selectedOption.value.split('|');
            selectedSupervisor.value = selectedValues[0];
        });
    });
</script>




    <!-- Modal for View Profile -->
    <div class="modal fade" id="viewProfileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    
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
