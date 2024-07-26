<?php
session_start();

include("connection1.php");

if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if the user is not logged in
    header("Location: login1.php");
    die();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        isset(
            $_POST['event_name'],
            $_POST['event_description'],
            $_POST['event_date'],
            $_POST['event_time'],
            $_POST['organization_name'],
            $_POST['organizer_name'],
            $_POST['volunteer_required'],
            $_POST['salary_per_day'],
            $_POST['num_of_days'],
            $_POST['num_of_work_hours_per_day']
        )
    ) {
        $user_id = $_SESSION['user_id'];
        // Sanitize input data
        $event_name = mysqli_real_escape_string($con, $_POST['event_name']);
        $event_description = mysqli_real_escape_string($con, $_POST['event_description']);
        $event_date = mysqli_real_escape_string($con, $_POST['event_date']);
        $event_time = mysqli_real_escape_string($con, $_POST['event_time']);
        $organization_name = mysqli_real_escape_string($con, $_POST['organization_name']);
        $organizer_name = mysqli_real_escape_string($con, $_POST['organizer_name']);
        $volunteer_required = mysqli_real_escape_string($con, $_POST['volunteer_required']);
        $salary_per_day = mysqli_real_escape_string($con, $_POST['salary_per_day']);
        $num_of_days = mysqli_real_escape_string($con, $_POST['num_of_days']);
        $num_of_work_hours_per_day = mysqli_real_escape_string($con, $_POST['num_of_work_hours_per_day']);

        // Insert the event into the database
        $query = "INSERT INTO events (event_name, event_description, event_date, event_time, organization_name, organizer_name, volunteer_required, salary_per_day, num_of_days, num_of_work_hours_per_day) VALUES ('$event_name', '$event_description', '$event_date', '$event_time', '$organization_name', '$organizer_name', '$volunteer_required', '$salary_per_day', '$num_of_days', '$num_of_work_hours_per_day')";
        $result = mysqli_query($con, $query);

        if ($result) {
            $success_message = "Event created successfully!";
        } else {
            $error_message = "Error creating the event: " . mysqli_error($con);
        }
    } else {
        $error_message = "Invalid data submitted.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizer Dashboard</title>
    <style>
        /* Your styles go here */
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

        #container {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 600px;
            padding: 20px;
            text-align: center;
        }

        #container h2 {
            color: #333;
        }

        form {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        input,
        textarea {
            margin-bottom: 10px;
            width: calc(48% - 10px);
            padding: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: white;
            cursor: pointer;
            margin-left: 150px;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        #error {
            color: #ff3333;
            margin-top: 10px;
            width: 100%;
            text-align: left;
        }

        #success {
            color: #00cc00;
            margin-top: 10px;
            width: 100%;
            text-align: left;
        }
    </style>
    </style>
</head>

<body>

    <div id="container">
        <h2>Organizer Dashboard</h2>

        <form method="post">
            <!-- Your form fields go here -->
            <form method="post">
            <input type="text" name="event_name" placeholder="Event Name" required>
            <textarea name="event_description" placeholder="Event Description" required></textarea>
            <input type="text" name="event_date" placeholder="event_date (DD-MM-YYYY)" required>
            <input type="text" name="event_time" placeholder="event_time (10 AM - 4 PM)" required>
            <input type="text" name="organization_name" placeholder="Organization Name" required>
            <input type="text" name="organizer_name" placeholder="Organizer Name" required>
            <input type="number" name="volunteer_required" placeholder="Required Volunteers" required>
            <input type="number" name="salary_per_day" placeholder="Salary Per Day" required>
            <input type="number" name="num_of_days" placeholder="Number of Days" required>
            <input type="number" name="num_of_work_hours_per_day" placeholder="Number of Work Hours Per Day" required>
            <input type="submit" value="Create Event">
        </form>
        </form>

        <?php if (isset($error_message)) : ?>
            <p id="error"><?= $error_message; ?></p>
        <?php endif; ?>

        <?php if (isset($success_message)) : ?>
            <p id="success"><?= $success_message; ?></p>
        <?php endif; ?>
    </div>

</body>

</html>
