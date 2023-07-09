<?php
session_start();

if (isset($_SESSION['username'])) {
    // ログイン済み
    echo "You are logged in as: " . $_SESSION['username'];
}

// データベース接続情報
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "examquiz";

// フォームから送信されたユーザー名とパスワードを取得
$username = $_POST['username'];
$password = $_POST['password'];

// データベースに接続
$connection = new mysqli($host, $dbUsername, $dbPassword, $dbName);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// ユーザー名とパスワードの一致を確認するクエリを作成
$query = "SELECT * FROM user_status WHERE User_Name='$username' AND Pass_word='$password'";
$result = $connection->query($query);

if ($result->num_rows == 1) {
    // ログイン成功
    $_SESSION['username'] = $username;
    header("Location: ../mypage/index.html");
} else {
    // ログイン失敗

    header("Location: index.php");
}

$connection->close();

?>