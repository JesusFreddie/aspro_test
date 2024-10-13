<?php

$host = 'db';
$port = '3306';
$dbname = 'aspro';
$user = 'root';
$password = '12345';

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

$pdo->query("
CREATE TABLE IF NOT EXISTS brackets (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    string VARCHAR(255) NOT NULL,
    success BOOLEAN NOT NULL
)
");