<!DOCTYPE html>
<html>
<head>
    <title>Table Data</title>
    <style>
        h2 {
            color:lightblue;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            background-color: transparent;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
        th, td {
            padding: 8px;
            border: 1px solid #ddd;
            
        }

        th {
            background-color: #f2f2f2;
            color:black;
        }
        td {
            color:wheat;
        }
        th:last-child,
        td:last-child {
            text-align: center;
        }
        button {
            background-color: green;
            color: white;
            padding: 5px 10px; 
            border: none;
            cursor: pointer;
            margin-right: 5px;
        }
        button.red {
            background-color: red;
        }
        @import url(https://fonts.googleapis.com/css?family=Syncopate);

html, body { 
  background-color: black;
  height: 100%; 
  overflow: hidden; 
}
body {
  /* background: radial-gradient(
    circle closest-corner at center 125px,
    #222,
    black 40%
  ) no-repeat; */
  text-align: center;
  font-family: Arial, sans-serif;
}

    </style>
</head>
<body>
<?php
if (isset($_POST['fet'])) {
    $tableName = $_POST['fet'];

    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = ""; // Set your database name

    switch ($tableName) {
        case 'clean_data':
            $dbname = 'clean';
            break;
        case 'bookings':
            $dbname = 'room';
            break;
        case 'complaints':
            $dbname = 'complaints';
            break;
        case 'transportation_requests':
            $dbname = 'transport';
            break;
        case 'club_registration':
            $dbname = 'club';
            break;
        default:
            die("Invalid table name.");
    }
    session_start();
    $_SESSION['dbname']=$dbname;
    
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM " . $tableName;
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<h2>{$tableName}</h2>";
        echo "<table style='border-collapse: collapse; width: 100%;'>";
        echo "<tr style='background-color: #f2f2f2;'>";

        // Display table headers
        $headers = mysqli_fetch_assoc($result);
        
        $email=$headers['email'];
        
        $_SESSION['email']=$email;
    
        foreach ($headers as $columnName => $value) {
            echo "<th style='padding: 8px; border: 1px solid #ddd;'>{$columnName}</th>";
        }

        // Add an extra column for buttons
        echo "<th style='padding: 8px; border: 1px solid #ddd;'>Actions</th>";

        echo "</tr>";

        // Display table rows and cells
        $c = 0;
        do {
            echo "<tr>";
        foreach ($headers as $columnName => $value) {
            echo "<td style='padding: 8px; border: 1px solid #ddd;'>{$value}</td>";
        }
        $c += 1;
        echo "<td style='padding: 8px; border: 1px solid #ddd;'>";
        echo "<form action='new.php' method='post'>
                <button type='submit' name='submit' value='{$c}:confirmed'
      style='background-color: green; color: white; padding: 5px 10px; border: none; cursor: pointer; margin-right: 5px;'>Confirm</button>";
        echo "<button type='submit' name='submit' value='{$c}:declined'
      style='background-color: red ; color: white; padding: 5px 10px; border: none; cursor: pointer; margin-right: 5px;'>Decline</button></form>";
        echo "</td>";

                        echo "</tr>";
                       
                    } while ($headers = mysqli_fetch_assoc($result));

                    echo "</table>";
                } else {
                    echo "<p>No data found in the table.</p>";
                }

                $conn->close();
            }
?>
</body>
</html>
