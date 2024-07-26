<?php
session_start();

include("connection.php");
include("function.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // something was posted
    if (isset($_POST['user_name']) && isset($_POST['password'])) {
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

            // read from database
            $query = "SELECT * FROM users WHERE user_name = '$user_name' LIMIT 1";
            $result = mysqli_query($con, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);

                if ($user_data['password'] === $password) {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.php");
                    die;
                }
            }

            $error_message = "Invalid username or password!";
        } else {
            $error_message = "Invalid username or password!";
        }
    } else {
        $error_message = "Username or password not provided!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #box {
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 300px;
            padding: 20px;
            text-align: center;
        }

        #box h2 {
            color: #333333;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="password"] {
            height: 40px;
            border-radius: 5px;
            padding: 10px;
            border: 1px solid #cccccc;
            width: calc(100% - 22px);
            margin-bottom: 15px;
            box-sizing: border-box;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #3498db;
        }

        #button {
            padding: 12px;
            width: 100%;
            color: #ffffff;
            background-color: #3498db;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        #button:hover {
            background-color: #2980b9;
        }

        #error {
            color: #ff3333;
            margin-top: 10px;
            font-size: 14px;
        }

        #signup-link {
            margin-top: 15px;
            color: #3498db;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
        }

        #signup-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div id="box">
        <h2>Login</h2>
        <?php if (isset($error_message)) : ?>
            <p id="error"><?= $error_message; ?></p>
        <?php endif; ?>
        <form method="post">
            <input type="text" name="user_name" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input id="button" type="submit" value="Login"><br>
        </form>
        <a href="signup.php" id="signup-link">Click to Signup</a>
    </div>
</body>
</html>
