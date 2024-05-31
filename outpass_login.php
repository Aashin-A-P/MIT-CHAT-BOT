<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url("https://wallpaperaccess.com/full/114323.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            width: 350px;
            margin-right: 20px; /* Add margin to create space between containers */
        }

        h2 {
            text-align: center;
        }

        form {
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background: #e4fc08;
            background-image: -webkit-linear-gradient(top, #e4fc08, #c2318d);
            background-image: -moz-linear-gradient(top, #e4fc08, #c2318d);
            background-image: -ms-linear-gradient(top, #e4fc08, #c2318d);
            background-image: -o-linear-gradient(top, #e4fc08, #c2318d);
            background-image: linear-gradient(to bottom, #e4fc08, #c2318d);
            border-radius: 17px;
            font-family: Courier New;
            color: #0f0e0f;
            font-size: 26px;
            padding: 8px 13px 11px 20px;
            text-decoration: none;
            display: block;
            width: 100%;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: #fa3c8e;
            background-image: -webkit-linear-gradient(top, #fa3c8e, #d9bd34);
            background-image: -moz-linear-gradient(top, #fa3c8e, #d9bd34);
            background-image: -ms-linear-gradient(top, #fa3c8e, #d9bd34);
            background-image: -o-linear-gradient(top, #fa3c8e, #d9bd34);
            background-image: linear-gradient(to bottom, #fa3c8e, #d9bd34);
            text-decoration: none;
        }

        .error {
            color: red;
            margin-top: 10px;
            text-align: center;
        }

        .container {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <?php
            $rcRegisteredUsers = array();
            $rcEmails = ['kajeeth@gmail.com', 'arivu@gmail.com'];
            $rcPasswords = ['bhavani', 'thamirabharani'];

            for ($i = 0; $i < count($rcEmails); $i++) {
                $registeredUser = array();
                $registeredUser['email'] = $rcEmails[$i];
                $registeredUser['password'] = password_hash($rcPasswords[$i], PASSWORD_DEFAULT);
                $rcRegisteredUsers[$registeredUser['email']] = $registeredUser;
            }

            $rcErrorMessage = '';

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $rcEmail = $_POST['rc-email'] ?? '';
                $rcPassword = $_POST['rc-password'] ?? '';

                if (!empty($rcEmail) && !empty($rcPassword)) {
                    if (array_key_exists($rcEmail, $rcRegisteredUsers)) {
                        $registered = $rcRegisteredUsers[$rcEmail];

                        if (password_verify($rcPassword, $registered['password'])) {
                            header('Location: rc_display.php');
                            exit();
                        } else {
                            $rcErrorMessage = "Invalid email or password.";
                        }
                    } else {
                        $rcErrorMessage = "Invalid email or password.";
                    }
                } else {
                    $rcErrorMessage = "Please enter both email and password.";
                }
            }
            ?>

            <h2>Login RC</h2>
            <form method="POST" action="">
                <label>Email:</label>
                <input type="email" name="rc-email" required><br><br>
                <label>Password:</label>
                <input type="password" name="rc-password" required><br><br>
                <input type="submit" value="Login">
            </form>

            <?php if (isset($rcErrorMessage)) { ?>
                <p class="error"><?php echo $rcErrorMessage; ?></p>
            <?php } ?>
        </div>

        <div class="login-container">
            <?php
            $studentRegisteredUsers = array();
            

            for ($i = 2022506001; $i <=2022506134; $i++) {
                $registeredUser = array();
                $registeredUser['email'] = $i.'hostel@gmail.com';
                $registeredUser['password'] = password_hash($i, PASSWORD_DEFAULT);
                $studentRegisteredUsers[$registeredUser['email']] = $registeredUser;
            }

            $studentErrorMessage = '';

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $studentEmail = $_POST['student-email'] ?? '';
                $studentPassword = $_POST['student-password'] ?? '';

                if (!empty($studentEmail) && !empty($studentPassword)) {
                    if (array_key_exists($studentEmail, $studentRegisteredUsers)) {
                        $registered = $studentRegisteredUsers[$studentEmail];

                        if (password_verify($studentPassword, $registered['password'])) {
                            header('Location: outpass.php');
                            exit();
                        } else {
                            $studentErrorMessage = "Invalid email or password.";
                        }
                    } else {
                        $studentErrorMessage = "Invalid email or password.";
                    }
                } else {
                    $studentErrorMessage = "Please enter both email and password.";
                }
            }
            ?>

            <h2>Login Student</h2>
            <form method="POST" action="">
                <label>Email:</label>
                <input type="email" name="student-email" required><br><br>
                <label>Password:</label>
                <input type="password" name="student-password" required><br><br>
                <input type="submit" value="Login">
            </form>

            <?php if (isset($studentErrorMessage)) { ?>
                <p class="error"><?php echo $studentErrorMessage; ?></p>
            <?php } ?>
        </div>
    </div>
</body>
</html>
