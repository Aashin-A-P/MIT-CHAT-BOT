
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MIT College Complaint Form</title>
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
  background-image: url(https://wallpaperset.com/w/full/6/0/7/55669.jpg);
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
h1{
    color:linear-gradient(to right, #de48b5 0%,#0097ff 100%);
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
    <h1>MIT College Complaint Form</h1>

    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $category = $_POST["category"];
        $details = $_POST["details"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];

        // Database configuration
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "complaints";

        // Create a connection to the database
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Create the table if it does not exist
        $createTableQuery = "CREATE TABLE IF NOT EXISTS complaints (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            category VARCHAR(100) NOT NULL,
            details TEXT NOT NULL,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(100) NOT NULL,
            phone VARCHAR(20) NOT NULL
        )";

        if ($conn->query($createTableQuery) === FALSE) {
            die("Error creating table: " . $conn->error);
        }

        // Prepare and execute the SQL query to insert the data into the database
        $sql = "INSERT INTO complaints (category, details, name, email, phone) VALUES ('$category', '$details', '$name', '$email', '$phone')";

        if ($conn->query($sql) === TRUE) {
            echo '<script>
                    alert("Complaint submitted successfully!");
                    window.location.href = "complaint_mit.php";
                  </script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the database connection
        $conn->close();
    } else {
    ?>

<div class="container">
  <div class="left">
    <div class="header">
      <h2 class="animation a1">Empowering Voices</h2>
      <h4 class="animation a2">Register your Complaint</h4>
    </div>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    <div class="form">
    
        <select id="category" name="category" class="form-field animation a3" required>
            <option value="">Select Category</option>
            <option value="Academics">Academics</option>
            <option value="Facilities">Facilities</option>
            <option value="Faculty">Faculty</option>
            <option value="Administrative">Administrative</option>
            <option value="Other">Other</option>
        </select><br>
        <textarea id="details" name="details" class="form-field animation a4" placeholder="Enter your complaint details here" required></textarea><br>
        
      <input type="text" name='name' class="form-field animation a3" placeholder="Enter Your Name" required><br>
      <input type="email" name="email" class="form-field animation a4" placeholder="Enter Your Email" required><br>

      <input type="text"name='phone' class="form-field animation a5" placeholder="Enter Your Mobile Number" required><br>
      
      
      <button class="animation a6" type="submit">Register Complaint</button><br>
    </div>
    </form>
    <div>
      <div class="animation a6"><br>
    
      <center>Or Connect with Us in WhatsApp..</center><br>
    
    <a href="https://wa.me/9489960744" ref="whatsapp" target="_blank"><center>Contact MIT Office</center></center></a> <br>
    <a href="https://wa.me/6381649403" ref="whatsapp" target="_blank"><center>Contact Office Head</center></center></a>
</div>

    </div>
  </div>
  <div class="right"></div>
</div>

  </div>










    

    <?php
    }
    ?>
</body>
</html>
