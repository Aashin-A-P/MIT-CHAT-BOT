
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MIT Library Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-image: url(https://images.pexels.com/photos/206359/pexels-photo-206359.jpeg?cs=srgb&dl=pexels-pixabay-206359.jpg&fm=jpg);
        }

        h1 {
            text-align: center;
        }

        form {
            max-width: 300px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
        div{
            background-color: white;
            margin-left: auto; /* Set the left margin to auto to center the div */
  margin-right: auto; /* Set the right margin to auto to center the div */
  width:50%;
        }
    </style>
</head>
<body>
<div>
    <h1>MIT Library Login</h1>

    <form action="borrow_form.php" method="post">
        <label for="library_id">Library ID:</label>
        <input type="text" id="library_id" name="library_id" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" name ='loggedin' value="Login">
    </form>
    </div>
</body>
</html>
