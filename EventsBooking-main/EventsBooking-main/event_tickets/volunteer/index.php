<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Events Booking App</title>
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
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin: 20px;
        }

        .event-card {
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
            margin: 10px;
            width: 300px;
            transition: transform 0.3s ease;
        }

        .event-card:hover {
            transform: scale(1.05);
        }

        .event-card img {
            width: 100%;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .event-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .event-details {
            font-size: 14px;
            color: #555;
            margin-bottom: 10px;
        }

        button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
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
    </style>
</head>

<body>

    <header>
        <h1>Volunteer Events Booking App</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="my-registered-events.php">My Events</a>
            <a href="settings.php">Settings</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <section>
        <!-- Your event cards go here -->
        <div class="event-card">
            <img src="Concert.jpg" alt="Concert">
            <div class="event-title">Music Concert</div>
            <div class="event-details">
                Date: March 15, 2024<br>
                <!-- Time: 7:00 PM<br>
                Venue: City Arena -->
            </div>
            <button onclick="window.location.href='event1.php'">VIEW DETAILS</button>
        </div>

        <div class="event-card">
            <img src="movie.jpg" alt="Movie">
            <div class="event-title">Movie Night</div>
            <div class="event-details">
                Date: March 20, 2024<br>
                <!-- Time: 8:30 PM<br>
                Venue: Cinema Paradise -->
            </div>
            <button onclick="window.location.href='event2.php'">VIEW DETAILS</button>        </div>

        <div class="event-card">
            <img src="sports.jpg" alt="Sports Event">
            <div class="event-title">Sports Championship</div>
            <div class="event-details">
                Date: April 5, 2024<br>
                <!-- Time: 3:00 PM<br>
                Venue: Stadium XYZ -->
            </div>
            <button onclick="window.location.href='event3.php'">VIEW DETAILS</button>
        </div>

        <div class="event-card">
            <img src="comedy.jpg" alt="Comedy Show">
            <div class="event-title">Stand-up Comedy</div>
            <div class="event-details">
                Date: April 10, 2024<br>
                <!-- Time: 8:00 PM<br>
                Venue: Laugh Lounge -->
            </div>
            <button onclick="window.location.href='event4.php'">VIEW DETAILS</button>
        </div>

        <!-- Add more event cards as needed -->
    </section>

    <footer>
        &copy; 2024 Volunteer Events Booking App
    </footer>

</body>

</html>
