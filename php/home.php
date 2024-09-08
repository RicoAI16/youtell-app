<?php
session_start();
include 'config.php';

// If user not logged in, redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit;
}

// Handle form submission for posting
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $content = $_POST['content'];
    $username = $_SESSION['username'];

    $stmt = $pdo->prepare("INSERT INTO posts (username, content) VALUES (?, ?)");
    $stmt->execute([$username, $content]);

    header("Location: home.php");
    exit;
}

// Fetch all posts
$stmt = $pdo->prepare("SELECT * FROM posts ORDER BY id DESC");
$stmt->execute();
$posts = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTellアプリ - ホーム</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h1><?php echo $_SESSION['username']; ?>さん、YouTellアプリへようこそ！</h1>
        
        <div class="post-box">
            <form action="home.php" method="POST">
                <textarea name="content" placeholder="今何している？" required></textarea>
                <button type="submit">投稿する</button>
            </form>
        </div>

        <h2>投稿一覧</h2>
        <?php foreach ($posts as $post): ?>
            <div class="post">
                <strong><?php echo $post['username']; ?>:</strong>
                <p><?php echo $post['content']; ?></p>
            </div>
        <?php endforeach; ?>
        <a href="logout.php">ログアウト</a>
    </div>
</body>
</html>
