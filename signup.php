<html>
<head>
  <meta charset="utf-8">
  <title>MIT Chatbot: Sign In</title>
  <link rel="stylesheet" href="signup.css">
  <script>function change()
{
  document.getElementById('l').classList.toggle('z');
  document.getElementById('s').classList.toggle('z');
}</script>
</head>

<body>
<?php
    // Include the validation and database connection file
    include 'adduserpass.php';

    // Check if the form is submitted for registration
    if (isset($_POST['signup'])) {
        save();
    }

    // Check if the form is submitted for login
    if (isset($_POST['login'])) {
        check();
    }
    ?>
  <div class="login-root">
    <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
      <div class="loginbackground box-background--white padding-top--64">
        <div class="loginbackground-gridContainer">
          <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
            <div class="box-root" style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
            </div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
            <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
            <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
            <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
            <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
            <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
            <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
            <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
            <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
          </div>
        </div>
      </div>
      <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
        <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
          <h1><a href="about.php" rel="dofollow">MIT Chatbot</a></h1>
        </div>
    <div id="l">
        <div class="formbg-outer">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
              <span class="padding-bottom--15">Sign in to your account</span>
              <form id="login" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="field padding-bottom--24">
                <label for="un1">Registration Number </label>
                  <input class="b" type="text" name="un1" id="un1" placeholder="Enter your Registration Number"><br><br>
                  <label for="em">Email</label>
                  <input type="email" name="em" id="em" placeholder="Enter your Email Address">
                </div>
                <div class="field padding-bottom--24">
                  <div class="grid--50-50">
                    <label for="pw1">Password</label>
                    <div class="reset-pass">
                      <a href="#">Forgot your password?</a>
                    </div>
                  </div>
                  <input type="password" name="pw1" id="pw1">
                </div>
                <div class="field field-checkbox padding-bottom--24 flex-flex align-center">
                  <label for="checkbox">
                    <input type="checkbox" name="checkbox"> Stay signed in for a week
                  </label>
                </div>
                <div class="field padding-bottom--24">
                  <input type="submit" name="login" value="Continue">
                </div>
                </form>
            </div>
          </div>
          <div class="footer-link padding-top--24">
            <span>Don't have an account? <a href="javascript:void(0);" onclick="change()">Sign up</a></span>
            <div class="listing padding-top--24 padding-bottom--24 flex-flex center-center">
              <span><a href="about.php">© MIT Chatbot</a></span>
              <span><a href="profile.php">Contact</a></span>
              <span><a href="privacy.php">Privacy & terms</a></span>
            </div>
          </div>
        </div>
    </div>
    <div class="z" id="s">
        <div class="formbg-outer">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
              <span class="padding-bottom--15">Create a New Account</span>
              <form id="signup" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="field padding-bottom--24">
                <label for="un">Registration Number </label>
                  <input class="b" type="text" name="un" id="un" placeholder="Enter your Registration Number"><br><br>
                  <label for="em">Email</label>
                  <input type="email" name="em" id="em" placeholder="Enter your Email Address">
                </div>
                <div class="field padding-bottom--24">
                  <div class="grid--50-50">
                    <label for="pw">Password</label>
                  </div>
                  <input type="password" name="pw" id="pw">
                </div>
                <div class="field padding-bottom--24">
                  <div class="grid--50-50">
                    <label for="cpw">Confirm Password</label>
                  </div>
                  <input type="password" name="cpw" id="cpw">
                </div>
                <div class="field field-checkbox padding-bottom--24 flex-flex align-center">
                  <label for="checkbox">
                    <input type="checkbox" name="checkbox"> Stay signed in for a week
                  </label>
                </div>
                <div class="field padding-bottom--24">
                  <input type="submit" name="signup" value="Continue">
                </div>
                </form>
            </div>
          </div>
          <div class="footer-link padding-top--24">
            <span>Already an user? <a href="javascript:void(0);" onclick="change()">Sign in</a></span>
            <div class="listing padding-top--24 padding-bottom--24 flex-flex center-center">
              <span><a href="about.php">© MIT Chatbot</a></span>
              <span><a href="profile.php">Contact Us</a></span>
              <span><a href="privacy.php">Privacy & terms</a></span>
            </div>
          </div>
        </div>
    </div>
      </div>
    </div>
  </div>
  
</body>


</html>