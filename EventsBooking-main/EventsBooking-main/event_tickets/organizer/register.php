<?php
session_start();

include("connection1.php");

$success_message = $error_message = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // something was posted
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];

    if (!empty($full_name) && !empty($phone_number) && !empty($address) && !empty($email)) {
        $query = "INSERT INTO register (full_name, email, phone_number, address) VALUES ('$full_name', '$email', '$phone_number', '$address')";
        mysqli_query($con, $query);

        // Check if the query was successful
        if (mysqli_affected_rows($con) > 0) {
            $success_message = "Registration successful!";
            $_SESSION['user_email'] = $email; // Store user email in session for use in my-registered-events page
            header("Location: my-registered-events.php");
            die();
        } else {
            $error_message = "Registration failed. Please try again.";
        }
    } else {
        $error_message = "Please enter valid information for all fields!";
    }
}
?>eEE

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Registration</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #box {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 300px;
            padding: 20px;
            text-align: center;
        }

        #box h2 {
            color: #333;
        }

        #text {
            height: 25px;
            border-radius: 5px;
            padding: 10px;
            border: 1px solid #ccc;
            width: 100%;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        #button {
            padding: 10px;
            width: 100%;
            color: white;
            background-color: #3498db;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        #button:hover {
            background-color: #2980b9;
        }

        #error {
            color: #ff3333;
            margin-top: 10px;
        }

        #login-link {
            margin-top: 15px;
            color: #3498db;
            text-decoration: none;
            display: inline-block;
        }

        #login-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

 <div id="box">
        <h2>Event Registration</h2>

        <?php if (!empty($success_message)) : ?>
            <p id="success"><?= $success_message; ?></p>
        <?php endif; ?>

        <?php if (!empty($error_message)) : ?>
            <p id="error"><?= $error_message; ?></p>
        <?php else : ?>
            <form method="post">
                <input id="text" type="text" name="full_name" placeholder="Full Name" required><br>
                <input id="text" type="email" name="email" placeholder="Email" required><br>
                <input id="text" type="tel" name="phone_number" placeholder="Phone Number" required><br>
                <input id="text" type="text" name="address" placeholder="Address" required><br>
                <input id="button" type="submit" value="Register"><br>
            </form>
        <?php endif; ?>

    </div>

</body>

</html>
