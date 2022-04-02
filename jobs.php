<?php
  include 'cfg/security.php';

  logged_in($_SESSION, 'login.php', $secKey);
  global $html;
  $html = '<h1>No jobs to show.</h1><br><br><br><br><input type=\'button\' class=\'color-btn\' value=\'Home\' onclick=\'window.location.href="/home.php"\' style=\'max-width: 40%; margin: auto;\'>';
?>

<!DOCTYPE html>
<html lang='en' dir='ltr'>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, minimum-scale=1'>
    <meta name='description' content='EloDev is an online programming and cybersecurity platform. The platform is intended for all people who are interested in new technologies.'>
    <title>EloDev | Jobs</title>
    <link rel='stylesheet' href='/css/bootstrap.css'>
    <link rel='stylesheet' href='/css/devicon.css'>
    <link rel='stylesheet' href='/css/style.css'>
    <link rel='stylesheet' href='/css/academy.css'>
    <link rel='icon' href='/img/icon.png'>
  </head>
  <body>
    <?php include 'header.php'; ?>
    <main>
      <div id='particles-js'>
        <section class='hero-section'>
          <div class='container'>
            <a href='/'><h1 class='website-color title'>Elo<span id='white'>Dev</span></h1><div class='blink'></div></a>
            <section class='jobs-section'>
              <div class='hero-content-div'>
                <h3 class='heading'><svg class='icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512' style='padding: 0;'><path d='M448 32C465.7 32 480 46.33 480 64C480 81.67 465.7 96 448 96H80C71.16 96 64 103.2 64 112C64 120.8 71.16 128 80 128H448C483.3 128 512 156.7 512 192V416C512 451.3 483.3 480 448 480H64C28.65 480 0 451.3 0 416V96C0 60.65 28.65 32 64 32H448zM416 336C433.7 336 448 321.7 448 304C448 286.3 433.7 272 416 272C398.3 272 384 286.3 384 304C384 321.7 398.3 336 416 336z'></svg><b>Jobs</b></h3>
              </div>
              <div class='row'>
                <?php echo $html; ?>
              </div>
            </section>
          </div>
        </section>
        </div>
      </div>
    </main>
    <script src='/js/particles.js'></script>
    <script src='/js/app.js'></script>
  </body>
</html>
