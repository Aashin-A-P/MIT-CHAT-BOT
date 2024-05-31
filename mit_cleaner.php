<!DOCTYPE html>
<html>
<head>
    <title>Trash Cleaning Form</title>
    <style>
        * { box-sizing: border-box; }
@import url('https://fonts.googleapis.com/css?family=Rubik:400,500&display=swap');


body {
  font-family: 'Rubik', sans-serif;
}

.container {
  display: flex;
  height: 100vh;
}

.left {
  overflow: hidden;
  display: flex;
  flex-wrap: wrap;
  flex-direction: column;
  justify-content: center;
  animation-name: left;
  animation-duration: 1s;
  animation-fill-mode: both;
  animation-delay: 1s;
}

.right {
  flex: 1;
  background-color: black;
  transition: 1s;
  background-image: url(https://images.pexels.com/photos/206359/pexels-photo-206359.jpeg?cs=srgb&dl=pexels-pixabay-206359.jpg&fm=jpg);
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}



.header > h2 {
  margin: 0;
  color: #4f46a5;
}

.header > h4 {
  margin-top: 10px;
  font-weight: normal;
  font-size: 15px;
  color: rgba(0,0,0,.4);
}

.form {
  max-width: 80%;
  display: flex;
  flex-direction: column;
}

.form > p {
  text-align: right;
}

.form > p > a {
  color: #000;
  font-size: 14px;
}

.form-field {
  height: 46px;
  padding: 0 16px;
  border: 2px solid #ddd;
  border-radius: 4px;
  font-family: 'Rubik', sans-serif;
  outline: 0;
  transition: .2s;
  margin-top: 20px;
}

.form-field:focus {
  border-color: #0f7ef1;
}

.form > button {
  padding: 12px 10px;
  border: 0;
  background: linear-gradient(to right, #de48b5 0%,#0097ff 100%); 
  border-radius: 3px;
  margin-top: 10px;
  color: #fff;
  letter-spacing: 1px;
  font-family: 'Rubik', sans-serif;
}

.animation {
  animation-name: move;
  animation-duration: .4s;
  animation-fill-mode: both;
  animation-delay: 2s;
}

.a1 {
  animation-delay: 2s;
}

.a2 {
  animation-delay: 2.1s;
}

.a3 {
  animation-delay: 2.2s;
}

.a4 {
  animation-delay: 2.3s;
}

.a5 {
  animation-delay: 2.4s;
}

.a6 {
  animation-delay: 2.5s;
}

@keyframes move {
  0% {
    opacity: 0;
    visibility: hidden;
    transform: translateY(-40px);
  }

  100% {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
  }
}

@keyframes left {
  0% {
    opacity: 0;
    width: 0;
  }

  100% {
    opacity: 1;
    padding: 20px 40px;
    width: 440px;
  }
}</style>
</head>
<body>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Database connection configuration
    $servername = "localhost";  // Change this if your database is hosted on a different server
    $username = "root";  // Replace with your database username
    $password = "";  // Replace with your database password
    $dbname = "clean";  // Replace with your database name

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize and store the form data
    $place = test_input($_POST["place"]);
    
    $email = test_input($_POST["email"]);
    $reg_no = test_input($_POST["reg_no"]);

   

    // Insert data into the clean_data table
    $sql = "INSERT INTO clean_data (place, email, reg_no) VALUES ('$place','$email', '$reg_no')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Form submitted successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
    }

    // Close the database connection
    $conn->close();
}

// Function to sanitize form inputs
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<div class="container">
  <div class="left">
    <div class="header">
      <h2 class="animation a1">Transforming Trash, Embracing Clean.</h2>
      <h4 class="animation a2">Register your Concern</h4>
    </div>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    <div class="form">
        
      <input type="number" name='reg_no' class="form-field animation a3" placeholder="Registration Number" required>
      <input type="email" name="email" class="form-field animation a4" placeholder="Email" required>

      <input type="text"name='place' class="form-field animation a5" placeholder="Place of Concern" required><br>
      
      
      <button class="animation a6" type="submit">Express Concern</button><br>
    </form>
      <div class="animation a6"><br>
      <span style='color:#de48b5;'>Share the Concerned Location in WhatsApp... </span><br><br>
      <center>Or Connect with Us in WhatsApp..</center><br>
    
    <a href="https://wa.me/9489960744" ref="whatsapp" target="_blank"><center>Contact Cleaning Office</center></center></a> <br>
    <a href="https://wa.me/6381649403" ref="whatsapp" target="_blank"><center>Contact Cleaner..</center></center></a>
</div>

    </div>
  </div>
  <div class="right"></div>
</div>

  </div>

</body>
</html>

