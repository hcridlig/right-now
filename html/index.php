<?php

$password = password_hash('password', CRYPT_SHA512);
echo "<br>";
echo password_verify('password', $password);

?>