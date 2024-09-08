<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTellアプリ</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>YouTellアプリへようこそ</h1>
        <div class="login-box">
            <h2>ログイン</h2>
            <form action="/youtell-app/php/login.php" method="POST">
                <input type="text" name="username" placeholder="ユーザー名" required>
                <input type="password" name="password" placeholder="パスワード" required>
                <button type="submit">ログイン</button>
            </form>
        </div>

        <div class="register-box">
            <h2>新規登録</h2>
            <form action="/youtell-app/php/register.php" method="POST">
                <input type="text" name="username" placeholder="ユーザー名" required>
                <input type="password" name="password" placeholder="パスワード" required>
                <button type="submit">登録</button>
            </form>
        </div>
    </div>
</body>
</html>
