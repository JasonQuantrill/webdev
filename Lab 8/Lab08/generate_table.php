<!DOCTYPE html>
<html>
<head>
<title>Lab08 Table</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #dbb0ee;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];

    if ($num1 >= 3 && $num1 <= 12 && $num2 >= 3 && $num2 <= 12) {
        
        generateTable($num1, $num2);
    } else {
        
        $error_message = "Error: Please enter numbers between 3 and 12.";
        header("Location: lab08.php?error=" . urlencode($error_message));
        exit();
    }
}

function generateTable($num1, $num2) {
    echo '<table>';
    echo '<tr><th>&times;</th>';
    for ($i = 1; $i <= $num2; $i++) {
        echo '<th>' . $i . '</th>';
    }
    echo '</tr>';

    for ($i = 1; $i <= $num1; $i++) {
        echo '<tr><th>' . $i . '</th>';
        for ($j = 1; $j <= $num2; $j++) {
            echo '<td>' . ($i * $j) . '</td>';
        }
        echo '</tr>';
    }

    echo '</table>';
}
?>

</body>
</html>