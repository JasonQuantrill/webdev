<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab08</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-family: cursive, sans-serif;
            color: #fff;
        }

        #time-of-day {
            font-size: 8vh;
            text-shadow: 2px 2px 4px #000000;
            color: red;
        }

        #container {
            position: relative;
            width: 100%;
            height: 100%;
            background-size: 100% 100%;
            background-position: center;
            background-repeat: no-repeat;
        }

        #form-container {
            margin-top: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin-bottom: 10px;
            font-size: 18px;
        }

        input {
            margin-bottom: 20px;
            padding: 8px;
            font-size: 16px;
        }

        #error-message {
            color: red;
            font-size: 16px;
            margin-top: 20px;
        }

        table {
            margin-top: 20px;
            border-collapse: collapse;
            width: 70%;
            margin-left: auto;
            margin-right: auto;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        #hit-counter {
            position: fixed;
            bottom: 10px;
            right: 10px;
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            opacity: 0.8;
        }
    </style>
</head>
<body>
<?php

if (!isset($_COOKIE['hit_counter'])) {
    
    $counter = 1;
    setcookie('hit_counter', $counter, time() + 3600 * 24 * 365); // Cookie expires in one year
} else {
    
    $counter = $_COOKIE['hit_counter'] + 1;
    setcookie('hit_counter', $counter, time() + 3600 * 24 * 365); // Update the cookie expiration time
}
?>
<?php
$hour = date('G');
$background_image = 'default.jpg';
$greeting = 'Hello';

if ($hour >= 5 && $hour < 12) {
    $background_image = 'morning.jpg';
    $greeting = 'Good morning';
} elseif ($hour >= 12 && $hour < 18) {
    $background_image = 'afternoon.jpg';
    $greeting = 'Good afternoon';
} elseif ($hour >= 18 && $hour < 21) {
    $background_image = 'evening.jpg';
    $greeting = 'Good evening';
} else {
    $background_image = 'night.jpg';
    $greeting = 'Good night';
}
?>

<div id="container" style="background-image: url('<?php echo $background_image; ?>');">
    <div id="time-of-day"><?php echo $greeting; ?></div>
    <div id="form-container">
        <form action="generate_table.php" method="post">
            <label for="num1">Enter the first number (3-12):</label>
            <input type="number" name="num1" min="3" max="12" required>

            <label for="num2">Enter the second number (3-12):</label>
            <input type="number" name="num2" min="3" max="12" required>

            <button type="submit">Generate Table</button>
        </form>

        <?php
        if (isset($_GET['error'])) {
            $error_message = $_GET['error'];
            echo '<div id="error-message">' . $error_message . '</div>';
        }
        ?>
    </div>
</div>
<div id="hit-counter">Hits: <?php echo $counter; ?></div>
</body>
</html>
