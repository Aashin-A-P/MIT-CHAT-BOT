<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chat";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function save() {
    global $conn;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $un = $_POST['un'];
        $pw = $_POST['pw'];
        $cpw = $_POST['cpw'];

        
            $query = "SELECT * FROM users WHERE username = '$un'";
            $result = $conn->query($query);

            if ($result->num_rows === 0) {
                $query = "INSERT INTO users (username) VALUES ('$un')";
                $conn->query($query);

                $user_id = $conn->insert_id;
                $hashed_password = password_hash($pw, PASSWORD_DEFAULT);
                $query = "INSERT INTO passwords (user_id, password) VALUES ('$user_id', '$hashed_password')";
                $conn->query($query);

                die("<script>alert('Registration Successful!')</script>");
            } else {
                die ("<script>alert('Username already exists. Please choose a different username.')</script>");
            }
    }
}

function check() {
    global $conn;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $un = $_POST['un1'];
        $pw = $_POST['pw1'];
        $query = "SELECT * FROM users WHERE username = '$un'";
        $result = $conn->query($query);

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $user_id = $row['user_id'];

            $query = "SELECT password FROM passwords WHERE user_id = '$user_id'";
            $result = $conn->query($query);

            $row = $result->fetch_assoc();
            $hashed_password = $row['password'];

            if (password_verify($pw, $hashed_password)) {
                echo "<script>alert('Login Successful')</script>";
                header('Location: lemmatizer.php');
                exit();
            } else {
                die ("<script>alert('Login Unsuccessful')</script>");
            }
        } else {
            die ("<script>alert('Username not found. Please check your username.')</script>");
        }
    }
}

if (isset($_POST["signup"])) {
    save();
} elseif (isset($_POST["login"])) {
    check();
}

$conn->close();
?>
</body>
</html>
