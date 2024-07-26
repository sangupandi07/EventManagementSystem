<?php
session_start();

include("connection.php");
include("function.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

        // save to database
        $user_id = random_num(20);
        $query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

        mysqli_query($con, $query);

        header("Location: login.php");
        die;
    } else {
        $error_message = "Please enter valid information!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
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

<body>

    <div id="box">
        <h2>Signup</h2>

        <?php if (isset($error_message)) : ?>
            <p id="error"><?= $error_message; ?></p>
        <?php endif; ?>

        <form method="post">
            <input id="text" type="text" name="user_name" placeholder="Username" required><br>
            <input id="text" type="password" name="password" placeholder="Password" required><br>
            <input id="button" type="submit" value="Signup"><br>
        </form>

        <a href="login.php" id="login-link">Click to Login</a>
    </div>

</body>

</html>
