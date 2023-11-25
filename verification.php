<?php
session_start(); // Start the session

include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $verificationCode = implode("", $_POST["verification_code"]); // Combine array elements into a string

    $stmt = $conn->prepare("SELECT `u_id`, `name`, `email` FROM `signup` WHERE `u_id` = ? AND `verification_code` = ?");
    $stmt->bind_param("si", $id, $verificationCode); // Use 'si' for string and integer
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Verification code is correct, set session variables
        $data = $result->fetch_assoc();
        $_SESSION['id'] = $data['u_id'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['name'] = $data['name'];

        // Update the user's status (optional)
        $updateStmt = $conn->prepare("UPDATE `signup` SET `verification_code` = NULL WHERE `u_id` = ?");
        $updateStmt->bind_param("s", $id);
        $updateStmt->execute();
        $updateStmt->close();

        // Redirect to homepage.php
        header("Location: homepage.php");
        exit();
    } else {
        // Incorrect verification code, display an error message or redirect to an error page
        echo "<script>alert('Incorrect verification code.');</script>";
        // You might want to add more error handling or redirection here.
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        label {
            font-size: 18px;
            margin-bottom: 10px;
            display: block;
        }

        input[type="text"] {
            width: 40px;
            height: 40px;
            font-size: 18px;
            text-align: center;
            margin: 0 5px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 15px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            font-size: 18px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form method="post" action="verification.php">
        <h2>Please check your email for the verification code.</h2>
        <label for="verification_code">Enter Verification Code:</label>
        <div>
            <?php
            for ($i = 1; $i <= 6; $i++) {
                echo "<input type='text' name='verification_code[]' id='digit{$i}' maxlength='1' required oninput='moveCursor(this, digit" . ($i + 1) . ")'>";
            }
            ?>
        </div>
        <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
        <input type="submit" value="Verify">
    </form>

    <script>
        function moveCursor(input, nextInput) {
            if (input.value.length === input.maxLength) {
                nextInput.focus();
            }
        }
    </script>
</body>
</html>
