<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .navbar-custom {
            background-color:  #42b1fa;
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
        .btn-primary {
            background-color: #3498db;
            border-color: #3498db;
        }
        .btn-primary:hover {
            background-color: #218db9;
            border-color: #218db9;
        }
        .btn-success {
            background-color: #2ecc71;
            border-color: #2ecc71;
        }
        .btn-success:hover {
            background-color: #28b463;
            border-color: #28b463;
        }
        .offcanvas-header{
            color: black;
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
<br><br><br><br>
    <div class="container mt-5">
        <h2 class="text-center">Admin Panel</h2> <br> <hr>

        <!-- Add Teacher Button -->
        
        <div class="text-center">
            <button class="btn btn-primary" style="width: 500px;" onclick="toggleAddTeacherForm()">Add Teacher +</button>
        </div>
        
                    

        <!-- Add Teacher Form (Initially hidden) -->
        <div id="addTeacherForm" style="display: none;">
            <h2 class="mt-4 mb-4 text-center">Add Teacher</h2>
            <form method="POST" action="tsignup.php">
                <div class="mb-3">
                    <label for="teacherName" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="teacherName" name="teacherName" required>
                </div>
                <div class="mb-3">
                    <label for="teacherEmail" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="teacherEmail" name="teacherEmail" required>
                </div>
                <div class="mb-3">
                    <label for="interestedField" class="form-label">Interested Field:</label>
                    <input type="text" class="form-control" id="interestedField" name="interestedField" required>
                </div>
                <div class="mb-3">
                    <label for="teacherPassword" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="teacherPassword" name="teacherPassword" required>
                </div>

                <div class="text-center">
                    <button type="submit"  class="btn btn-success" >Add</button>
                </div>
            </form>
        </div>

        <!-- Your admin content goes here -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>
        function toggleAddTeacherForm() {
            var addTeacherForm = document.getElementById("addTeacherForm");
            addTeacherForm.style.display = (addTeacherForm.style.display === "none") ? "block" : "none";
        }

        function addTeacher() {
            // Add your logic to collect form data and handle the addition of a teacher
            // For example, make an AJAX request to the backend API
            alert("Teacher added successfully!");
            // Optionally, you can reset the form or perform other actions
            document.getElementById("addTeacherForm").reset();
        }
    </script>
</body>
</html>
