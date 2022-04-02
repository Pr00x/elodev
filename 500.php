<!DOCTYPE html>
<html lang='en' dir='ltr'>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, minimum-scale=1'>
    <meta name='description' content='EloDev is an online programming and cybersecurity platform. The platform is intended for all people who are interested in new technologies.'>
    <title>EloDev | 500</title>
    <link rel='stylesheet' href='/css/bootstrap.css'>
    <link rel='stylesheet' href='/css/devicon.css'>
    <link rel='stylesheet' href='/css/style.css'>
    <link rel='stylesheet' href='/css/challenges.css'>
    <link rel='icon' href='/img/icon.png'>
  </head>
  <body>
    <main>
      <div id='particles-js'>
        <section class='center'>
          <div class='container err'>
            <a href='/'><h1 class='website-color title'>Elo<span id='white'>Dev</span></h1><div class='blink'></div></a>
            <section class='err-section'>
              <div class='row'>
                <h1 style='margin-bottom: 50px;'>500: Internal Server Error</h1><input type='button' class='color-btn' value='Home' onclick='window.location.href="/"' style='max-width: 40%;'>
              </div>
            </section>
        </section>
        </div>
      </div>
    </main>
    <script src='/js/particles.js'></script>
    <script src='/js/app.js'></script>
  </body>
</html>

<?php http_response_code(500); die(); ?>
