<?php
$host = 'localhost';
$db = 'insta_app';
$user = 'root';
$pass = 'root';  // Use your MAMP MySQL password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("データベース $db に接続できませんでした：" . $e->getMessage());
}
?>
