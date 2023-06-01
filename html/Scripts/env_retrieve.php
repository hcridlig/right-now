<?php
require_once 'DotEnv.php';
(new DotEnv('/var/www/html/.env'))->load();
$DB_HOST = getenv('DB_HOST');
$DB_USER = getenv('DB_USER');
$DB_PASS = getenv('DB_PASS');
$API_KEY = getenv('API_KEY');
?>