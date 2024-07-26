<?php
session_start();

include("connection1.php");

if (!isset($_SESSION['user_email'])) {
    // Redirect to login or registration page if the user is not logged in
    header("Location: login.php");
    die();
}

$user_email = $_SESSION['user_email'];

// Retrieve registered events for the user
$query = "SELECT * FROM register WHERE email = '$user_email'";
$result = mysqli_query($con, $query);

$registered_events = [];

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $registered_events[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Registered Events</title>
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

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin: 10px 0;
            font-size: 16px;
        }

        a {
            color: #3498db;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div id="box">
        <h2>My Registered Events</h2>

        <?php if (!empty($registered_events)) : ?>
            <ul>
                <?php foreach ($registered_events as $event) : ?>
                    <li>
                        <?php
                        // Check if the keys exist before accessing them
                        $eventName = isset($event['event_name']) ? $event['event_name'] : 'Event Name Undefined';
                        $eventDate = isset($event['event_date']) ? $event['event_date'] : 'Event Date Undefined';
                        ?>
                        <?= $eventName; ?> - <?= $eventDate; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else : ?>
            <p>No events registered yet.</p>
        <?php endif; ?>

        <p><a href="index.php">Back to Home</a></p>
    </div>

</body>

</html>
