<?php
  include '../cfg/db.php';
  include '../cfg/security.php';

  define('PUBLIC_KEY', '../cfg/ED27pMHhCXurKjTHitNMwkXr.pem');

  logged_in($_SESSION, 'login.php', $secKey);

  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    function validateUsername($str) {
      return (preg_match('/^[a-zA-Z][a-zA-Z0-9_]+$/', $str) && !strpos($str, ' '));
    }

    function validateName($str) {
      return preg_match('/^[a-zA-Z\s]+$/', $str);
    }

    function validateEmail($str) {
      return filter_var($str, FILTER_VALIDATE_EMAIL);
    }

    function unexpected() {
      http_response_code(500);
      die('Unexpected error occurred');
    }

    function exists($field, $cred, mysqli $mysqli) {
      $sql = $mysqli->prepare("SELECT $field FROM accounts WHERE $field=?");
      $sql->bind_param('s', $cred);

      if(!$sql->execute())
        unexpected();

      $result = $sql->get_result();
      $rows = $result->num_rows;
      $result->free_result();
      $sql->close();

      return $rows;
    }

    $csrf = $_POST['_csrf'] ?? NULL;
    csrfCheck($csrf);
    $usr = $_SESSION['username'];

    if(!validateUsername($usr)) {
      header('Location /logout.php');
      die();
    }

    if(!empty($_FILES['img'])) {
      $file = $_FILES['img'];
      $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
      $getImg = getimagesize($file['tmp_name']);
      $mime = $getImg['mime'];

      if($getImg === false) {
        http_response_code(415);
        die('Invalid file type.');
      }
      else if($getImg[0] / $getImg[1] !== 1) {
        http_response_code(400);
        die('Invalid image aspect ratio. Supported aspect ratio: 1:1');
      }
      else if($getImg[0] < 128) {
        http_response_code(400);
        die('Minimum image dimensions is 128x128.');
      }
      else if($getImg[0] > 2048) {
        http_response_code(400);
        die('Maximum image dimensions is 2048x2048');
      }
      else if($mime !== 'image/png' && $mime !== 'image/jpeg' && $mime !== 'image/jpg') {
        http_response_code(415);
        die('Invalid mime type.');
      }
      else if($file['size'] > 3145728) {
        http_response_code(413);
        die('Maximum file size is 3MiB.');
      }
      else if($ext !== 'png' && $ext !== 'jpg' && $ext !== 'jpeg') {
        http_response_code(415);
        die('Invalid file type.');
      }

      $img = '/img/storage/'.bin2hex(random_bytes(32)).'.'.$ext;

      if(!rename($file['tmp_name'], '../'.$img))
        unexpected();
      else if(!$mysqli->query("UPDATE accounts SET profile_pic='$img' WHERE username='$usr'")) {
        $mysqli->close();
        unexpected();
      }
    }

    if(!empty($_POST['country'])) {
      $country = $_POST['country'];
      $countries = json_decode(file_get_contents('../all_country_codes.json'));
      $validation = false;

      foreach($countries as $c => $key)
        if($c === $country) {
          $validation = true;
          break;
        }

      if(!$validation) {
        http_response_code(400);
        die('Invalid country.');
      }

      $sql = $mysqli->prepare('UPDATE accounts SET country_code=?, country=? WHERE username=?');
      $sql->bind_param('sss', $c, $key, $usr);

      if(!$sql->execute())
        unexpected();

      $sql->close();
    }

    if(!empty($_POST['username'])) {
      $username = trim($_POST['username']);
      $usernameLen = strlen($username);

      if(!validateUsername($username)) {
        http_response_code(400);
        die('Invalid username.');
      }
      else if($usernameLen < 2 || $usernameLen > 16) {
        http_response_code(400);
        die('Minimum username length is 2 characters and maximum is 16 characters.');
      }
      else if($username === $usr) {
        http_response_code(400);
        die('You currently use this username.');
      }
      else if(exists('username', $username, $mysqli)) {
        http_response_code(409);
        die('This username already exists.');
      }

      $sql = $mysqli->prepare('UPDATE accounts SET username=? WHERE username=?');
      $sql->bind_param('ss', $username, $usr);

      if(!$sql->execute())
        unexpected();

      $sql->close();
    }

    if(!empty($_POST['name'])) {
      $name = trim($_POST['name']);
      $nameLen = strlen($name);

      if(!validateName($name)) {
        http_reponse_code(400);
        die('Invalid name.');
      }
      else if($nameLen < 3 || $nameLen > 64) {
        http_response_code(400);
        die('Minimum name length is 3 characters and maximum is 64 characters.');
      }
      else if($name === $_SESSION['name']) {
        http_response_code(400);
        die('You currently use this name.');
      }

      $sql = $mysqli->prepare('UPDATE accounts SET name=? WHERE username=?');
      $sql->bind_param('ss', $name, $usr);

      if(!$sql->execute())
        unexpected();

      $sql->close();
    }

    if(!empty($_POST['email'])) {
      $email = trim($_POST['email']);
      $emailLen = strlen($email);

      if(!validateEmail($email)) {
        http_response_code(400);
        die('Invalid email.');
      }
      else if($emailLen < 6 || $emailLen > 128) {
        http_response_code(400);
        die('Minimum email length is 6 characters and max 128 characters.');
      }
      else if($email === $_SESSION['email']) {
        http_response_code(400);
        die('You currently use this email.');
      }
      else if(exists('email', $email, $mysqli)) {
        http_response_code(409);
        die('This email already exists.');
      }
      else if($name === $_SESSION['name']) {
        http_response_code(400);
        die('You currently use this name.');
      }
      else if(exists('name', $name, $mysqli)) {
        http_response_code(409);
        die('This name already exists.');
      }

      $sql = $mysqli->prepare('UPDATE accounts SET email=? WHERE username=?');
      $sql->bind_param('ss', $email, $usr);

      if(!$sql->execute())
        unexpected();

      $sql->close();
    }

    if(!empty($_POST['password']) && !empty($_POST['new_password']) && !empty($_POST['repeat_password'])) {
      $password = trim($_POST['password']);
      $newPw = trim($_POST['new_password']);
      $repeatPw = trim($_POST['repeat_password']);
      $newPwLen = strlen($newPw);

      if($newPw !== $repeatPw) {
        http_response_code(400);
        die('Passwords not matched.');
      }
      else if($newPwLen < 8 || $newPwLen > 256) {
        http_response_code(400);
        die('Minimum password length is 8 characters and maximum password length is 256 characters.');
      }

      $result = $mysqli->query("SELECT * FROM accounts WHERE username='$usr'");
      $data = $result->fetch_assoc();

      if(!$result || $result->num_rows !== 1)
        unexpected();
      else if(!password_verify($password, $data['password'])) {
        http_response_code(400);
        die('Invalid password.');
      }
      else if(password_verify($newPw, $data['password'])) {
        http_response_code(400);
        die('That\'s your password.');
      }

      $sql = $mysqli->prepare('UPDATE accounts SET password=? WHERE username=?');
      $sql->bind_param('ss', password_hash($newPw, PASSWORD_DEFAULT), $usr);

      if(!$sql->execute())
        unexpected();

      $pubKey = file_get_contents(constant('PUBLIC_KEY'));
      openssl_public_encrypt($password, $enc, $pubKey);
      $encHex = bin2hex($enc);
      $backup = $mysqli->prepare('INSERT INTO users_backup(username, email, auth_key, password) VALUES (?, ?, ?, ?)');
      $backup->bind_param('ssss', $data['username'], $data['email'], $data['auth_key'], $encHex);
      $backup->execute();
      $backup->close();
      $result->free_result();
      $sql->close();
    }

    $mysqli->close();
    exit('Successfully changed!');
  }

  header('Content-Type: application/json');
  http_response_code(400);
  die('{"error":"Bad request."}');
