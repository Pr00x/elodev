<?php
  session_name('elodev_session');
  session_start();

  function validate($str) {
    return trim(stripslashes(htmlentities($str, ENT_QUOTES | ENT_HTML5, 'UTF-8')));
  }

  function csrf() {
    $token = bin2hex(random_bytes(32));
    $_SESSION['csrf_token'] = $token;
    $_SESSION['csrf_token_time'] = time();

    return $token;
  }

  function csrfCheck($csrfToken) {
    $csrfTime = $_SESSION['csrf_token_time'] ?? 0;

    if(empty($csrfTime) || $_SESSION['csrf_token'] !== $csrfToken) {
      http_response_code(403);
      die('Invalid CSRF Token.');
    }
    else if(($csrfTime + (60 * 60 * 24)) < time()) {
      unset($_SESSION['csrf_token']);
      unset($_SESSION['csrf_token_time']);
      http_response_code(403);
      die('CSRF Token Expired.');
    }
  }

  $secKey = '428a3a3be22aa326dc178c23f4P4aracb0c77c5eX2e95392a68876480b2f';

  function logged_in($session, $redirect, $key) {
    if(!isset($session['token'], $session['email'], $session['username'], $session['name'])) {
      header("Location: /$redirect");
      die();
    }
    else if($session['token'] !== md5($_SERVER['HTTP_USER_AGENT'].$key.$_SERVER['HTTP_USER_AGENT'].$_SERVER['HTTP_USER_AGENT'].$session['email'].$session['username'])) {
      error_log('TEST!');
      header("Location: /logout.php");
      die();
    }
  }

  function logged_out($session, $redirect) {
    if(isset($session['token'], $session['email'], $session['username'], $session['name'])) {
      header("Location: /$redirect");
      die();
    }
  }

  function hpp($uri, $param) {
    return strpos($uri, $param) !== strrpos($uri, $param);
  }

  /* $cfg = [
    'digest_alg' => 'sha512',
    'private_key_bits' => 2048,
    'private_key_type' => OPENSSL_KEYTYPE_RSA
  ]; */
?>
