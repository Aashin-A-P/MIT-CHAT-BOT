

<!DOCTYPE html>
<html>
<head>
    <title>MIT College Club Registration Form</title>
    <style>
        /* CSS for form alignment and styling */
body {
    font-family: Arial, sans-serif;
    margin: 20px;
    background-image: url("https://www.pixelstalk.net/wp-content/uploads/images2/Scenery-Wallpaper-High-Resolution.jpg");
    background-size:cover;
}

h2 {
    color: #333;
}

form {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"],
input[type="email"],
input[type="password"],
textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

input[type="radio"],
input[type="checkbox"] {
    margin-right: 5px;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

/* Optional: Add styles for error messages (if needed) */
.error {
    color: #ff0000;
    font-size: 12px;
}
/* CSS for form alignment and styling */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f7f7f7;
    margin: 20px;
}

h2 {
    color: #333;
}

form {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 10px;
    color: #555;
}

input[type="text"],
input[type="email"],
input[type="password"],
textarea {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    outline: none;
    transition: border-color 0.3s ease;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus,
textarea:focus {
    border-color: #80bdff;
}

input[type="radio"],
input[type="checkbox"] {
    margin-right: 8px;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

/* Optional: Add styles for error messages (if needed) */
.error {
    color: #e74c3c;
    font-size: 14px;
    margin-top: 5px;
}

/* Optional: Additional styles for the form */
textarea {
    resize: vertical;
}

/* Optional: Styling for radio buttons and checkboxes */
input[type="radio"] + label,
input[type="checkbox"] + label {
    margin-right: 15px;
    color: #555;
    cursor: pointer;
}

/* Optional: Styles for form sections */
.section {
    border-bottom: 1px solid #ccc;
    margin-bottom: 20px;
    padding-bottom: 10px;
}


        </style>
</head>
<body>

<?php
// Function to sanitize form inputs
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    // Retrieve form data and sanitize
    $first_name = test_input($_POST["first_name"]);
    $last_name = test_input($_POST["last_name"]);
    $email = test_input($_POST["email"]);
    $contact_number = test_input($_POST["contact_number"]);
    $address = test_input($_POST["address"]);
    $dob = test_input($_POST["dob"]);
    $gender = test_input($_POST["gender"]);
    $membership_type = test_input($_POST["membership_type"]);
    $emergency_contact_name = test_input($_POST["emergency_contact_name"]);
    $emergency_contact_number = test_input($_POST["emergency_contact_number"]);
    $sports = isset($_POST["sports"]) ? 1 : 0;
    $arts_culture = isset($_POST["arts_culture"]) ? 1 : 0;
    $technology = isset($_POST["technology"]) ? 1 : 0;
    $community_service = isset($_POST["community_service"]) ? 1 : 0;
    $academic_professional = isset($_POST["academic_professional"]) ? 1 : 0;
    $hear_about_us = test_input($_POST["hear_about_us"]);
    $terms_conditions = isset($_POST["terms_conditions"]) ? 1 : 0;
    $newsletter_subscription = isset($_POST["newsletter_subscription"]) ? 1 : 0;
    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);
    $confirm_password = test_input($_POST["confirm_password"]);

    // Database configuration
    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $dbname = "club";

    // Create a connection to the database
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create the table if it does not exist
    $createTableQuery = "CREATE TABLE IF NOT EXISTS club_registration (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR(100) NOT NULL,
        last_name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        contact_number VARCHAR(20) NOT NULL,
        address TEXT NOT NULL,
        dob DATE NOT NULL,
        gender VARCHAR(10) NOT NULL,
        membership_type VARCHAR(50) NOT NULL,
        emergency_contact_name VARCHAR(100) NOT NULL,
        emergency_contact_number VARCHAR(20) NOT NULL,
        sports TINYINT(1) NOT NULL,
        arts_culture TINYINT(1) NOT NULL,
        technology TINYINT(1) NOT NULL,
        community_service TINYINT(1) NOT NULL,
        academic_professional TINYINT(1) NOT NULL,
        hear_about_us VARCHAR(100),
        terms_conditions TINYINT(1) NOT NULL,
        newsletter_subscription TINYINT(1) NOT NULL,
        username VARCHAR(50),
        password VARCHAR(255)
    )";

    if ($conn->query($createTableQuery) === FALSE) {
        die("Error creating table: " . $conn->error);
    }

    // Prepare and execute the SQL query to insert the data into the database
    $sql = "INSERT INTO club_registration (first_name, last_name, email, contact_number, address, dob, gender, membership_type, emergency_contact_name, emergency_contact_number, sports, arts_culture, technology, community_service, academic_professional, hear_about_us, terms_conditions, newsletter_subscription, username, password) 
            VALUES ('$first_name', '$last_name', '$email', '$contact_number', '$address', '$dob', '$gender', '$membership_type', '$emergency_contact_name', '$emergency_contact_number', $sports, $arts_culture, $technology, $community_service, $academic_professional, '$hear_about_us', $terms_conditions, $newsletter_subscription, '$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Display a success message using JavaScript alert
        echo '<script>alert("Thank you for registering with MIT College Club! Your registration details have been submitted successfully.");</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
<h2><center>MIT College Club Registration Form</center></h2>
    <label for="first_name">Name:</label>
    <input type="text" name="first_name" required>
    <label for="last_name">Last Name:</label>
    <input type="text" name="last_name" required>
    <br><br>
    <label for="email">Email Address:</label>
    <input type="email" name="email" required>
    <br><br>
    <label for="contact_number">Contact Number:</label>
    <input type="text" name="contact_number" required>
    <br><br>
    <label for="address">Address:</label>
    <textarea name="address" rows="4" required></textarea>
    <br><br>
    <label for="dob">Date of Birth:</label>
    <input type="date" name="dob" required>
    <br><br>
    <label>Gender:</label>
    <input type="radio" name="gender" value="Male" required> Male
    <input type="radio" name="gender" value="Female" required> Female
    <input type="radio" name="gender" value="Other" required> Other
    <br><br>
    <label>Club Membership Type:</label>
    <input type="radio" name="membership_type" value="Regular Member" required> Regular Member
    <input type="radio" name="membership_type" value="Premium Member" required> Premium Member
    <input type="radio" name="membership_type" value="Student Member" required> Student Member
    <br><br>
    <label>Emergency Contact Information:</label>
    <br>
    <label for="emergency_contact_name">Name:</label>
    <input type="text" name="emergency_contact_name" required>
    <label for="emergency_contact_number">Contact Number:</label>
    <input type="text" name="emergency_contact_number" required>
    <br><br>
    <label>Interests/Preferences (Select all that apply):</label>
    <br>
    <input type="checkbox" name="sports" value="1"> Sports
    <input type="checkbox" name="arts_culture" value="1"> Arts and Culture
    <input type="checkbox" name="technology" value="1"> Technology
    <input type="checkbox" name="community_service" value="1"> Community Service
    <input type="checkbox" name="academic_professional" value="1"> Academic/Professional
    <br><br>
    
    <label for="hear_about_us">How did you hear about us?</label>
    <input type="text" name="hear_about_us">
    <br><br>
    <label>Terms and Conditions Acceptance:</label>
    <input type="checkbox" name="terms_conditions" required> I have read and agree to the club's terms and conditions.
    <br><br>
    <label>Newsletter Subscription (Optional):</label>
    <input type="checkbox" name="newsletter_subscription"> I would like to receive newsletters and updates from the club.
    <br><br>
    <label>Create an Account (If required for member login):</label>
    <br>
    <label for="username">Username:</label>
    <input type="text" name="username">
    <label for="password">Password:</label>
    <input type="password" name="password">
    <label for="confirm_password">Confirm Password:</label>
    <input type="password" name="confirm_password">
    <br><br>
    <input type="submit" name="submit" value="Submit">
    <center>Or connect with us in Whatsapp</center>
    <a href="https://wa.me/9489960744" ref="whatsapp" target="_blank"><center>Contact Club Office</center></center></a> <br>
    <a href="https://wa.me/6381649403" ref="whatsapp" target="_blank"><center>Contact Club head</center></center></a>
    
</form>

</body>
</html>

