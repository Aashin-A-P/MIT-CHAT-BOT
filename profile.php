<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Profile Card - ChattyBot</title>
    <style>
        /* Your existing styles can be reused or modified here */
/* Your existing styles can be reused or modified here */

/* Main Content Styles */
.contact-main {
    background-color: #f8f8f8;
    padding: 40px;
}
/* Your existing styles can be reused or modified here */

/* Header Styles */
h1,h2,h3,h4,h5,h6{
    font-family:Verdana, Geneva, sans-serif;
}
header {
    background-color: #4a90e2;
    color: white;
    padding: 1rem 0;
    text-align: center;
}

header h1 {
    margin: 0;
    font-size: 2.5rem;
}

nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    justify-content: center;
}

nav ul li {
    margin: 0 20px;
}

nav ul li a {
    text-decoration: none;
    color: white;
    font-size: 1.1rem;
    transition: color 0.3s ease-in-out;
}

nav ul li a:hover {
    color: #cde7ff;
}


.contact-info {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    margin-bottom: 40px;
}

.profile-card {
    background-color: white;
    border-radius: 10px;
    box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
    text-align: center;
    padding: 20px;
    width: 240px;
    transition: transform 0.2s ease-in-out;
}

.profile-card:hover {
    transform: translateY(-5px);
}

.profile-card img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    margin-bottom: 10px;
}

.profile-card h3 {
    margin: 5px 0;
    color: #4a90e2;
    font-size: 1.3rem;
}

.profile-card p {
    margin: 0;
    font-size: 1.1rem;
    color: #777;
}

.profile-social {
    margin-top: 15px;
}

.profile-social a {
    display: inline-block;
    margin: 0 5px;
    transition: transform 0.2s ease-in-out;
}

.profile-social a:hover {
    transform: scale(1.2);
}

.profile-social img {
    width: 24px;
    height: 24px;
}

.contact-form {
    background-color: white;
    border-radius: 10px;
    box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
    padding: 20px;
    text-align: center;
}

.contact-form h3 {
    color: #4a90e2;
    font-size: 1.5rem;
    margin-bottom: 20px;
}

.contact-form label {
    display: block;
    margin-bottom: 5px;
    font-size: 1.1rem;
    color: #555;
}

.contact-form input,
.contact-form textarea {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 15px;
}

.contact-form textarea {
    resize: vertical;
}

.contact-form button {
    background-color: #4a90e2;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
    transition: background-color 0.2s ease-in-out;
}

.contact-form button:hover {
    background-color: #3577c1;
}

.profile-main {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f8f8f8;
}

.profile-card {
    background-color: white;
    border-radius: 20px;
    box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
    text-align: center;
    padding: 20px;
    width: 300px;
}

.profile-card img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    margin-bottom: 10px;
}

.profile-card h3 {
    margin: 5px 0;
    color: #4a90e2;
    font-size: 1.5rem;
}

.profile-card p {
    margin: 0;
    font-size: 1.1rem;
}

.profile-social {
    margin-top: 15px;
}

.profile-social a {
    display: inline-block;
    margin: 0 5px;
}

.profile-social img {
    width: 24px;
    height: 24px;
}
/* Your existing styles can be reused or modified here */

/* Main Content Styles */
.contact-main {
    background-color: #f8f8f8;
    padding: 40px;
}

.contact-info {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    margin-bottom: 40px;
}

.profile-card {
    background-color: white;
    border-radius: 10px;
    box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
    text-align: center;
    padding: 20px;
    width: 240px;
    transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
}

.profile-card:hover {
    transform: translateY(-5px);
    box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.15);
}

.profile-card img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    margin-bottom: 10px;
    transition: transform 0.2s ease-in-out;
}

.profile-card:hover img {
    transform: scale(1.05);
}

.profile-card h3 {
    margin: 5px 0;
    color: #4a90e2;
    font-size: 1.3rem;
}

.profile-card p {
    margin: 0;
    font-size: 1.1rem;
    color: #777;
}

.profile-social {
    margin-top: 15px;
}

.profile-social a {
    display: inline-block;
    margin: 0 5px;
    transition: transform 0.2s ease-in-out;
}

.profile-social a:hover {
    transform: scale(1.2);
}

.profile-social img {
    width: 24px;
    height: 24px;
}

.contact-form {
    background-color: white;
    border-radius: 10px;
    box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
    padding: 20px;
    text-align: center;
}

.contact-form h3 {
    color: #4a90e2;
    font-size: 1.5rem;
    margin-bottom: 20px;
}

.contact-form label {
    display: block;
    margin-bottom: 5px;
    font-size: 1.1rem;
    color: #555;
}

.contact-form input,
.contact-form textarea {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 15px;
    font-size: 1rem;
}

.contact-form textarea {
    resize: vertical;
}

.contact-form button {
    background-color: #4a90e2;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
    transition: background-color 0.2s ease-in-out;
    font-size: 1.1rem;
}

.contact-form button:hover {
    background-color: #3577c1;
}


    </style>

</head>
<body>
    <header>
        <h1>MIT ChatBot</h1>
        <nav>
            <ul>
                <li><a href="homepage/home.php">Home</a></li>
                <li><a href="signup.php">Sign Up</a></li>
           
           
            </ul>
        </nav>
    </header>
    <main class="contact-main">
        <center><h2>Contact Us</h2></center>
        <div class="contact-info">
            <!-- Profile Card 1 -->
            <div class="profile-card">
                <img src="ravi.jpg" alt="Profile Picture">
                <h3>S Ravishankar</h3>
                <p>Web Developer</p>
                <div class="profile-social">
                    <a href="https://www.linkedin.com/in/ravishankar-s-84523b256"><img src="LINKEDIN 2.png" alt="LinkedIn"></a>
                    
                    <a href="https://wa.me/6381649403" ref="whatsapp" target="_blank"><img src="whatsapp.jpeg" alt="WhatsApp"></a>
                    
                  
                </div>
            </div>
            
            <!-- Profile Card 2 -->
            <div class="profile-card">
                <img src="aashin.jpg" alt="Profile Picture">
                <h3>A P Aashin</h3>
                <p>Web Developer</p>
                <div class="profile-social">
                    <a href="https://www.linkedin.com/in/aashin-a-p-21jan2005 "><img src="LINKEDIN 2.png" alt="LinkedIn"></a>
                    
                    <a href="https://wa.me/9489960744" ref="whatsapp" target="_blank"><img src="whatsapp.jpeg" alt="WhatsApp"></a>
                  
                </div>
            </div>
            
            <!-- Profile Card 3 -->
            <div class="profile-card">
                <img src="sasi.jpg" alt="Profile Picture">
                <h3>R Sasi Kumar</h3>
                <p>Web Developer</p>
                <div class="profile-social">
                    <a href="https://www.linkedin.com/in/sasikumar-r-96390b271"><img src="LINKEDIN 2.png" alt="LinkedIn"></a>
                    
                    <a href="https://wa.me/6374560135" ref="whatsapp" target="_blank"><img src="whatsapp.jpeg" alt="WhatsApp"></a>
                  
                </div>
            </div>
            
            <!-- Profile Card 4 -->
            <div class="profile-card">
                <img src="tamil5.jpg" alt="Profile Picture">
                <h3>V Tamilselvan</h3>
                <p>Web Developer</p>
                <div class="profile-social">
                    <a href="https://www.linkedin.com/in/tamilselvan-v-447b67281 "><img src="LINKEDIN 2.png" alt="LinkedIn"></a>
                    
                    <a href="https://wa.me/6381055450" ref="whatsapp" target="_blank"><img src="whatsapp.jpeg" alt="WhatsApp"></a>
                  
                </div>
            </div>
        </div>
        
    </main>
    <footer>
        <center><p>&copy; 2023 MIT ChatBot. All rights reserved.</p></center>
    </footer>
</body>
</html>
