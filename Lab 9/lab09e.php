<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Random Photograph</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom, #003366 0%, #006699 100%);
            color: #fff;
            margin: 0;
            padding: 20px;
            text-align: center;
        }
        .image-container {
            margin: 20px auto;
            padding: 20px;
            background-color: rgba(0, 102, 204, 0.8);
            border: 1px solid #0077b3;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            max-width: 600px;
        }
        img {
            max-width: 100%;
            height: auto;
            border: 1px solid #0077b3;
            border-radius: 5px;
        }
        .caption {
            font-size: 18px;
            color: #E0FFFF; /* Light Cyan color for better readability */
            margin-top: 15px;
        }
        .total-images {
            font-size: 16px;
            color: #ADD8E6; /* Light Blue color */
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <?php
    $hostname = "localhost"; 
    $username = "jquantri";
    $password = "43KKNAQA";
    $database = "jquantri"; 

    // Connect to the database
    $connect = mysqli_connect($hostname, $username, $password, $database) or die(mysqli_error($connect));

    // Query to fetch a random image
    $randomImageQuery = "SELECT * FROM photographs ORDER BY RAND() LIMIT 1";
    $result = mysqli_query($connect, $randomImageQuery) or die(mysqli_error($connect));
    $image = mysqli_fetch_assoc($result);

    // Query to count total images
    $countQuery = "SELECT COUNT(*) as total FROM photographs";
    $countResult = mysqli_query($connect, $countQuery) or die(mysqli_error($connect));
    $totalCount = mysqli_fetch_assoc($countResult)['total'];

    // Close the database connection
    mysqli_close($connect);

    // Display the image and details
    if ($image) {
        echo "<div class='image-container'>";
        echo "<img src='" . $image['picture_url'] . "' alt='Photograph'>";
        echo "<div class='caption'>" . htmlspecialchars($image['subject']) . " in " . htmlspecialchars($image['location']) . " on " . htmlspecialchars($image['date_taken']) . "</div>";
        echo "<div class='total-images'>Total images in database: " . $totalCount . "</div>";
        echo "</div>";
    }
    ?>
</body>
</html>
