
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MIT College Transportation Service</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Rubik', sans-serif;
            background-image: url('https://wallpapers.com/images/featured/beautiful-scenery-wnxju2647uqrcccv.jpg');
            background-size: cover;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
            display: flex;
            min-height: 100vh;
            justify-content: center;
            align-items: center;
        }

        .container {
            display: flex;
            max-width: 1000px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 5px;
            overflow: hidden;
        }

        .left {
            flex: 1;
            padding: 30px;
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
            background-image: url('https://wallpapers.com/images/featured/beautiful-scenery-wnxju2647uqrcccv.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
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
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
        // Retrieve form data
        $pickup = $_POST["pickup"];
        $dropoff = $_POST["dropoff"];
        $date = $_POST["date"];
        $time = $_POST["time"];
        $transport_type = $_POST["transport_type"];
        $passengers = (int)$_POST["passengers"];
        $special_requirements = $_POST["special_requirements"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        
        // Database configuration
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "transport";

        // Create a connection to the database
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        

        // Prepare and execute the SQL query to insert the data into the database
        $sql = "INSERT INTO transportation_requests (pickup_location,dropoff_location,date,time,transport_type,passengers,special_requirements,name,email,phone) VALUES ('$pickup', '$dropoff', '$date', '$time', '$transport_type', $passengers, '$special_requirements', '$name', '$email', '$phone')";

        if ($conn->query($sql) === TRUE) {
            // Display a success message using JavaScript alert
            echo '<script>alert("Thank you for submitting your transportation request. We will get back to you soon. Please stay tuned for further updates.");</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the database connection
        $conn->close();
    }

    ?>
    <div class="container">
        <div class="left">
            <div class="header">
                <h2 class="animation a1">Revolutionizing Transportation</h2>
                <h4 class="animation a2">Book Your Ticket</h4>
    </div>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form">
        
            <input type="text" id="name" name="name" class="form-field animation a3" placeholder="Name" required><br>
            <input type="email" id="email" name="email" class="form-field animation a3" placeholder="Email Address" required><br>
            <input type="number" id="phone" name="phone" maxlength="10" class="form-field animation a3" placeholder="Mobile Number" required><br>
            <input type="text" id="pickup" name="pickup" class="form-field animation a3" placeholder="Pickup Location" required><br>
            <input type="text" id="dropoff" name="dropoff" class="form-field animation a4" placeholder="Drop Location" required><br>
            <input type="date" id="date" name="date" class="form-field animation a4" required><br>
            <input type="time" id="time" name="time" class="form-field animation a4" required><br>
            <select id="transport_type" name="transport_type" class="form-field animation a4" required>
                <option value="">Select Transportation Type</option>
                <option value="Car">Car</option>
                <option value="Bus">Bus</option>
            </select><br>
            <input type="number" id="passengers" name="passengers" min="1" class="form-field animation a4" placeholder="No of Passengers" required><br>
            <textarea id="special_requirements" name="special_requirements" rows="4" cols="40" class="form-field animation a4" placeholder="Special Requirements"></textarea><br>

            <input type="checkbox" id="terms" name="terms" required>
            <label for="terms">I agree to the terms and conditions</label><br>

            <button  type="submit" name='submit'>Book Now</button>
    </form>
     <br>
     <?php
     
     ?>
      <span style='color:#de48b5;'>Share Your Location in WhatsApp... </span><br><br>
      <center>Or Connect with Us in WhatsApp..</center><br>
    
    <a href="https://wa.me/9489960744" ref="whatsapp" target="_blank"><center>Contact Transport Office</center></center></a> <br>
    <a href="https://wa.me/6381649403" ref="whatsapp" target="_blank"><center>Contact Conductor..</center></center></a>
</div><br>
    
   
    
    
      

  </div>
  <div class="right"></div>
</div>


    
</body>
</html>
