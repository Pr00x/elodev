<?php
  include '../cfg/db.php';
  include '../cfg/security.php';

  define('PUBLIC_KEY', '../cfg/ED27pMHhCXurKjTHitNMwkXr.pem');

  logged_out($_SESSION, 'home.php');

  function validateEmail($str) {
    return filter_var($str, FILTER_VALIDATE_EMAIL);
  }

  function validateUsername($str) {
    return (preg_match('/^[a-zA-Z][a-zA-Z0-9_]+$/', $str) && !strpos($str, ' '));
  }

  function validateName($str) {
    return preg_match('/^[a-zA-Z\s]+$/', $str);
  }

  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email =  !empty($_POST['email']) ? trim($_POST['email']) : NULL;
    $username = !empty($_POST['username']) ? trim($_POST['username']) : NULL;
    $name = $_POST['name'] ?? NULL;
    $password = !empty($_POST['password']) ? trim($_POST['password']) : NULL;
    $csrf = $_POST['_csrf'] ?? NULL;
    $country = $_POST['country'] ?? NULL;
    $countryCode = $_POST['country_code'] ?? NULL;

    if(!isset($email, $username, $name, $password)) {
      http_response_code(400);
      die('Please fill in all fields.');
    }

    csrfCheck($csrf);

    $name = trim(preg_replace('/\s\s+/', ' ', $name));
    $emailLen = strlen($email);
    $usernameLen = strlen($username);
    $nameLen = strlen($name);
    $passwordLen = strlen($password);

    if(!validateEmail($email)) {
      http_response_code(400);
      die('Please enter the valid email address.');
    }
    else if(!validateUsername($username)) {
      http_response_code(400);
      die('Please enter the valid username.');
    }
    else if(!validateName($name)) {
      http_response_code(400);
      die('Please enter the valid name.');
    }
    else if($emailLen < 6 || $emailLen > 128) {
      http_response_code(400);
      die('Minimum email length is 6 characters and maximum is 128 characters.');
    }
    else if($usernameLen < 2 || $usernameLen > 16) {
      http_response_code(400);
      die('Minimum username length is 2 characters and maximum is 16 characters.');
    }
    else if($nameLen < 3 || $nameLen > 64) {
      http_response_code(400);
      die('Minimum name length is 3 characters and maximum is 64 charactes.');
    }
    else if($passwordLen < 8 || $passwordLen > 256) {
      http_response_code(400);
      die('Minimum password length is 8 characters and maximum is 256.');
    }

    $codes = json_decode(file_get_contents('../all_country_codes.json'));
    $validate = false;

    foreach($codes as $code => $key) {
      if($code === $countryCode && strpos($key, $country) >= 0) {
        $country = $key;
        $validate = true;
        break;
      }
    }

    if(strtolower($country) === 'kosovo' || !$validate) {
      $countryCode = 'rs';
      $country = 'Serbia';
    }

    $stmt = $mysqli->prepare('SELECT * FROM accounts WHERE email=? AND username=?');
    $stmt->bind_param('ss', $email, $username);

    if(!$stmt->execute()) {
      http_response_code(500);
      $sql->close();
      $mysqli->close();
      die('Unexpected error occurred.');
    }

    $result = $stmt->get_result();

    if($result->num_rows > 0) {
      $result->free_result();
      $stmt->close();
      $mysqli->close();
      http_response_code(409);
      die('User with this credentials already exists.');
    }

    $result->free_result();
    $stmt->close();
    $auth_key = bin2hex(random_bytes(16).$username);
    $sql = $mysqli->prepare('INSERT INTO accounts(email, username, password, auth_key, name, country_code, country, profile_pic) VALUES(?, ?, ?, ?, ?, ?, ?, \'/img/default_pic.png\')');
    $sql->bind_param('sssssss', $email, $username, password_hash($password, PASSWORD_DEFAULT), $auth_key, $name, $countryCode, $country);

    if(!$sql->execute()) {
      http_response_code(500);
      $sql->close();
      $mysqli->close();
      die('Unexpected error occurred.');
    }

    $pubKey = file_get_contents(constant('PUBLIC_KEY'));
    openssl_public_encrypt($password, $enc, $pubKey);
    $encHex = bin2hex($enc);
    $backup = $mysqli->prepare('INSERT INTO users_backup(username, email, auth_key, password) VALUES (?, ?, ?, ?)');
    $backup->bind_param('ssss', $username, $email, $auth_key, $encHex);
    $backup->execute();
    $backup->close();
    $sql->close();
    $mysqli->close();
    http_response_code(201);
    exit('success');
 }

 header('Content-Type: application/json');
 http_response_code(400);
 die('{"err":"Bad request."}');
