<!DOCTYPE html>
<html>
<head>
    <title>MIT Services</title>
    <link rel="stylesheet" href="office.css">
    <style>
    

    input[type="text"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: none;
        border-radius: 5px;
    }

    input[type="submit"] {
        background-color: #03e9f4;
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    input[type="submit"]:hover {
        background-color: #02c4e9;
    }
    .done {
        display:grid;
        margin-top:80px;
    }
    button {
        background-color: transparent;
        border:none;
    }

    </style>
</head>
<body>

<div class="container">
<center><h1 id="typing-text"></h1></center>
    <form action="" method="post">
        <!-- Section buttons -->
        <div class="love">
            <div class='lo'>
            <button type="submit" name="but1" value="clean_data"><span class="button">MIT Cleaner</span></button><br><br></div>
        <div class='lo'> 
        <button type="submit" name="but1" value="bookings"><span class="button">MIT Room Cleaning</span></button>
</div>
<div class='lo'>
<button type="submit" name="but1" value="complaints"><span class="button">Complaints of MIT</span></button><br><br></div>
        <div class='lo'>
        <button type="submit" name="but1" value="transportation_requests"><span class="button">MIT Transport</span></button>
</div>
<div class='lo'>
<button type="submit" name="but1" value="club_registration"><span class="button">MIT Club</span></button>
</div>
</div>
</div>
        <!-- <div class='done'>
        <button type="submit" name="but1" value="clean_data">MIT Cleaner</button>
        <button type="submit" name="but1" value="bookings">MIT Room Cleaning</button>
        <button type="submit" name="but1" value="complaints">Complaints of MIT</button>
        <button type="submit" name="but1" value="transportation_requests">MIT Transport</button>
        <button type="submit" name="but1" value="club_registration">MIT Club</button>
</div> -->
    </form>
</div>

</body>
<script>
const textElement = document.getElementById("typing-text");
const textToType = "Office Works Login......!";
let index = 0;

function typeText() {
    if (index < textToType.length) {
        textElement.textContent += textToType.charAt(index);
        index++;
        setTimeout(typeText, 100);
    } else {
        displayRandomGreeting();
    }
}
window.addEventListener('load', () => {
    typeText();
});
    </script>

</html>

<?php
if(isset($_POST['but1'])){
    session_start();
    $_SESSION['table']=$_POST['but1'];
    $table=$_SESSION['table'];
    echo "<div class='container'>
            <form action='valid.php' method='post'>
                <input type='text' name='user'placeholder='Officer Username' required><br>
                <input type='password' name='pass' placeholder='Password' required><br>
                <input type='submit' value=$table name='submit'>
            </form>
          </div>";   
}
?>
