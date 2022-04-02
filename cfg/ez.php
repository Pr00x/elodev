<?php
  $str = hex2bin($argv[1]);
$privKey = file_get_contents('./private_key.pem');
  openssl_private_decrypt($str, $dec, $privKey);
  echo "Dec: $dec";
