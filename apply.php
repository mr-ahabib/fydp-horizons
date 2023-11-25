<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="./Styles/apply.css">
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
                <a href="apply.php">Apply</a>
                <a href="#">Published Papers</a>
                <a href="Facultylist.php">Faculties</a>
                <a href="#">Mentors</a>
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
            <h2>Registration for FYDP-I/FYDP-II/FYDP-III</h2>

            <form action="application.php" method="post">
                <div>
                    <label for="fydpTopic">Your FYDP Topic Name:</label>
                    <input type="text" id="topic" name="topic" required>
                </div>

                <div>
                    <label for="supervisorSelect1">Choose Supervisor 1:</label>
                    <?php
                    include('db.php');

                    $query = "SELECT id, name FROM faculty";
                    $result = mysqli_query($conn, $query);

                    if ($result) {
                        echo '<select id="supervisorSelect1" name="supervisorSelect1" class="supervisor-select">';
                        echo '<option value="choose">Choose Supervisor</option>';

                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $name = $row['name'];
                            echo "<option value='$id'>$id. $name</option>";
                        }

                        echo '</select>';
                    } else {
                        echo "Error fetching faculty data: " . mysqli_error($conn);
                    }

                    mysqli_close($conn);
                    ?>
                </div>

                <div>
                    <label for="supervisorSelect2">Choose Supervisor 2:</label>
                    <?php
                    include('db.php');

                    $query = "SELECT id, name FROM faculty";
                    $result = mysqli_query($conn, $query);

                    if ($result) {
                        echo '<select id="supervisorSelect2" name="supervisorSelect2" class="supervisor-select">';
                        echo '<option value="choose">Choose Supervisor</option>';

                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $name = $row['name'];
                            echo "<option value='$id'>$id. $name</option>";
                        }

                        echo '</select>';
                    } else {
                        echo "Error fetching faculty data: " . mysqli_error($conn);
                    }

                    mysqli_close($conn);
                    ?>
                </div>

                <div>
                    <label for="supervisorSelect3">Choose Supervisor 3:</label>
                    <?php
                    include('db.php');

                    $query = "SELECT id, name FROM faculty";
                    $result = mysqli_query($conn, $query);

                    if ($result) {
                        echo '<select id="supervisorSelect3" name="supervisorSelect3" class="supervisor-select">';
                        echo '<option value="choose">Choose Supervisor</option>';

                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $name = $row['name'];
                            echo "<option value='$id'>$id. $name</option>";
                        }

                        echo '</select>';
                    } else {
                        echo "Error fetching faculty data: " . mysqli_error($conn);
                    }

                    mysqli_close($conn);
                    ?>
                </div>

                <div style="margin-left: 850px; margin-top: 50px;">
                    <input type="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
</body>

</html>
