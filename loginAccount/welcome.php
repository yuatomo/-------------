<?php
session_start();

// ログインしていない場合はログインページにリダイレクト
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit;
}

// ログアウト処理
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: index.html");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
    <form action="welcome.php" method="POST">
        <input type="submit" name="logout" value="Logout">
    </form>
</body>
</html>