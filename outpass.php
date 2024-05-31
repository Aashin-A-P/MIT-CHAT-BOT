<!DOCTYPE html>
<html>
<head>
    <title>Outpass Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background: rgb(148,188,233);
            background: radial-gradient(circle, rgba(148,188,233,1) 0%, rgba(0,0,0,1) 61%);
        }

        h1, h2 {
            text-align: center;
        }

        p {
            text-align: justify;
        }

        form {
            margin: 0 auto;
            max-width: 400px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="date"],
        input[type="time"],
        input[type="datetime-local"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .center {
            text-align: center;
        }


        label,h3 {
            color:#33FFFF;
        }
        h2 {
            color:#FFCC00;
        }

        .submitted-content {
            margin: 20px auto;
            max-width: 400px;
            background-color: white;
            padding: 20px;
            opacity: 0.8;
            color: #33FFFF;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class='block1'>
        <h1 style='color:white;'>Outpass Request</h1>
        <p style='color:#33FFFF;'>An outpass is an official permission granted to a student to leave the institution's premises for a specific period.<br> It is necessary to obtain an outpass before leaving the campus to ensure safety and accountability.</p>
        <p><span style='color:red;'>Warning</span>:<br><span style='color:#33FFFF;'> Failure to obtain a valid outpass may result in disciplinary actions or penalties imposed by the institution.</span></p>
    </div><br><br>
    <hr>
    <div class="center">
        <h2>ANNA UNIVERSITY<br><h3>MIT CAMPUS<br>Chrompet,Chennai-600 044</h3></h2>
    </div>
    <h2>Outpass Request Form</h2>
    <hr>
    <form  action=''  method='post'>
        <label>Name:</label>
        <input type="text" name="name" id="name" required>

        <label>Reg. No:</label>
        <input type="text" name="regNo" id="regno" required>

        <label>Email:</label>
        <input type="email" name="email" id="email" required>

        <label>Branch:</label>
        <input type="text" name="branch" id="branch" required>

        <label>Block No.:</label>
        <input type="text" name="blockNo" id="block" required>

        <label>Date:</label>
        <input type="date" name="date" id="date" required>

        <label>Place of Visit:</label>
        <input type="text" name="placeOfVisit" id="place" required>

        <label>No. of Days Proposed to Stay:</label>
        <input type="number" name="numberOfDays" id="days" required>

        <label>Time Out:</label>
        <input type="time" name="timeOut" id="time" required>

        <label>Date & Time of Return:</label>
        <input type="datetime-local" name="dateTimeOfReturn" id='retur' required>

        <label>Contact Number:</label>
        <input type="text" name="contactNumber" id="contact" required>

        <label>Parent Phone Number:</label>
        <input type="text" name="phoneNumber" id="parent" required>

        <input type="submit" value="Submit">
        
    </form>

    <div id="submitted-content" class="submitted-content" id='response'></div>

    <script>
        function answer() {
            try {
                var name = document.getElementById('name').value;
                if (!name) {
                    throw new Error("Name is required");
                }
                var ans = `<h4 style='color:red;'>Dear <span style='color:#33FFFF;'>${name}</span>, your outpass is under verification by RC.<br> Please wait for a while or you can view the website for some other time in order to check the status of it.</h4>`;
                document.getElementById('response').innerHTML = ans;
            } catch (error) {
                document.getElementById('response').innerHTML = `<h4 style='color:red;'>Error: ${error.message}</h4>`;
            }
        }
    </script>
    <script type="text/javascript"
          src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js">
        </script>
        <script type="text/javascript">
            (function(){
            emailjs.init("MBeYY-MyrqmKQwgs6");
          })();
          function sendotp(e,d)
          {
            const ser="service_55pmb5y";
            const temp="template_21td48q";
            param={email:d,message:e};
            emailjs.send(ser,temp,param);
            alert('Outpass submitted..!');
          }
          </script>
    <?php
        
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize form data
    $name = sanitize($_POST['name']);
    $regNo = sanitize($_POST['regNo']);
    $email = sanitize($_POST['email']);
    $branch = sanitize($_POST['branch']);
    $blockNo = sanitize($_POST['blockNo']);
    $placeOfVisit = sanitize($_POST['placeOfVisit']);
    $numberOfDays = sanitize($_POST['numberOfDays']);
    $contactNumber = sanitize($_POST['contactNumber']);
    $phoneNumber = sanitize($_POST['phoneNumber']);

    // Combine details with commas
    $details = "Name: " . $name . ", " .
               "Reg. No: " . $regNo . ", " .
               "Email: " . $email . ", " .
               "Branch: " . $branch . ", " .
               "Block No.: " . $blockNo . ", " .
               "Place of Visit: " . $placeOfVisit . ", " .
               "No. of Days Proposed to Stay: " . $numberOfDays . ", " .
               "Contact Number: " . $contactNumber . ", " .
               "Parent Phone Number: " . $phoneNumber;
               echo '<script>sendotp("'.$details.'","'.$email.'")</script>';
    // Create database connection
    $conn = mysqli_connect('localhost', 'root', '', 'ravi');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if table exists, create if not
    $show = "SHOW TABLES LIKE 'ravi'";
    $result = mysqli_query($conn, $show);

    if (mysqli_num_rows($result) == 0) {
        $query = 'CREATE TABLE ravi (register_no INT NOT NULL, details VARCHAR(2000) NOT NULL)';
        $result = mysqli_query($conn, $query);

        if (!$result) {
            echo "Error creating table: " . mysqli_error($conn);
            mysqli_close($conn);
            exit;
        }
    }

    // Prepare and execute the insertion query
    $content = "INSERT INTO ravi(register_no, details) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $content);
    mysqli_stmt_bind_param($stmt, "ss", $regNo, $details);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "Data inserted successfully.";
    } else {
        echo "Error inserting data: " . mysqli_error($conn);
    }

    // Close the statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

// Function to sanitize input data
function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    return $data;
}
?>

</body>
</html>