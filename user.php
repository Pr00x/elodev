<?php
  include 'cfg/db.php';
  include 'cfg/security.php';

  global $csrf, $rank, $points, $position, $username, $solved, $max;
  $csrf = csrf();

  $user = $_GET['user'] ?? NULL;

  if(empty($user)) {
    $mysqli->close();
    include '404.php';
  }
  else if(preg_match('/[\'\-="]$/', $user)) {
    $mysqli->close();
    include 'hack.php';
  }
  else if(hpp($_SERVER['REQUEST_URI'], 'user=')) {
    $mysqli->close();
    include '404.php';
  }

  $sql = $mysqli->prepare('SELECT * FROM accounts WHERE username=?');
  $sql->bind_param('s', $user);
  $sql->execute();
  $result = $sql->get_result();

  if($result->num_rows !== 1) {
    $mysqli->close();
    include '404.php';
  }

  $sql1 = $mysqli->query('SELECT * FROM flags');
  $max = $sql1->num_rows;
  $result1 = $mysqli->query('SELECT * FROM accounts ORDER BY points DESC');
  $users = $result1->fetch_all(MYSQLI_ASSOC);
  $usersLen = count($users);

  for($i = 1; $i <= $usersLen; $i++)
    if($users[$i - 1]['username'] === $user) {
      $position = $i;
      break;
    }

  $data = $result->fetch_row();
  $sql2 = $mysqli->prepare('SELECT * FROM chads WHERE auth_key=?');
  $sql2->bind_param('s', $data[4]);
  $sql2->execute();
  $resultChads = $sql2->get_result();
  $solved = $resultChads->num_rows;
  $username = $data[2];
  $country_code = $data[6];
  $country = $data[7];
  $profilePic = $data[10];
  $rank = $data[8];
  $points = $data[11];
  $result->free_result();
  $result1->free_result();
  $resultChads->free_result();
  $sql->close();
  $sql2->close();
  $mysqli->close();
?>

<!DOCTYPE html>
<html lang='en' dir='ltr'>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, minimum-scale=1'>
    <meta name='description' content='EloDev is an online programming and cybersecurity platform. The platform is intended for all people who are interested in new technologies.'>
    <title>EloDev | Profile</title>
    <link rel='stylesheet' href='/css/bootstrap.css'>
    <link rel='stylesheet' href='/css/devicon.css'>
    <link rel='stylesheet' href='/css/style.css'>
    <link rel='stylesheet' href='/css/dashboard.css'>
    <link rel='stylesheet' href='/css/profile.css'>
    <link rel='stylesheet' href='/css/user.css'>
    <link rel='icon' href='/img/icon.png'>
  </head>
  <body>
    <?php include 'header.php'; ?>
    <main>
      <div id='particles-js'>
        <section class='hero-section'>
          <div class='container'>
            <div class='content'>
              <h1 class='website-color title'>Elo<span id='white'>Dev</span></h1><div class='blink'></div>
              <div class='hero-content-div'>
                <h3 class='heading'>Profile</h3>
                <h5>[<?php echo $username; ?><span class='website-color'>@</span>elodev ~]<span class='website-color'>$</span> whoami</h5>
                <div class='user'>
                  <div class='row'>
                    <div class='col-md-4' style='margin-bottom: 30px;'>
                      <img class='profile-pic' src='<?php echo $profilePic; ?>' alt='pic'>
                      <h4><?php echo $username; ?></h4>
                      <img class='country-flag' src='https://flagcdn.com/w40/<?php echo $country_code; ?>.png' alt='<?php echo $country; ?>'>
                    </div>
                    <div class='col-md-4'>
                      <h4 class='stats'><svg class='profile-icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 576 512'><path d='M572.1 82.38C569.5 71.59 559.8 64 548.7 64h-100.8c.2422-12.45 .1078-23.7-.1559-33.02C447.3 13.63 433.2 0 415.8 0H160.2C142.8 0 128.7 13.63 128.2 30.98C127.1 40.3 127.8 51.55 128.1 64H27.26C16.16 64 6.537 71.59 3.912 82.38C3.1 85.78-15.71 167.2 37.07 245.9c37.44 55.82 100.6 95.03 187.5 117.4c18.7 4.805 31.41 22.06 31.41 41.37C256 428.5 236.5 448 212.6 448H208c-26.51 0-47.99 21.49-47.99 48c0 8.836 7.163 16 15.1 16h223.1c8.836 0 15.1-7.164 15.1-16c0-26.51-21.48-48-47.99-48h-4.644c-23.86 0-43.36-19.5-43.36-43.35c0-19.31 12.71-36.57 31.41-41.37c86.96-22.34 150.1-61.55 187.5-117.4C591.7 167.2 572.9 85.78 572.1 82.38zM77.41 219.8C49.47 178.6 47.01 135.7 48.38 112h80.39c5.359 59.62 20.35 131.1 57.67 189.1C137.4 281.6 100.9 254.4 77.41 219.8zM498.6 219.8c-23.44 34.6-59.94 61.75-109 81.22C426.9 243.1 441.9 171.6 447.2 112h80.39C528.1 135.7 526.5 178.7 498.6 219.8z'/></svg>
Rank</h4>
                      <p class='rank'><?php echo $rank; ?></p>
                      <p class='points'><?php echo $points; ?><svg class='points-icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M384 319.1C384 425.9 297.9 512 192 512s-192-86.13-192-192c0-58.67 27.82-106.8 54.57-134.1C69.54 169.3 96 179.8 96 201.5v85.5c0 35.17 27.97 64.5 63.16 64.94C194.9 352.5 224 323.6 224 288c0-88-175.1-96.12-52.15-277.2c13.5-19.72 44.15-10.77 44.15 13.03C215.1 127 384 149.7 384 319.1z"/></svg></p>
                      <svg class='global-ranking' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M352 256C352 278.2 350.8 299.6 348.7 320H163.3C161.2 299.6 159.1 278.2 159.1 256C159.1 233.8 161.2 212.4 163.3 192H348.7C350.8 212.4 352 233.8 352 256zM503.9 192C509.2 212.5 512 233.9 512 256C512 278.1 509.2 299.5 503.9 320H380.8C382.9 299.4 384 277.1 384 256C384 234 382.9 212.6 380.8 192H503.9zM493.4 160H376.7C366.7 96.14 346.9 42.62 321.4 8.442C399.8 29.09 463.4 85.94 493.4 160zM344.3 160H167.7C173.8 123.6 183.2 91.38 194.7 65.35C205.2 41.74 216.9 24.61 228.2 13.81C239.4 3.178 248.7 0 256 0C263.3 0 272.6 3.178 283.8 13.81C295.1 24.61 306.8 41.74 317.3 65.35C328.8 91.38 338.2 123.6 344.3 160H344.3zM18.61 160C48.59 85.94 112.2 29.09 190.6 8.442C165.1 42.62 145.3 96.14 135.3 160H18.61zM131.2 192C129.1 212.6 127.1 234 127.1 256C127.1 277.1 129.1 299.4 131.2 320H8.065C2.8 299.5 0 278.1 0 256C0 233.9 2.8 212.5 8.065 192H131.2zM194.7 446.6C183.2 420.6 173.8 388.4 167.7 352H344.3C338.2 388.4 328.8 420.6 317.3 446.6C306.8 470.3 295.1 487.4 283.8 498.2C272.6 508.8 263.3 512 255.1 512C248.7 512 239.4 508.8 228.2 498.2C216.9 487.4 205.2 470.3 194.7 446.6H194.7zM190.6 503.6C112.2 482.9 48.59 426.1 18.61 352H135.3C145.3 415.9 165.1 469.4 190.6 503.6V503.6zM321.4 503.6C346.9 469.4 366.7 415.9 376.7 352H493.4C463.4 426.1 399.8 482.9 321.4 503.6V503.6z"/></svg>
                      <p>Global ranking: <b><span class='website-color'>#<?php echo $position; ?></span></b></p>
                    </div>
                    <div class='col-md-4'>
                      <h4 class='stats'><svg class='profile-icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512'><path d='M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z'/></svg>
</i>Stats</h4>
                      <div class='stats'>
                        <h6 style='margin-top: 25px;'>Solved challenges: <?php echo $solved; ?><span class='website-color'>/</span><?php echo $max; ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            </div>
          </div>
        </section>
      </div>
    </main>
    <script src='/js/particles.js'></script>
    <script src='/js/app.js'></script>
  </body>
</html>
