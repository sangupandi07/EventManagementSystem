

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
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

        .otp-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .otp-box {
            width: 50px;
            height: 50px;
            border: 1px solid #ccc;
            border-radius: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            margin: 0 5px;
        }

        .otp-box input {
            width: 100%;
            height: 100%;
            border: none;
            text-align: center;
            font-size: 18px;
        }

        #button {
            margin-top: 20px;
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
    </style>
</head>

<body>
    <div id="box">
        <h2>Verify OTP</h2>

        <?php if (!empty($otp_error)) : ?>
            <p id="error"><?= $otp_error; ?></p>
        <?php else : ?>
            <div class="otp-container">
                <div class="otp-box"><input type="text" name="digit1" maxlength="1" required></div>
                <div class="otp-box"><input type="text" name="digit2" maxlength="1" required></div>
                <div class="otp-box"><input type="text" name="digit3" maxlength="1" required></div>
                <div class="otp-box"><input type="text" name="digit4" maxlength="1" required></div>
            </div>
            <input id="button" type="submit" value="Verify OTP"><br>
        <?php endif; ?>
    </div>
</body>

</html>
