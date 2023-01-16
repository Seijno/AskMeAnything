<?php

$servername = "localhost";
$dbname = "ask_me_anything";
$username = "root";
$password = "";

try {
  $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
} catch(PDOException $e) {
  alert("Connection failed: " . $e->getMessage());
}

?>