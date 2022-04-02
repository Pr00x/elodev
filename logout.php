<?php
  session_name('elodev_session');
  session_start();
  unset($_SESSION);
  session_destroy();
  session_write_close();
  header('Location: /login.php');
  exit();
