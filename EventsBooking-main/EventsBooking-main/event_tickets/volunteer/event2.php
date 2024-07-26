<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Concert Details</title>
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

        header a {
            color: white;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            background-color: #555;
            transition: background-color 0.3s ease;
        }

        header a:hover {
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
        <h1>Movie Night Details</h1>
        <a href="index.php">Back to Events</a>
    </header>

    <section>
        <div class="event-card">
            <img src="movie.jpg" alt="Movie">
            <div class="event-title">Movie Night</div>
            <div class="event-details">
                Date: March 15, 2024<br>
                Time: 8:30 PM<br>
                Organiser: Mr.Pandian<br>
                Venue: Cinema Paradise
            </div>
           <button onclick="window.location.href='register.php'">Register Now</button>
            <!-- Additional event details can be added here -->
        </div>
    </section>

    <footer>
        &copy; 2024 Volunteer Events Booking App
    </footer>

</body>

</html>
