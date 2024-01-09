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

    $connect = mysqli_connect($hostname, $username, $password, $database) or die(mysqli_error($connect));
    print "<div>Connected to MySQL Database <b>$database</b></div>";

    $dropQuery = "DROP TABLE IF EXISTS photographs";
    mysqli_query($connect, $dropQuery) or die(mysqli_error($connect));
    $query = "CREATE TABLE photographs (
        picture_number INT PRIMARY KEY,
        subject VARCHAR(255),
        location VARCHAR(255),
        date_taken DATE,
        picture_url VARCHAR(255)
    )";
    
    mysqli_query($connect, $query) or die(mysqli_error($connect));

    $sampleData = [
        [1, 'tiger', 'india', '2022-11-17', 'https://i.imgur.com/GleAY3fb.jpg'],
        [2, 'ruins', 'india', '2022-05-14', 'https://i.imgur.com/9930myHb.jpg'],
        [3, 'plant', 'ontario', '2020-01-30', 'https://i.imgur.com/INcWXIdb.jpg'],
        [4, 'spark', 'india', '2022-04-23', 'https://i.imgur.com/Cu6aRrMb.jpg'],
        [5, 'cube', 'ontario', '2020-09-01', 'https://i.imgur.com/VzHjhYGb.jpg'],
        [6, 'mountain', 'nepal', '2022-02-28', 'https://i.imgur.com/P9IVqkSb.jpg'],
        [7, 'lake', 'ontario', '2022-06-09', 'https://i.imgur.com/Iov9SvZb.jpg'],
        [8, 'sunset', 'america', '2020-08-20', 'https://i.imgur.com/8oLKVUVb.jpg'],
        [9, 'street', 'berlin', '2020-12-25', 'https://i.imgur.com/3Vw3Ok6b.jpg'],
        [10, 'sky', 'russia', '2022-11-29', 'https://i.imgur.com/NBd8lsFb.jpg']
    ];

    foreach ($sampleData as $data) {
        $insertQuery = "INSERT INTO photographs (picture_number, subject, location, date_taken, picture_url) 
                        VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]')";
        mysqli_query($connect, $insertQuery) or die(mysqli_error($connect));
    }

    mysqli_close($connect);
    ?>
</body>
</html>