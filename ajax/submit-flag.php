<?php
  include '../cfg/db.php';
  include '../cfg/security.php';

  logged_in($_SESSION, 'login.php', $secKey);

  function unexpected() {
    http_response_code(500);
    die('Unexpected error occurred.');
  }

  function validateUsername($str) {
    return (preg_match('/^[a-zA-Z][a-zA-Z0-9_]+$/', $str) && !strpos($str, ' '));
  }

  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $challenge = $_POST['challenge_name'] ?? NULL;
    $points = (int)$_POST['points'] ?? NULL;
    $flag = $_POST['flag'] ?? NULL;
    $id = (int)$_POST['id'] ?? NULL;
    $csrf = $_POST['_csrf'];
    $username = $_SESSION['username'];

    csrfCheck($csrf);

    if(!isset($challenge, $points, $flag, $id)) {
      http_response_code(400);
      die('Bad request.');
    }

    $sql = $mysqli->prepare('SELECT flag FROM flags WHERE flag=? AND points=? AND id=? AND challenge=?');
    $sql->bind_param('siis', $flag, $points, $id, $challenge);

    if(!$sql->execute())
      unexpected();

    $result = $sql->get_result();

    if($result->num_rows !== 1) {
      $result->free_result();
      $sql->close();
      $mysqli->close();
      http_response_code(400);
      die('Invalid flag.');
    }

    if(!validateUsername($username)) {
      header('Location: /logout.php');
      die();
    }

    $result1 = $mysqli->query("SELECT * FROM accounts WHERE username='$username'");

    if(!$result1 || $result1->num_rows !== 1)
      unexpected();

    $usr = $result1->fetch_row();
    $authKey = $usr[4] ?? NULL;
    $exi = $mysqli->prepare("SELECT * FROM chads WHERE flag=? AND auth_key=?");
    $exi->bind_param('ss', $flag, $authKey);

    if(!$exi->execute())
      unexpected();

    $exi->get_result();
    $exi->close();

    if($exists->num_rows === 1) {
      http_response_code(403);
      die('You\'ve already solved this challenge.');
    }

    $result1 = $mysqli->prepare("INSERT INTO chads(flag, auth_key, id) VALUES(?, ?, ?)");
    $result1->bind_param('ssi', $flag, $authKey, $id);

    if(!$result1->execute())
      unexpected();

    $usrPoints = (int)$usr[11] + $points;
    $ranks = ['noob', 'skid', 'programmer', 'pro programmer', 'it expert', 'hacker', 'pro hacker', 'master', 'extremist'];
    $changeRank = $ranks[0];

    if($usrPoints > 100 && $usrPoints < 200)
      $changeRank = $ranks[1];
    else if($usrPoints > 200 && $usrPoints < 300)
      $changeRank = $ranks[2];
    else if($usrPoints > 300 && $usrPoints < 400)
      $changeRank = $ranks[3];
    else if($usrPoints > 400 && $usrPoints < 500)
      $changeRank = $ranks[4];
    else if($usrPoints > 500 && $usrPoints < 600)
      $changeRank = $ranks[5];
    else if($usrPoints > 600 && $usrPoints < 700)
      $changeRank = $ranks[6];
    else if($usrPoints > 700 && $usrPoints < 800)
      $changeRank = $ranks[7];
    else if($usrPoints > 800)
      $changeRank = $ranks[8];

    if(!$mysqli->query("UPDATE accounts SET points=$usrPoints,rank='$changeRank' WHERE username='$username'"))
      unexpected();

    $result->free_result();
    $result1->close();
    $sql->close();
    $mysqli->close();
    exit('Successfully solved the challenge!');
  }

  header('Content-Type: application/json');
  http_response_code(400);
  die('{"err":"Bad request."}');
