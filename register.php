<?php
  include 'cfg/security.php';

  logged_out($_SESSION, 'home.php');

  global $csrf;
  $csrf = csrf();
?>

<!DOCTYPE html>
<html lang='en' dir='ltr'>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, minimum-scale=1'>
    <meta name='description' content='EloDev | Create an account.'>
    <meta property='og:type' content='website'>
    <meta property='og:url' content='https://elodev.net'>
    <meta property='og:title' content='Register | EloDev | Programming And Cybersecurity Platform'>
    <meta property='og:description' content='EloDev | Sign in to your account.'>
    <meta property='og:image' content='/img/elodev.png'>
    <meta property='twitter:site' content='@elodev'>
    <meta property='twitter:card' content='summary_large_image'>
    <meta property='twitter:url' content='https://elodev.net'>
    <meta property='twitter:title' content='Register | EloDev | Programming And Cybersecurity Platform'>
    <meta property='twitter:description' content='EloDev | Create an account.'>
    <meta property='twitter:image' content='/img/elodev.png'>
    <title>Register | EloDev | Programming And Cybersecurity Platform</title>
    <link rel='stylesheet' href='/css/bootstrap.css'>
    <link rel='stylesheet' href='/css/devicon.css'>
    <link rel='stylesheet' href='/css/style.css'>
    <link rel='stylesheet' href='/css/login.css'>
    <link rel='stylesheet' href='/css/register.css'>
    <link rel='icon' href='/img/icon.png'>
  </head>
  <body>
    <main>
      <div id='particles-js'>
        <section class='hero-section'>
          <div class='container'>
            <a href='/'><h1 class='website-color title'>Elo<span id='white'>Dev</span></h1><div class='blink'></div></a>
            <div class='login'>
              <div class='register-form-div'>
                <form class='register-form' method="POST" autocomplete='off'>
                  <h3 class='heading'>Register</h3>
                  <p id='err'></p>
                  <input type='email' name='email' maxlength='128' placeholder='Email' autocomplete="off" required>
                  <input type='text' name='username' maxlength='32' placeholder='Username' required>
                  <input type='text' name='name' maxlength='128' placeholder='Full name' required>
                  <input type='password' name='password' maxlength='256' placeholder='Password' required>
                  <input type='password' name='confirm_password' maxlength='256' placeholder='Confirm password' required>
                  <input type='hidden' name='_csrf' value='<?php echo $csrf; ?>'>
                  <div class='btn'>
                    <button type='submit' class='color-btn' id='login'>Register</button>
                  </div>
                </form>
                <div class='register'>
                  <p>Already have an account?</p>
                  <span class='arrow'><b>-></b></span>
                  <a href="/login.php">Login</a>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </main>
    <script src='/js/font-awesome.js'></script>
    <script src='/js/particles.js'></script>
    <script src='/js/app.js'></script>
    <script src='/js/register.js'></script>
  </body>
</html>
