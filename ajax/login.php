<?php
  include '../cfg/db.php';
  include '../cfg/security.php';

  logged_out($_SESSION, 'home.php');

  function unauthorized($msg) {
    http_response_code(401);
    die($msg);
  }

  function setSession($data, $key) {
    $_SESSION['email'] = $data[1];
    $_SESSION['username'] = $data[2];
    $_SESSION['name'] = $data[5];
    $_SESSION['token'] = md5($_SERVER['HTTP_USER_AGENT'].$key.$_SERVER['HTTP_USER_AGENT'].$_SERVER['HTTP_USER_AGENT'].$data[1].$data[2]);
  }

  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usr = $_POST['usr'] ?? NULL;
    $pw = $_POST['pw'] ?? NULL;
    $csrf = $_POST['_csrf'] ?? NULL;

    if(!isset($usr, $pw)) {
      http_response_code(400);
      die('Please fill in all fields.');
    }

    csrfCheck($csrf);

    if(!strpos($usr, '@')) {
      $sql = $mysqli->prepare('SELECT * FROM accounts WHERE username=?');
      $sql->bind_param('s', $usr);
      $sql->execute();
      $result = $sql->get_result();

      if($result->num_rows !== 1) {
        $result->free_result();
        $sql->close();
        $mysqli->close();
        unauthorized('Invalid username or password.');
      }

      $data = $result->fetch_row();

      if(!password_verify($pw, $data[3]))
        unauthorized('Invalid username or password');

      setSession($data, $secKey);
      $result->free_result();
      $sql->close();
      $mysqli->close();
      exit('success');
    }

    $sql = $mysqli->prepare('SELECT * FROM accounts WHERE email=?');
    $sql->bind_param('s', $usr);
    $sql->execute();
    $result = $sql->get_result();

    if($result->num_rows !== 1) {
      $result->free_result();
      $sql->close();
      $mysqli->close();
      unauthorized('Invalid email address or password.');
    }

    $data = $result->fetch_row();

    if(!password_verify($pw, $data[3]))
      unauthorized('Invalid email address or password');

    setSession($data, $secKey);
    $result->free_result();
    $sql->close();
    $mysqli->close();
    exit('success');
  }

  header('Content-Type: application/json');
  http_response_code(400);
  die('{"err":"Bad request."}');
