<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select User Type</title>
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
        }

        header h1 {
            margin: 0;
        }

        section {
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

        #user-type {
            margin-bottom: 20px;
            font-size: 18px;
        }

        #button-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .user-button {
            padding: 10px;
            width: 100%;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .volunteer-button {
            background-color: #3498db;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .organizer-button {
            background-color: #e74c3c;
        }

        .user-button:hover {
            filter: brightness(1.2);
        }
    </style>
</head>

<body>

    <header>
        <h1>Select User Type</h1>
    </header>

    <section>
        <div id="box">
            <h2>Choose your role:</h2>

            <form action="login.php" method="post" id="user-form">
                <label id="user-type">Are you a Volunteer or an Event Organizer?</label><br>
                <div id="button-container">
                    <button type="button" class="user-button volunteer-button" onclick="setUserType('volunteer')" required>
                        Volunteer
                    </button>
                    <button type="button" class="user-button organizer-button" onclick="setUserType('organizer')" required>
                        Event Organizer
                    </button>
                </div>

                <!-- Add a hidden field to store the selected user type -->
                <input type="hidden" name="user_type" id="selected-user-type" value="">

                <!-- Add a hidden field to detect the form submission -->
                <input type="hidden" name="form_submitted" value="1">
            </form>
        </div>
    </section>

    <script>
        function setUserType(type) {
            document.getElementById('selected-user-type').value = type;
            if (type === 'organizer') {
                window.location.href = 'signup1.php';
            } else {
                document.getElementById('user-form').submit();
            }
        }
    </script>
</body>

</html>
