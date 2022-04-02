<!DOCTYPE html>
<html lang='en' dir='ltr'>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, minimum-scale=1'>
    <meta name='description' content='EloDev is a lightweight online programming and cybersecurity platform. The platform is intended for all people who are interested in new technologies.'>
    <meta property='og:type' content='website'>
    <meta property='og:url' content='https://elodev.net'>
    <meta property='og:title' content='EloDev | Programming And Cybersecurity Platform'>
    <meta property='og:description' content='EloDev is a lightweight online programming and cybersecurity platform. The platform is intended for all people who are interested in new technologies.'>
    <meta property='og:image' content='/img/elodev.png'>
    <meta property='twitter:site' content='@elodev'>
    <meta property='twitter:card' content='summary_large_image'>
    <meta property='twitter:url' content='https://elodev.net'>
    <meta property='twitter:title' content='EloDev | Programming And Cybersecurity Platform'>
    <meta property='twitter:description' content='EloDev is a lightweight online programming and cybersecurity platform. The platform is intended for all people who are interested in new technologies.'>
    <meta property='twitter:image' content='/img/elodev.png'>
    <title>EloDev | Programming And Cybersecurity Platform</title>
    <link rel='stylesheet' href='/css/devicon.css'>
    <link rel='stylesheet' href='/css/bootstrap.css'>
    <link rel='stylesheet' href='/css/style.css'>
    <link rel='icon' href='/img/icon.png'>
    <link rel='icon' href='/img/icon.png'>
  </head>
  <body>
    <header class='index-header'>
      <div class='container'>
        <div class='row'>
          <div class='col-md-6'>
            <nav class='logo'>
              <a href='/'>
                <span></span>
                <h3 class='website-color'>Elo<span id='white'>Dev</span></h3><div class='blink-logo'></div>
              </a>
            </nav>
          </div>
          <div class='col-md-6'>
            <nav class='buttons'>
              <ul class='website-color'>
                <?php if(session_status() === 1) { session_name('elodev_session'); session_start(); } if(!isset($_SESSION['token'], $_SESSION['email'], $_SESSION['username'], $_SESSION['name'])) { ?>
                  <a href='/academy.php'><li><svg class='header-icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 512' style='padding: 0;'><path d='M128 96h384v256h64V80C576 53.63 554.4 32 528 32h-416C85.63 32 64 53.63 64 80V352h64V96zM624 384h-608C7.25 384 0 391.3 0 400V416c0 35.25 28.75 64 64 64h512c35.25 0 64-28.75 64-64v-16C640 391.3 632.8 384 624 384zM365.9 286.2C369.8 290.1 374.9 292 380 292s10.23-1.938 14.14-5.844l48-48c7.812-7.813 7.812-20.5 0-28.31l-48-48c-7.812-7.813-20.47-7.813-28.28 0c-7.812 7.813-7.812 20.5 0 28.31l33.86 33.84l-33.86 33.84C358 265.7 358 278.4 365.9 286.2zM274.1 161.9c-7.812-7.813-20.47-7.813-28.28 0l-48 48c-7.812 7.813-7.812 20.5 0 28.31l48 48C249.8 290.1 254.9 292 260 292s10.23-1.938 14.14-5.844c7.812-7.813 7.812-20.5 0-28.31L240.3 224l33.86-33.84C281.1 182.4 281.1 169.7 274.1 161.9z'/></svg>Academy</li></a>
                  <a href='/register.php'><li><svg class='header-icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 512'><path d='M224 256c70.7 0 128-57.31 128-128S294.7 0 224 0C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3C0 496.5 15.52 512 34.66 512h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304zM616 200h-48v-48C568 138.8 557.3 128 544 128s-24 10.75-24 24v48h-48C458.8 200 448 210.8 448 224s10.75 24 24 24h48v48C520 309.3 530.8 320 544 320s24-10.75 24-24v-48h48C629.3 248 640 237.3 640 224S629.3 200 616 200z'/></svg>Register</li></a>
                  <a href='/login.php'><li><svg class='header-icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'><path d='M416 32h-64c-17.67 0-32 14.33-32 32s14.33 32 32 32h64c17.67 0 32 14.33 32 32v256c0 17.67-14.33 32-32 32h-64c-17.67 0-32 14.33-32 32s14.33 32 32 32h64c53.02 0 96-42.98 96-96V128C512 74.98 469 32 416 32zM342.6 233.4l-128-128c-12.51-12.51-32.76-12.49-45.25 0c-12.5 12.5-12.5 32.75 0 45.25L242.8 224H32C14.31 224 0 238.3 0 256s14.31 32 32 32h210.8l-73.38 73.38c-12.5 12.5-12.5 32.75 0 45.25s32.75 12.5 45.25 0l128-128C355.1 266.1 355.1 245.9 342.6 233.4z'/></svg>Login</li></a>
                <?php } else { ?>
                  <a href='/home.php'><li><svg class='header-icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 576 512'><path d='M511.8 287.6L512.5 447.7C512.5 450.5 512.3 453.1 512 455.8V472C512 494.1 494.1 512 472 512H456C454.9 512 453.8 511.1 452.7 511.9C451.3 511.1 449.9 512 448.5 512H392C369.9 512 352 494.1 352 472V384C352 366.3 337.7 352 320 352H256C238.3 352 224 366.3 224 384V472C224 494.1 206.1 512 184 512H128.1C126.6 512 125.1 511.9 123.6 511.8C122.4 511.9 121.2 512 120 512H104C81.91 512 64 494.1 64 472V360C64 359.1 64.03 358.1 64.09 357.2V287.6H32.05C14.02 287.6 0 273.5 0 255.5C0 246.5 3.004 238.5 10.01 231.5L266.4 8.016C273.4 1.002 281.4 0 288.4 0C295.4 0 303.4 2.004 309.5 7.014L416 100.7V64C416 46.33 430.3 32 448 32H480C497.7 32 512 46.33 512 64V185L564.8 231.5C572.8 238.5 576.9 246.5 575.8 255.5C575.8 273.5 560.8 287.6 543.8 287.6L511.8 287.6z'/></svg>Home</li></a>
                  <a href='/academy.php'><li><svg class='header-icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 512' style='padding: 0;'><path d='M128 96h384v256h64V80C576 53.63 554.4 32 528 32h-416C85.63 32 64 53.63 64 80V352h64V96zM624 384h-608C7.25 384 0 391.3 0 400V416c0 35.25 28.75 64 64 64h512c35.25 0 64-28.75 64-64v-16C640 391.3 632.8 384 624 384zM365.9 286.2C369.8 290.1 374.9 292 380 292s10.23-1.938 14.14-5.844l48-48c7.812-7.813 7.812-20.5 0-28.31l-48-48c-7.812-7.813-20.47-7.813-28.28 0c-7.812 7.813-7.812 20.5 0 28.31l33.86 33.84l-33.86 33.84C358 265.7 358 278.4 365.9 286.2zM274.1 161.9c-7.812-7.813-20.47-7.813-28.28 0l-48 48c-7.812 7.813-7.812 20.5 0 28.31l48 48C249.8 290.1 254.9 292 260 292s10.23-1.938 14.14-5.844c7.812-7.813 7.812-20.5 0-28.31L240.3 224l33.86-33.84C281.1 182.4 281.1 169.7 274.1 161.9z'/></svg>Academy</li></a>
                  <a href='/challenges.php'><li><svg class='header-icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'><path d='M64 496C64 504.8 56.75 512 48 512h-32C7.25 512 0 504.8 0 496V32c0-17.75 14.25-32 32-32s32 14.25 32 32V496zM476.3 0c-6.365 0-13.01 1.35-19.34 4.233c-45.69 20.86-79.56 27.94-107.8 27.94c-59.96 0-94.81-31.86-163.9-31.87C160.9 .3055 131.6 4.867 96 15.75v350.5c32-9.984 59.87-14.1 84.85-14.1c73.63 0 124.9 31.78 198.6 31.78c31.91 0 68.02-5.971 111.1-23.09C504.1 355.9 512 344.4 512 332.1V30.73C512 11.1 495.3 0 476.3 0z'/></svg>
    Challenges</li></a>
                  <a href='/jobs.php'><li><svg class='header-icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'><path d='M448 32C465.7 32 480 46.33 480 64C480 81.67 465.7 96 448 96H80C71.16 96 64 103.2 64 112C64 120.8 71.16 128 80 128H448C483.3 128 512 156.7 512 192V416C512 451.3 483.3 480 448 480H64C28.65 480 0 451.3 0 416V96C0 60.65 28.65 32 64 32H448zM416 336C433.7 336 448 321.7 448 304C448 286.3 433.7 272 416 272C398.3 272 384 286.3 384 304C384 321.7 398.3 336 416 336z'/></svg>Jobs</li></a>
                  <a href='/logout.php'><li><svg class='header-icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'><path d='M160 416H96c-17.67 0-32-14.33-32-32V128c0-17.67 14.33-32 32-32h64c17.67 0 32-14.33 32-32S177.7 32 160 32H96C42.98 32 0 74.98 0 128v256c0 53.02 42.98 96 96 96h64c17.67 0 32-14.33 32-32S177.7 416 160 416zM502.6 233.4l-128-128c-12.51-12.51-32.76-12.49-45.25 0c-12.5 12.5-12.5 32.75 0 45.25L402.8 224H192C174.3 224 160 238.3 160 256s14.31 32 32 32h210.8l-73.38 73.38c-12.5 12.5-12.5 32.75 0 45.25s32.75 12.5 45.25 0l128-128C515.1 266.1 515.1 245.9 502.6 233.4z'/></svg>Logout</li></a>
                <?php } ?>
              </ul>
            </nav>
            <div id='bars-btn'><svg id='bars' class='header-icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512'><path d='M0 96C0 78.33 14.33 64 32 64H416C433.7 64 448 78.33 448 96C448 113.7 433.7 128 416 128H32C14.33 128 0 113.7 0 96zM0 256C0 238.3 14.33 224 32 224H416C433.7 224 448 238.3 448 256C448 273.7 433.7 288 416 288H32C14.33 288 0 273.7 0 256zM416 448H32C14.33 448 0 433.7 0 416C0 398.3 14.33 384 32 384H416C433.7 384 448 398.3 448 416C448 433.7 433.7 448 416 448z'/></svg></div>
          </div>
        </div>
      </div>
      <nav class='responsive-navbar'>
        <div class='navbar-responsive'>
          <?php if(session_status() === 1) { session_name('elodev_session'); session_start(); } if(!isset($_SESSION['token'], $_SESSION['email'], $_SESSION['username'], $_SESSION['name'])) { ?>
            <a href='/academy.php'><h2><svg class='header-icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 512' style='padding: 0;'><path d='M128 96h384v256h64V80C576 53.63 554.4 32 528 32h-416C85.63 32 64 53.63 64 80V352h64V96zM624 384h-608C7.25 384 0 391.3 0 400V416c0 35.25 28.75 64 64 64h512c35.25 0 64-28.75 64-64v-16C640 391.3 632.8 384 624 384zM365.9 286.2C369.8 290.1 374.9 292 380 292s10.23-1.938 14.14-5.844l48-48c7.812-7.813 7.812-20.5 0-28.31l-48-48c-7.812-7.813-20.47-7.813-28.28 0c-7.812 7.813-7.812 20.5 0 28.31l33.86 33.84l-33.86 33.84C358 265.7 358 278.4 365.9 286.2zM274.1 161.9c-7.812-7.813-20.47-7.813-28.28 0l-48 48c-7.812 7.813-7.812 20.5 0 28.31l48 48C249.8 290.1 254.9 292 260 292s10.23-1.938 14.14-5.844c7.812-7.813 7.812-20.5 0-28.31L240.3 224l33.86-33.84C281.1 182.4 281.1 169.7 274.1 161.9z'/></svg>Academy</h2></a>
            <a href='/register.php'><h2><svg class='header-icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 512'><path d='M224 256c70.7 0 128-57.31 128-128S294.7 0 224 0C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3C0 496.5 15.52 512 34.66 512h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304zM616 200h-48v-48C568 138.8 557.3 128 544 128s-24 10.75-24 24v48h-48C458.8 200 448 210.8 448 224s10.75 24 24 24h48v48C520 309.3 530.8 320 544 320s24-10.75 24-24v-48h48C629.3 248 640 237.3 640 224S629.3 200 616 200z'/></svg>Register</h2></a>
            <a href='/login.php'><h2><svg class='header-icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'><path d='M416 32h-64c-17.67 0-32 14.33-32 32s14.33 32 32 32h64c17.67 0 32 14.33 32 32v256c0 17.67-14.33 32-32 32h-64c-17.67 0-32 14.33-32 32s14.33 32 32 32h64c53.02 0 96-42.98 96-96V128C512 74.98 469 32 416 32zM342.6 233.4l-128-128c-12.51-12.51-32.76-12.49-45.25 0c-12.5 12.5-12.5 32.75 0 45.25L242.8 224H32C14.31 224 0 238.3 0 256s14.31 32 32 32h210.8l-73.38 73.38c-12.5 12.5-12.5 32.75 0 45.25s32.75 12.5 45.25 0l128-128C355.1 266.1 355.1 245.9 342.6 233.4z'/></svg>Login</h2></a>
          <?php } else { ?>
            <a href='/home.php'><h2><svg class='header-icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 576 512'><path d='M511.8 287.6L512.5 447.7C512.5 450.5 512.3 453.1 512 455.8V472C512 494.1 494.1 512 472 512H456C454.9 512 453.8 511.1 452.7 511.9C451.3 511.1 449.9 512 448.5 512H392C369.9 512 352 494.1 352 472V384C352 366.3 337.7 352 320 352H256C238.3 352 224 366.3 224 384V472C224 494.1 206.1 512 184 512H128.1C126.6 512 125.1 511.9 123.6 511.8C122.4 511.9 121.2 512 120 512H104C81.91 512 64 494.1 64 472V360C64 359.1 64.03 358.1 64.09 357.2V287.6H32.05C14.02 287.6 0 273.5 0 255.5C0 246.5 3.004 238.5 10.01 231.5L266.4 8.016C273.4 1.002 281.4 0 288.4 0C295.4 0 303.4 2.004 309.5 7.014L416 100.7V64C416 46.33 430.3 32 448 32H480C497.7 32 512 46.33 512 64V185L564.8 231.5C572.8 238.5 576.9 246.5 575.8 255.5C575.8 273.5 560.8 287.6 543.8 287.6L511.8 287.6z'/></svg>Home</h2></a>
            <a href='/academy.php'><h2><svg class='header-icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 512' style='padding: 0;'><path d='M128 96h384v256h64V80C576 53.63 554.4 32 528 32h-416C85.63 32 64 53.63 64 80V352h64V96zM624 384h-608C7.25 384 0 391.3 0 400V416c0 35.25 28.75 64 64 64h512c35.25 0 64-28.75 64-64v-16C640 391.3 632.8 384 624 384zM365.9 286.2C369.8 290.1 374.9 292 380 292s10.23-1.938 14.14-5.844l48-48c7.812-7.813 7.812-20.5 0-28.31l-48-48c-7.812-7.813-20.47-7.813-28.28 0c-7.812 7.813-7.812 20.5 0 28.31l33.86 33.84l-33.86 33.84C358 265.7 358 278.4 365.9 286.2zM274.1 161.9c-7.812-7.813-20.47-7.813-28.28 0l-48 48c-7.812 7.813-7.812 20.5 0 28.31l48 48C249.8 290.1 254.9 292 260 292s10.23-1.938 14.14-5.844c7.812-7.813 7.812-20.5 0-28.31L240.3 224l33.86-33.84C281.1 182.4 281.1 169.7 274.1 161.9z'/></svg>Academy</h2></a>
            <a href='/challenges.php'><h2><svg class='header-icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'><path d='M64 496C64 504.8 56.75 512 48 512h-32C7.25 512 0 504.8 0 496V32c0-17.75 14.25-32 32-32s32 14.25 32 32V496zM476.3 0c-6.365 0-13.01 1.35-19.34 4.233c-45.69 20.86-79.56 27.94-107.8 27.94c-59.96 0-94.81-31.86-163.9-31.87C160.9 .3055 131.6 4.867 96 15.75v350.5c32-9.984 59.87-14.1 84.85-14.1c73.63 0 124.9 31.78 198.6 31.78c31.91 0 68.02-5.971 111.1-23.09C504.1 355.9 512 344.4 512 332.1V30.73C512 11.1 495.3 0 476.3 0z'/></svg>
        Challenges</h2></a>
            <a href='/jobs.php'><h2><svg class='header-icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'><path d='M448 32C465.7 32 480 46.33 480 64C480 81.67 465.7 96 448 96H80C71.16 96 64 103.2 64 112C64 120.8 71.16 128 80 128H448C483.3 128 512 156.7 512 192V416C512 451.3 483.3 480 448 480H64C28.65 480 0 451.3 0 416V96C0 60.65 28.65 32 64 32H448zM416 336C433.7 336 448 321.7 448 304C448 286.3 433.7 272 416 272C398.3 272 384 286.3 384 304C384 321.7 398.3 336 416 336z'/></svg>Jobs</h2></a>
            <a href='/logout.php'><h2><svg class='header-icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'><path d='M160 416H96c-17.67 0-32-14.33-32-32V128c0-17.67 14.33-32 32-32h64c17.67 0 32-14.33 32-32S177.7 32 160 32H96C42.98 32 0 74.98 0 128v256c0 53.02 42.98 96 96 96h64c17.67 0 32-14.33 32-32S177.7 416 160 416zM502.6 233.4l-128-128c-12.51-12.51-32.76-12.49-45.25 0c-12.5 12.5-12.5 32.75 0 45.25L402.8 224H192C174.3 224 160 238.3 160 256s14.31 32 32 32h210.8l-73.38 73.38c-12.5 12.5-12.5 32.75 0 45.25s32.75 12.5 45.25 0l128-128C515.1 266.1 515.1 245.9 502.6 233.4z'/></svg>Logout</h2></a>
          <?php } ?>
        </div>
      </nav>
      <input type='checkbox' id='bool' style='display: none;'>
      <hr id='website-hr'>
    </header>
    <main>
      <style>
      @media(max-width: 1400px) {
        .hero-section {
          position: static;
        }

        #particles-js canvas {
          position: absolute;
          top: 5%;
        }
      }
      </style>
      <div id='particles-js'>
        <section class='hero-section' style='margin-top: 270px;'>
          <div class='container'>
            <h1 class='website-color title'>Elo<span id='white'>Dev</span></h1><div class='blink'></div>
            <h3>Programming <span class='website-color'>|</span> Cybersecurity <span class='website-color'>|</span> CTFs</h3>
            <h5 class='text-color'>EloDev is a lightweight online programming and cybersecurity platform.<br>The platform is intended for all people who are interested in new technologies.<br>Ascend your success!</h5>
            <a class='color-btn' href='/register'>Join</a>
          </div>
        </section>
      </div>
      <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 319'><path fill='#151d2c' fill-opacity='1' d='M0,256L48,224C96,192,192,128,288,117.3C384,107,480,149,576,170.7C672,192,768,192,864,186.7C960,181,1056,171,1152,165.3C1248,160,1344,160,1392,160L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z'></path></svg>
      <section class='programming-section'>
        <h2 class='heading'>Programming</h2>
        <h5>A lot of interesting competitive programming challenges</h5>
        <div class='programming-langs'>
          <i id='devicon' class='devicon-c-plain colored'></i>
          <i id='devicon' class='devicon-cplusplus-plain colored white'></i>
          <i id='devicon' class='devicon-csharp-plain colored'></i>
          <i id='devicon' class='devicon-php-plain colored white'></i>
          <i id='devicon' class='devicon-nodejs-plain colored'></i>
          <i id='devicon' class='devicon-bash-plain colored white'></i>
        </div>
        <div class='programming-langs'>
          <i id='devicon' class='devicon-go-plain colored white'></i>
          <i id='devicon' class='devicon-haskell-plain colored'></i>
          <i id='devicon' class='devicon-dart-plain colored white'></i>
          <i id='devicon' class='devicon-swift-plain colored'></i>
          <i id='devicon' class='devicon-java-plain colored white'></i>
          <i id='devicon' class='devicon-python-plain colored'></i>
        </div>
      </section>
      <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 319'><path fill='#151d2c' fill-opacity='1' d='M0,256L48,224C96,192,192,128,288,117.3C384,107,480,149,576,170.7C672,192,768,192,864,186.7C960,181,1056,171,1152,165.3C1248,160,1344,160,1392,160L1440,160L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z'></path></svg>
      <section class='cybersecurity-section'>
        <div class='background'>
          <h2 class='heading'>Cybersecurity</h2>
          <div class='os'>
            <i id='devicon' class='devicon-linux-plain colored'></i>
            <i id='devicon' class='devicon-windows8-plain colored '></i>
            <i id='devicon' class='devicon-android-plain colored'></i>
          </div>
        </div>
        <div class='text'>
          <h5>Practice your cybersecurity skills and learn how to write a secure code.<br>Improve your knowledge and be a cybersecurity expert.<br><br></h5>
          <h4>What we provide<span class='website-color'>?</span></h4>
          <h5>Knowledge<span class='website-color'>.</span></h5>
          <div class='knowledge'>
            <ul>
              <li>We will teach you to think like a hacker.</li>
              <li>You will learn everything about exploits and vulnerabilities.</li>
              <li>You can train your skills with many CTF challenges.</li>
            </ul>
          </div>
          <pre class='code'>
            <code class='reverse-shell'>
<span><span id='white'>[</span>root<span id='white'>@</span>elodev ~<span id='white'>]</span>$ <span id='command'></span><div class='blink'></div>
            </code>
          </pre>
        </div>
      </section>
      <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 319'><path fill='#151d2c' fill-opacity='1' d='M0,96L48,117.3C96,139,192,181,288,197.3C384,213,480,203,576,202.7C672,203,768,213,864,192C960,171,1056,117,1152,106.7C1248,96,1344,128,1392,144L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z'></path></svg>
      <section class='careers-section'>
        <h2 class='heading'>Careers</h2>
        <div class='job'>
          <div class='container'>
            <div class='row'>
              <div class='col-md-6'>
                <h4>Get Hired</h4>
                <svg class='icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 512'><path d='M128 96h384v256h64v-272c0-26.38-21.62-48-48-48h-416c-26.38 0-48 21.62-48 48V352h64V96zM624 383.1h-608c-8.75 0-16 7.25-16 16v16c0 35.25 28.75 64 64 64h512c35.25 0 64-28.75 64-64v-16C640 391.2 632.8 383.1 624 383.1z'/></svg>
                <p>Want to work with us? We offer many jobs that are ready for you!</p>
                <a class='color-btn' href='/jobs.php'>Careers</a>
              </div>
              <div class='col-md-6'>
                <pre>
 ________________________________________________
/                                                \
|    _________________________________________     |
|   |                                         |    |
|   |  [root@elodev ~]$ id                    |    |
|   |  uid=0(root) gid=0(root) groups=0(root) |    |
|   |  [root@elodev ~]$                       |    |
|   |                                         |    |
|   |                                         |    |
|   |                                         |    |
|   |                                         |    |
|   |                                         |    |
|   |                                         |    |
|   |                                         |    |
|   |                                         |    |
|   |                                         |    |
|   |_________________________________________|    |
|                                                  |
\_________________________________________________/
\___________________________________/
___________________________________________
_-'    .-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.  --- `-_
_-'.-.-. .---.-.-.-.-.-.-.-.-.-.-.-.-.-.-.--.  .-.-.`-_
_-'.-.-.-. .---.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-`__`. .-.-.-.`-_
_-'.-.-.-.-. .-----.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-----. .-.-.-.-.`-_
_-'.-.-.-.-.-. .---.-. .-------------------------. .-.---. .---.-.-.-.`-_
:-------------------------------------------------------------------------:
`---._.-------------------------------------------------------------._.---'
                </pre>
              </div>
            </div>
          </div>
        </div>
      </section>
      <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 319'><path fill='#151d2c' fill-opacity='1' d='M0,256L48,224C96,192,192,128,288,117.3C384,107,480,149,576,170.7C672,192,768,192,864,186.7C960,181,1056,171,1152,165.3C1248,160,1344,160,1392,160L1440,160L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z'></path></svg>
      <section class='academy-section'>
        <h4 class='title website-color'>Elo<span id='white'>Dev</span></h4><div class='blink'></div>
        <h2 class='heading'>Academy</h2>
        <div class='text'>
          <svg class='icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 576 512' style='max-width: 60px; margin-bottom: 30px; padding: 0;'><path d='M572.1 82.38C569.5 71.59 559.8 64 548.7 64h-100.8c.2422-12.45 .1078-23.7-.1559-33.02C447.3 13.63 433.2 0 415.8 0H160.2C142.8 0 128.7 13.63 128.2 30.98C127.1 40.3 127.8 51.55 128.1 64H27.26C16.16 64 6.537 71.59 3.912 82.38C3.1 85.78-15.71 167.2 37.07 245.9c37.44 55.82 100.6 95.03 187.5 117.4c18.7 4.805 31.41 22.06 31.41 41.37C256 428.5 236.5 448 212.6 448H208c-26.51 0-47.99 21.49-47.99 48c0 8.836 7.163 16 15.1 16h223.1c8.836 0 15.1-7.164 15.1-16c0-26.51-21.48-48-47.99-48h-4.644c-23.86 0-43.36-19.5-43.36-43.35c0-19.31 12.71-36.57 31.41-41.37c86.96-22.34 150.1-61.55 187.5-117.4C591.7 167.2 572.9 85.78 572.1 82.38zM77.41 219.8C49.47 178.6 47.01 135.7 48.38 112h80.39c5.359 59.62 20.35 131.1 57.67 189.1C137.4 281.6 100.9 254.4 77.41 219.8zM498.6 219.8c-23.44 34.6-59.94 61.75-109 81.22C426.9 243.1 441.9 171.6 447.2 112h80.39C528.1 135.7 526.5 178.7 498.6 219.8z'/></svg>
          <h5>Boost your skills with free tutorials and courses</h5>
          <a class='color-btn' href='/academy.php'>Read more</a>
          <div class='container'>
            <div class='row'>
              <div class='col-md-4'>
                <svg class='icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 512'><path d='M400 0C426.5 0 448 21.49 448 48V144C448 170.5 426.5 192 400 192H352V224H608C625.7 224 640 238.3 640 256C640 273.7 625.7 288 608 288H512V320H560C586.5 320 608 341.5 608 368V464C608 490.5 586.5 512 560 512H400C373.5 512 352 490.5 352 464V368C352 341.5 373.5 320 400 320H448V288H192V320H240C266.5 320 288 341.5 288 368V464C288 490.5 266.5 512 240 512H80C53.49 512 32 490.5 32 464V368C32 341.5 53.49 320 80 320H128V288H32C14.33 288 0 273.7 0 256C0 238.3 14.33 224 32 224H288V192H240C213.5 192 192 170.5 192 144V48C192 21.49 213.5 0 240 0H400zM256 64V128H384V64H256zM224 448V384H96V448H224zM416 384V448H544V384H416z'/></svg>
                <h5>Networking</h5>
                <p>From fundementals to advanced, improve your knowledge about networking. The essential networking knowledge is required for every IT expert.</p>
                <a class='color-btn' href='/academy/networking.php'>Learn</a>
              </div>
              <div class='col-md-4'>
                <svg class='icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 576 512'><path d='M9.372 86.63C-3.124 74.13-3.124 53.87 9.372 41.37C21.87 28.88 42.13 28.88 54.63 41.37L246.6 233.4C259.1 245.9 259.1 266.1 246.6 278.6L54.63 470.6C42.13 483.1 21.87 483.1 9.372 470.6C-3.124 458.1-3.124 437.9 9.372 425.4L178.7 256L9.372 86.63zM544 416C561.7 416 576 430.3 576 448C576 465.7 561.7 480 544 480H256C238.3 480 224 465.7 224 448C224 430.3 238.3 416 256 416H544z'/></svg>
                <h5>Programming</h5>
                <p>Every hacker must have programming skills. With these tutorials you will learn how to write a good code. You don't want to be a script kiddie, do you?</p>
                <a class='color-btn' href='/academy/programming.php'>Learn</a>
              </div>
              <div class='col-md-4'>
                <svg class='icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'><path d='M160 352h192V160H160V352zM448 176h48C504.8 176 512 168.8 512 160s-7.162-16-16-16H448V128c0-35.35-28.65-64-64-64h-16V16C368 7.164 360.8 0 352 0c-8.836 0-16 7.164-16 16V64h-64V16C272 7.164 264.8 0 256 0C247.2 0 240 7.164 240 16V64h-64V16C176 7.164 168.8 0 160 0C151.2 0 144 7.164 144 16V64H128C92.65 64 64 92.65 64 128v16H16C7.164 144 0 151.2 0 160s7.164 16 16 16H64v64H16C7.164 240 0 247.2 0 256s7.164 16 16 16H64v64H16C7.164 336 0 343.2 0 352s7.164 16 16 16H64V384c0 35.35 28.65 64 64 64h16v48C144 504.8 151.2 512 160 512c8.838 0 16-7.164 16-16V448h64v48c0 8.836 7.164 16 16 16c8.838 0 16-7.164 16-16V448h64v48c0 8.836 7.164 16 16 16c8.838 0 16-7.164 16-16V448H384c35.35 0 64-28.65 64-64v-16h48c8.838 0 16-7.164 16-16s-7.162-16-16-16H448v-64h48C504.8 272 512 264.8 512 256s-7.162-16-16-16H448V176zM384 368c0 8.836-7.162 16-16 16h-224C135.2 384 128 376.8 128 368v-224C128 135.2 135.2 128 144 128h224C376.8 128 384 135.2 384 144V368z'/></svg>
                <h5>Hardware</h5>
                <p>Hardware knowledge is important as well. Learn how things work on low-level. A good hardware knowledge can help you to improve your "software" skills.</p>
                <a class='color-btn' href='/academy/hardware.php'>Learn</a>
              </div>
            </div>
          </div>
        </div>
        <?php include 'footer.php'; ?>
      </section>
    </main>
    <script src='/js/particles.js'></script>
    <script src='/js/app.js'></script>
    <script src='/js/main.js'></script>
    <script src='/js/header.js'></script>
  </body>
</html>
