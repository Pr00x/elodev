<?php
  include 'cfg/db.php';
  include 'cfg/security.php';

  logged_in($_SESSION, 'login.php', $secKey);

  global $html;
  $result = $mysqli->query('SELECT * FROM accounts WHERE admin!=1 ORDER BY points DESC');

  if(!$result) {
    $mysqli->close();
    include '500.php';
  }

  $users = $result->fetch_all(MYSQLI_ASSOC);
  $len = count($users);
  $url = 'http://localhost:8000/user.php?user=';

  for($i = 1; $i <= $len; $i++) {
    $n = $i - 1;
    $html .= "
    <hr id='website-hr'>
    <div class='row'>
      <div class='user'>
        <div class='col-md-1'>
          <h4 class='position website-color'>#$i</h4>
        </div>
        <div class='col-md-2'>
          <a href='$url{$users[$n]['username']}'><img id='profile_pic' src='{$users[$n]['profile_pic']}' alt='profile_pic'></a>
        </div>
        <div class='col-md-4'>
          <h4><a href='$url{$users[$n]['username']}'>{$users[$n]['username']}</a></h4>
          <img class='flag' src='https://flagcdn.com/w40/{$users[$n]['country_code']}.png'>
        </div>
        <div class='col-md-2'>
          <h5>{$users[$n]['rank']}</h5>
        </div>
        <div class='col-md-1 points'>
        <span class='points'>{$users[$n]['points']}</span>
        </div>
        <div class='col-md-1 points-icon'>
        <svg class='icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 384 512'><path d='M384 319.1C384 425.9 297.9 512 192 512s-192-86.13-192-192c0-58.67 27.82-106.8 54.57-134.1C69.54 169.3 96 179.8 96 201.5v85.5c0 35.17 27.97 64.5 63.16 64.94C194.9 352.5 224 323.6 224 288c0-88-175.1-96.12-52.15-277.2c13.5-19.72 44.15-10.77 44.15 13.03C215.1 127 384 149.7 384 319.1z'/></svg>
        </div>
      </div>
    </div>
    ";
  }

  $result->free_result();
  $mysqli->close();
?>

<!DOCTYPE html>
<html lang='en' dir='ltr'>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, minimum-scale=1'>
    <meta name='description' content='EloDev is an online programming and cybersecurity platform. The platform is intended for all people who are interested in new technologies.'>
    <title>EloDev | Leaderboard</title>
    <link rel='stylesheet' href='/css/bootstrap.css'>
    <link rel='stylesheet' href='/css/devicon.css'>
    <link rel='stylesheet' href='/css/style.css'>
    <link rel='stylesheet' href='/css/dashboard.css'>
    <link rel='stylesheet' href='/css/leaderboard.css'>
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
                <h3 class='heading'>Leaderboard</h3>
                <h5>[root<span class='website-color'>@</span>elodev ~]<span class='website-color'>$</span> cat ~/.local/leaderboard.txt</h5>
                <div class='hall-of-fame'>
                  <?php echo $html; ?>
                </div>
            </div>
            </div>
          </div>
        </section>
      </div>
    </main>
    <script src='/js/particles.js'></script>
    <script src='/js/app.js'></script>
    <script>
      document.getElementById('leaderboard-btn').className = 'selected';
    </script>
  </body>
</html>
