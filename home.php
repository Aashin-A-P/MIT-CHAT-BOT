


<!DOCTYPE html>
<!-- Coding by CodingNepal || www.codingnepalweb.com -->
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simple Responsive Website in HTML CSS</title>
    <link rel="stylesheet" href="style.css" />
    <script src="../custom-scripts.js" defer></script>
  </head>
  <body>
    <main>
      <!-- Header Start -->
      <header>
        <nav class="nav container">
          <h2 class="nav_logo"><a href="#">MIT CHATBOT</a></h2>

          <ul class="menu_items">
            <img src="images/times.svg" alt="timesicon" id="menu_toggle" />
            <li><a href="home.php" class="nav_link">Home</a></li>
            <li><a href="..\office.php" class="nav_link">Office Works</a></li>
            <li><a href="..\service.php" class="nav_link">Service</a></li>
            
            <li><a href="..\profile.php" class="nav_link">Contact</a></li>
          </ul>
          <img src="images/bars.svg" alt="timesicon" id="menu_toggle" />
        </nav>
      </header>
      <!-- Header End -->

      <!-- Hero Start -->
      <section class="hero">
        <div class="row container">
          <div class="column">
          <h2>Meet Mitchat Bot: Your MIT Information and Services Companion</h2>
<p>Welcome to the future of MIT interaction with Mitchat Bot, your dedicated AI assistant tailored specifically for the Massachusetts Institute of Technology (MIT) community. Mitchat Bot is here to streamline your MIT experience by offering a wide range of services and information at your fingertips.</p>
            <div class="buttons">
            <a href="..\signup.php"><button class="btn">Try Chat</button></a>
              <button class="btn"><a href="..\profile.php">Contact Us</a></button>
            </div>
          </div>
          <div class="column">
            <img src="images/hero.png" alt="heroImg" class="hero_img" />
          </div>
        </div>
        <img src="images/bg-bottom-hero.png" alt="" class="curveImg" />
      </section>
      <!-- Hero End-->
    </main>

    <script>
      const header = document.querySelector("header");
      const menuToggler = document.querySelectorAll("#menu_toggle");

      menuToggler.forEach(toggler => {
        toggler.addEventListener("click", () => header.classList.toggle("showMenu"));
      });
    </script>
  </body>
</html>
