<!DOCTYPE html>
<html>
<head>
    <title>Services Page</title>
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
            <button type="submit" name="mit_cleaner" value="MIT Cleaner"><span class="button">MIT Cleaner</span></button><br><br></div>
        <div class='lo'> 
        <button type="submit" name="outpass_login" value="Outpass Login"><span class="button">Outpass Login</span></button>
</div>
<div class='lo'>
<button type="submit" name="complaint_mit" value="Complaint MIT"><span class="button">Complaints of MIT</span></button><br><br></div>
        <div class='lo'>
        <button type="submit" name="mit_transport" value="MIT Transport"><span class="button">MIT Transport</span></button>
</div>
<div class='lo'>
<button type="submit" name="mit_club" value="MIT Club"><span class="button">MIT Club</span></button>
</div>
<div class='lo'>
<button type="submit" name="room_cleaning" value="Room Cleaning"><span class="button">MIT Room Service</span></button>
</div>
</div>
</div>
</form>
</div>

</body>
<script>
const textElement = document.getElementById("typing-text");
const textToType = "Our Services......!";
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





    
    <?php
    if (isset($_POST['mit_cleaner'])) {
        header("Location: mit_cleaner.php");
        exit;
    } elseif (isset($_POST['outpass_login'])) {
        header("Location: outpass_login.php");
        exit;
    } elseif (isset($_POST['complaint_mit'])) {
        header("Location: complaint_mit.php");
        exit;
    } elseif (isset($_POST['mit_transport'])) {
        header("Location: mit_transport.php");
        exit;
    } elseif (isset($_POST['mit_club'])) {
        header("Location: mit_club.php");
        exit;
    } elseif (isset($_POST['room_cleaning'])) {
        header("Location: room_cleaning.php");
        exit;
    }
    ?>
</body>
</html>
