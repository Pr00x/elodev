<?php
  include 'cfg/security.php';

  logged_in($_SESSION, 'login.php', $secKey);

  global $msg;
  $randomMsgs = [
    'Everything is possible.',
    'You can be better than the best.',
    'Who are you?',
    'Do you know who am I?',
    'Reverse the TCP and get the shell.',
    'Everyday be the best version of yourself.',
    'RG9uJ3Qgd2FzdGUgeW91ciB0aW1lIG9uIG5vbnNlbnNlLgo=',
    'double free or corruption (fasttop)',
    '<a href=\'https://bit.ly/35eJKag\'>elodev.net</a>'
  ];

  $msg = $randomMsgs[random_int(0, 8)];
?>

<!DOCTYPE html>
<html lang='en' dir='ltr'>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, minimum-scale=1'>
    <meta name='description' content='EloDev is an online programming and cybersecurity platform. The platform is intended for all people who are interested in new technologies.'>
    <title>EloDev | Dashboard</title>
    <link rel='stylesheet' href='/css/bootstrap.css'>
    <link rel='stylesheet' href='/css/devicon.css'>
    <link rel='stylesheet' href='/css/style.css'>
    <link rel='stylesheet' href='/css/dashboard.css'>
    <link rel='icon' href='/img/icon.png'>
  </head>
  <body>
    <?php include 'header.php'; ?>
    <main>
      <?php include 'menu.php'; ?>
      <div id='particles-js'>
        <section class='hero-section'>
          <div class='container'>
            <div class='content'>
              <h1 class='website-color title'>Elo<span id='white'>Dev</span></h1><div class='blink'></div>
              <div class='hero-content-div'>
                  <h3 class='heading'>Home</h3>
                  <h5 style='margin-bottom: 15px;'>[<?php echo $_SESSION['username']; ?><span class='website-color'>@</span>elodev ~]<span class='website-color'>$</span> pwd; id; cat msg.txt</h5>
                  <div class='user'>
                    <h5 style='margin-bottom: 10px;'>/home/<?php echo $_SESSION['username']; ?></h5>
                    <h5>uid=1000(<?php echo $_SESSION['username']; ?>) gid=984(users) groups=984(users),987(storage),999(elodev)</h5>
                    <h5><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'><path d='M511.1 63.1v287.1c0 35.25-28.75 63.1-64 63.1h-144l-124.9 93.68c-7.875 5.75-19.12 .0497-19.12-9.7v-83.98h-96c-35.25 0-64-28.75-64-63.1V63.1c0-35.25 28.75-63.1 64-63.1h384C483.2 0 511.1 28.75 511.1 63.1z'/></svg> | "<?php echo $msg; ?>"</h5>
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
    <script>
      document.getElementById('home-btn').className = 'selected';
    </script>
  </body>
</html>
