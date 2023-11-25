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
    <link rel="stylesheet" href="./Styles/homepage.css">
    
</head>
<body>
    
   <div>
    <?php include('navbar.php'); ?>
   </div>
    <br> <br><br><br><br>

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

                <div style="margin-left: 300px; margin-top: 50px; margin-bottom: 50px;">
                    <input type="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>


</body>

</html>
