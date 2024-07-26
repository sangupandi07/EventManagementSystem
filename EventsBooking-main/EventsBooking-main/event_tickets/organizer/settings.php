<?php
// Assuming you have a database connection established

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $new_password = $_POST["password"]; // This will be the new password

    // Perform validation if needed

    // Hash the new password (you should use appropriate hashing algorithm)
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Update the password in the database
    $sql = "UPDATE users SET password = '$hashed_password' WHERE username = '$username' AND email = '$email'";

    if (mysqli_query($conn, $sql)) {
        echo "Password updated successfully";
    } else {
        echo "Error updating password: " . mysqli_error($conn);
    }
}

// Close database connection
mysqli_close($conn);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Settings - Volunteer Events Booking App</title>
    <!-- Include Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            margin: 0;
        }

        nav {
            display: flex;
            gap: 10px;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            background-color: #555;
            transition: background-color 0.3s ease;
        }

        nav a:hover {
            background-color: #777;
        }

        section {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
        }

        input[type="text"], input[type="email"], input[type="password"], select, input[type="file"] {
            width: calc(100% - 20px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        /* Styling for the Show Password button */
        .password-toggle-btn {
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
            background-color: transparent;
            border: none;
            padding: 0;
            cursor: pointer;
        }

        /* Styles for file upload */
        input[type="file"] {
            border: none;
            background-color: #f4f4f4;
        }

        /* Additional styles for checkboxes */
        input[type="checkbox"] {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>

<header>
    <h1>User Settings - Volunteer Events Booking App</h1>
    <nav>
        <a href="index.php">Home</a>
        <a href="my-registered-events.php">My Events</a>
        <a href="settings.php">Settings</a>
        <a href="logout.php">Logout</a>
    </nav>
</header>

<section>
    <h2>Settings</h2>
    <form action="update_settings.php" method="post" enctype="multipart/form-data">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="Current Username">

        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" placeholder="user@example.com">

        <label for="password">Change Password:</label>
        <div style="position: relative;">
            <input type="password" id="password" name="password" placeholder="qwerty@S123.com">
            <!-- Eye icon for password toggle -->
            <button type="button" class="password-toggle-btn" id="togglePassword">
                <i class="fas fa-eye"></i>
            </button>
        </div>

        <label for="profilePicture">Profile Picture:</label>
        <input type="file" id="profilePicture" name="profilePicture">

        <label for="notificationPref">Notification Preferences:</label>
        <select id="notificationPref" name="notificationPref">
            <option value="email">Email</option>
            <option value="sms">SMS</option>
            <option value="push">Push Notifications</option>
        </select>

        <label for="languagePref">Language Preference:</label>
        <select id="languagePref" name="languagePref">
            <option value="en">English</option>
            <option value="es">Spanish</option>
            <option value="fr">French</option>
        </select>

        <label for="privacySettings">Privacy Settings:</label>
        <input type="checkbox" id="privacySettings" name="privacySettings[]" value="profile"> Allow others to view my profile<br>
        <input type="checkbox" id="privacySettings" name="privacySettings[]" value="events"> Allow others to see events I'm attending<br>

        <input type="submit" value="Save Settings">
    </form>
</section>

<footer>
    &copy; 2024 Volunteer Events Booking App
</footer>

<!-- Include Font Awesome script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

<script>
    const passwordInput = document.getElementById('password');
    const togglePasswordBtn = document.getElementById('togglePassword');

    togglePasswordBtn.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        // Toggle eye icon
        this.querySelector('i').classList.toggle('fa-eye-slash');
    });
</script>

</body>
</html>
