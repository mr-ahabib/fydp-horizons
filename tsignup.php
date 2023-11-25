<?php

include('db.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {


	$name=$_POST['teacherName'];
	$email=$_POST['teacherEmail'];
	$field=$_POST['interestedField'];
	$password=md5($_POST['teacherPassword']);

	$sql = "INSERT INTO `faculty`(`name`, `email`, `field`, `password`) VALUES (?,?,?,?)";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("ssss", $name, $email, $field, $password);
	$stmt->execute();
	
	echo "<script>alert('Registration successful.');</script>";
	if ($stmt->affected_rows > 0) {
        // Teacher added successfully
        echo "<script>
                var popup = document.createElement('div');
                popup.innerHTML = '<div style=\"background-color: #4CAF50; color: white; padding: 16px; text-align: center;\">Teacher added successfully</div>';
                document.body.appendChild(popup);
                setTimeout(function() {
                    document.body.removeChild(popup);
                    window.location.href = 'Admin.php';
                }, 2000);
              </script>";
    } else {
        // Error adding teacher
        echo "<script>
                var popup = document.createElement('div');
                popup.innerHTML = '<div style=\"background-color: #f44336; color: white; padding: 16px; text-align: center;\">Error: " . $stmt->error . "</div>';
                document.body.appendChild(popup);
                setTimeout(function() {
                    document.body.removeChild(popup);
                }, 2000);
              </script>";
    }

   

	 header("Location: Admin.php");
}
 $stmt->close();
 $conn->close();



?>