<?php

require_once "./php-server-conf.php";
require_once "./db-connect.php";

$type = $_GET['q'];
$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'OPTIONS') {
    exit;
}

require_once __DIR__.'/Modules/Bracket/index.php';