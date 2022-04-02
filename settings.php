<?php
  include 'cfg/db.php';
  include 'cfg/security.php';

  logged_in($_SESSION, 'login.php', $secKey);

  global $csrf, $countries, $htmlCountries, $countryCode;
  $csrf = csrf();

  $sql = $mysqli->prepare('SELECT * FROM accounts WHERE email=? AND username=? AND name=?');
  $sql->bind_param('sss', $_SESSION['email'], $_SESSION['username'], $_SESSION['name']);
  $sql->execute();
  $result = $sql->get_result();

  if($result->num_rows !== 1) {
    header('Location: /logout.php');
    die();
  }

  $data = $result->fetch_row();
  $country_code = $data[6];
  $country = $data[7];
  $profilePic = $data[10];
  $countries = json_decode(file_get_contents('all_country_codes.json'));
  $username = $data[2];
  $name = $data[5];
  $email = $data[1];

  foreach($countries as $c => $key)
    $htmlCountries .= "<option value='$c'>$key</option>";

  $result->free_result();
  $sql->close();
  $mysqli->close();
?>

<!DOCTYPE html>
<html lang='en' dir='ltr'>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, minimum-scale=1'>
    <meta name='description' content='EloDev is an online programming and cybersecurity platform. The platform is intended for all people who are interested in new technologies.'>
    <title>EloDev | Settings</title>
    <link rel='stylesheet' href='/css/bootstrap.css'>
    <link rel='stylesheet' href='/css/devicon.css'>
    <link rel='stylesheet' href='/css/style.css'>
    <link rel='stylesheet' href='/css/dashboard.css'>
    <link rel='stylesheet' href='/css/settings.css'>
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
                  <h3 class='heading'>Settings</h3>
                  <h5>[<?php echo $_SESSION['username']; ?><span class='website-color'>@</span>elodev ~]<span class='website-color'>$</span> vim /etc/profile</h5>
                  <form class='settings-form' action='/ajax/upload.php' method='POST' enctype='multipart/form-data' autocomplete='off'>
                  <div class='user'>
                    <img class='profile-pic' src='<?php echo $profilePic; ?>' alt='profile-pic'>
                    <label class='upload-btn'><input type='file' id='img-upload' name='img' accept='.png, .jpg, .jpeg' hidden onchange='preview(this)'>Upload a new profile picture</label>
                    <p class='desc'><i class='fas fa-image'></i>Supported image formats: <span class='website-color'>png</span>, <span class='website-color'>jpg</span>, <span class='website-color'>jpeg</span><br>Aspect ratio -> 1:1 | Maximum file size: <span class='website-color'>3MiB</span><br>Min dimensions: <span class='website-color'>128x128</span> | Max dimensions: <span class='website-color'>2048x2048</span></p>
                  </div>
                  <hr id='website-hr'>
                  <div class='country'>
                    <h5 class='settings-title'>Country</h5>
                    <select class='form-control' name='country' data-role='select-dropdown' onchange='changeCountry(this.value)'>
                      <option value=''>Change country</option>
                      <?php echo $htmlCountries; ?>
                    </select>
                    <img class='country-flag' src='https://flagcdn.com/w40/<?php echo $country_code; ?>.png' alt='<?php echo $country; ?>'>
                  </div>
                  <div class='username-name'>
                    <hr id='website-hr'>
                    <h5 class='settings-title'>Credentials</h5>
                    <label for='username'>Username</label>
                    <input type='text' name='username' maxlength='16' placeholder='<?php echo $username; ?>'>
                    <label for='name'>Name</label>
                    <input type='text' name='name' maxlength='64' placeholder='<?php echo $name; ?>'>
                    <label for='email'>Email</label>
                    <input type='email' name='email' maxlength='128' placeholder='<?php echo $email; ?>'>
                    <h5 style='margin: 40px 0 40px 0;'>Change Password</h5>
                    <label for='password'>Current Password</label>
                    <input type='password' name='password' maxlength='256' placeholder='Current Password'>
                    <label for='new_password'>New Password</label>
                    <input type='password' name='new_password' maxlength='256' placeholder='New Password'>
                    <label for='repeat_password'>Confirm Password</label>
                    <input type='password' name='repeat_password' maxlength='256' placeholder='Confirm Password'>
                  </div>
                  <div class='submit'>
                    <input type='hidden' name='_csrf' value='<?php echo $csrf; ?>'>
                    <input type='submit' id='submit' class='color-btn' value='Save changes'>
                  </div>
                </form>
                </div>
              </div>
            </div>
            </div>
            </div>
          </div>
        </section>
      </div>
    </main>
    <div class='alert'>
      <h5></h5>
    </div>
    <script src='/js/font-awesome.js'></script>
    <script src='/js/particles.js'></script>
    <script src='/js/app.js'></script>
    <script src='/js/settings.js'></script>
    <script>
      document.getElementById('profile-btn').className = 'selected';
    </script>
  </body>
</html>
