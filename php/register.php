<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if username already exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $existing_user = $stmt->fetch();

    if ($existing_user) {
        echo "このユーザー名は既に使用されています。他のユーザー名を選んでください。";
    } else {
        // Insert new user if username doesn't exist
        $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->execute([$username, $password]);

        header("Location: ../index.php");
    }
}
?>
