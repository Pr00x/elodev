<?php
  include '../cfg/db.php';
  include '../cfg/security.php';

  logged_in($_SESSION, 'login.php', $secKey);

  function validateUsername($str) {
    return (preg_match('/^[a-zA-Z][a-zA-Z0-9_]+$/', $str) && !strpos($str, ' '));
  }

  global $html;
  $csrf = csrf();
  $usr = $_SESSION['username'];

  if(!validateUsername($usr)) {
    header('Location: /logout.php');
    die();
  }

  /*$challenges = [
    'Test' => [
      'desc' => 'Step 1: find the flag.<br>Hint: source',
      'points' => 5,
      'author' => 'prox',
      'id' => 0
    ]
  ];*/

  $challenges = [];
  $result = $mysqli->query("SELECT * FROM accounts WHERE username='$usr'");

  if(!$result || $result->num_rows !== 1) {
    header('Location: /logout.php');
    die();
  }

  $data = $result->fetch_row();
  $authKey = $data[4];

  foreach($challenges as $c => $key) {
    $id = (int)$key['id'];
    $sql = $mysqli->query("SELECT * FROM chads WHERE id=$id AND auth_key='$authKey'");

    if(!$sql) {
      $mysql->close();
      include '500.php';
    }

    if($sql->num_rows === 0) {
      $html .= "
      <div class='col-md-5 category challenge'>
        <form id='submit-flag' method='POST' autocomplete='off'>
        <svg class='icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 460 512'><path d='M220.6 130.3l-67.2 28.2V43.2L98.7 233.5l54.7-24.2v130.3l67.2-209.3zm-83.2-96.7l-1.3 4.7-15.2 52.9C80.6 106.7 52 145.8 52 191.5c0 52.3 34.3 95.9 83.4 105.5v53.6C57.5 340.1 0 272.4 0 191.6c0-80.5 59.8-147.2 137.4-158zm311.4 447.2c-11.2 11.2-23.1 12.3-28.6 10.5-5.4-1.8-27.1-19.9-60.4-44.4-33.3-24.6-33.6-35.7-43-56.7-9.4-20.9-30.4-42.6-57.5-52.4l-9.7-14.7c-24.7 16.9-53 26.9-81.3 28.7l2.1-6.6 15.9-49.5c46.5-11.9 80.9-54 80.9-104.2 0-54.5-38.4-102.1-96-107.1V32.3C254.4 37.4 320 106.8 320 191.6c0 33.6-11.2 64.7-29 90.4l14.6 9.6c9.8 27.1 31.5 48 52.4 57.4s32.2 9.7 56.8 43c24.6 33.2 42.7 54.9 44.5 60.3s.7 17.3-10.5 28.5zm-9.9-17.9c0-4.4-3.6-8-8-8s-8 3.6-8 8 3.6 8 8 8 8-3.6 8-8z'/></svg>
          <h5>{$c}</h5>
          <p>{$key['desc']}</p>
          <p><svg class='points-icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 384 512'><path d='M384 319.1C384 425.9 297.9 512 192 512s-192-86.13-192-192c0-58.67 27.82-106.8 54.57-134.1C69.54 169.3 96 179.8 96 201.5v85.5c0 35.17 27.97 64.5 63.16 64.94C194.9 352.5 224 323.6 224 288c0-88-175.1-96.12-52.15-277.2c13.5-19.72 44.15-10.77 44.15 13.03C215.1 127 384 149.7 384 319.1z'/></svg> Points: <span class='website-color'>{$key['points']}</span></p>
          <h5>Author: {$key['author']}</h5>
          <input type='text' name='flag' placeholder='el0d3v{fl4g}'>
          <div class='submit-div'>
            <input type='submit' id='{$key['id']}' class='color-btn' value='Submit flag'>
          </div>
          <input type='hidden' name='points' value='{$key['points']}'>
          <input type='hidden' name='challenge_name' value='{$c}'>
          <input type='hidden' name='id' value='{$key['id']}'>
          <input type='hidden' name='_csrf' value='$csrf'>
        </form>
      </div>
      ";
    }
    else {
      $html .= "
      <div class='col-md-5 category challenge'>
      <svg class='icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 460 512'><path d='M220.6 130.3l-67.2 28.2V43.2L98.7 233.5l54.7-24.2v130.3l67.2-209.3zm-83.2-96.7l-1.3 4.7-15.2 52.9C80.6 106.7 52 145.8 52 191.5c0 52.3 34.3 95.9 83.4 105.5v53.6C57.5 340.1 0 272.4 0 191.6c0-80.5 59.8-147.2 137.4-158zm311.4 447.2c-11.2 11.2-23.1 12.3-28.6 10.5-5.4-1.8-27.1-19.9-60.4-44.4-33.3-24.6-33.6-35.7-43-56.7-9.4-20.9-30.4-42.6-57.5-52.4l-9.7-14.7c-24.7 16.9-53 26.9-81.3 28.7l2.1-6.6 15.9-49.5c46.5-11.9 80.9-54 80.9-104.2 0-54.5-38.4-102.1-96-107.1V32.3C254.4 37.4 320 106.8 320 191.6c0 33.6-11.2 64.7-29 90.4l14.6 9.6c9.8 27.1 31.5 48 52.4 57.4s32.2 9.7 56.8 43c24.6 33.2 42.7 54.9 44.5 60.3s.7 17.3-10.5 28.5zm-9.9-17.9c0-4.4-3.6-8-8-8s-8 3.6-8 8 3.6 8 8 8 8-3.6 8-8z'/></svg>
        <h5>{$c}</h5>
        <p>{$key['desc']}</p>
        <p><svg class='points-icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 384 512'><path d='M384 319.1C384 425.9 297.9 512 192 512s-192-86.13-192-192c0-58.67 27.82-106.8 54.57-134.1C69.54 169.3 96 179.8 96 201.5v85.5c0 35.17 27.97 64.5 63.16 64.94C194.9 352.5 224 323.6 224 288c0-88-175.1-96.12-52.15-277.2c13.5-19.72 44.15-10.77 44.15 13.03C215.1 127 384 149.7 384 319.1z'/></svg> Points: <span class='website-color'>{$key['points']}</span></p>
        <h5>Author: {$key['author']}</h5>
        <input type='text' name='flag' placeholder='Solved' disabled>
        <div class='submit-div'>
        </div>
        <input type='hidden' name='points' value='{$key['points']}'>
        <input type='hidden' name='challenge_name' value='{$c}'>
        <input type='hidden' name='id' value='{$key['id']}'>
        <input type='hidden' name='_csrf' value='$csrf'>
      </div>
      ";
    }
  }

  $html = '<h1>Coming soon!</h1><br><br><br><br><input type=\'button\' class=\'color-btn\' value=\'Challenges\' onclick=\'window.location.href="/challenges.php"\' style=\'max-width: 40%;\'>';
?>

<!DOCTYPE html>
<html lang='en' dir='ltr'>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, minimum-scale=1'>
    <meta name='description' content='EloDev is an online programming and cybersecurity platform. The platform is intended for all people who are interested in new technologies.'>
    <title>EloDev | OSINT</title>
    <link rel='stylesheet' href='/css/bootstrap.css'>
    <link rel='stylesheet' href='/css/devicon.css'>
    <link rel='stylesheet' href='/css/style.css'>
    <link rel='stylesheet' href='/css/challenges.css'>
    <link rel='icon' href='/img/icon.png'>
  </head>
  <body>
    <?php include '../header.php'; ?>
    <main>
      <div id='particles-js'>
        <section class='hero-section'>
          <div class='container'>
            <a href='/'><h1 class='website-color title'>Elo<span id='white'>Dev</span></h1><div class='blink'></div></a>
            <section class='ctf-section'>
              <div class='hero-content-div'>
                <h3 class='heading' style='max-width: 50%;'><svg class='icon' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" style='padding: 0;'><path d="M128 96h384v256h64V80C576 53.63 554.4 32 528 32h-416C85.63 32 64 53.63 64 80V352h64V96zM624 384h-608C7.25 384 0 391.3 0 400V416c0 35.25 28.75 64 64 64h512c35.25 0 64-28.75 64-64v-16C640 391.3 632.8 384 624 384zM365.9 286.2C369.8 290.1 374.9 292 380 292s10.23-1.938 14.14-5.844l48-48c7.812-7.813 7.812-20.5 0-28.31l-48-48c-7.812-7.813-20.47-7.813-28.28 0c-7.812 7.813-7.812 20.5 0 28.31l33.86 33.84l-33.86 33.84C358 265.7 358 278.4 365.9 286.2zM274.1 161.9c-7.812-7.813-20.47-7.813-28.28 0l-48 48c-7.812 7.813-7.812 20.5 0 28.31l48 48C249.8 290.1 254.9 292 260 292s10.23-1.938 14.14-5.844c7.812-7.813 7.812-20.5 0-28.31L240.3 224l33.86-33.84C281.1 182.4 281.1 169.7 274.1 161.9z"/></svg><b>Challenges->OSINT</b></h3>
              </div>
              <div class='row'>
                <?php echo $html; ?>
              </div>
            </section>
        </section>
        </div>
      </div>
      <div class='alert'>
        <h5></h5>
      </div>
    </main>
    <script src='/js/particles.js'></script>
    <script src='/js/app.js'></script>
    <script src='/js/flag_submit.js'></script>
  </body>
</html>
