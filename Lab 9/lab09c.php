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
    function displayOntarioPictures($connect) {
        $query = "SELECT * FROM photographs WHERE location = 'ontario'";
        $result = mysqli_query($connect, $query) or die(mysqli_error($connect));

        echo "<h2>Ontario Pictures</h2>";

        if (mysqli_num_rows($result) > 0) {
            echo "<div class='ontario-images'>";
            
            while ($row = mysqli_fetch_assoc($result)) {
                $pictureUrl = $row['picture_url'];
                $subject = $row['subject'];
                $location = $row['location'];

                echo "<div class='ontario-image'>";
                echo "<img src='$pictureUrl' alt='$subject'>";
                echo "<p><b>Subject:</b> $subject</p>";
                echo "<p><b>Location:</b> $location</p>";
                echo "</div>";
            }

            echo "</div>";
        } else {
            echo "<p>No Ontario photos found.</p>";
        }
    }

    $hostname = "localhost"; 
    $username = "jquantri";
    $password = "43KKNAQA";
    $database = "jquantri"; 

    $connect = mysqli_connect($hostname, $username, $password, $database) or die(mysqli_error($connect));
    print "<div>Connected to MySQL Database <b>$database</b></div>";

    displayOntarioPictures($connect);

    mysqli_close($connect);
    ?>
</body>
</html>