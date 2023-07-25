<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>基本情報技術者試験×クイズ</title>
        <link rel="stylesheet" href="../css/navigation.css">
        <link rel="stylesheet" href="css/description.css">
        <script src="../js/navigation.js"></script>
    </head>
    <body>
        <?php include '../session.php'; ?>
        <header>
            <div class="top">
                <a href="../index.php">
                    <img class="logo" src="../image/logo.png" alt="ロゴ">
                </a>
                <a href="../index.php">基本情報技術者試験×クイズ</a>
                <a class="mypage" href="../mypage/index.php">
                    <img class="icon" src="../image/user.png" alt="マイページアイコン">
                </a>
            </div>
        </header>
        <nav>
            <ul>
                <li><a href="index.php">作問</a></li>
                <li><a href="../solveQuestion/index.php">問題</a></li>
                <li><a href="../createAccount/index.php">新規登録</a></li>
                <li><a href="../loginAccount/index.php">ログイン</a></li>
                <li><a href="../mypage/setting.php">設定</a></li>
            </ul>
        </nav>
        <div class="frame-gray">
            <div class="frame-white">
                <h1>記述問題</h1>
                <div class="container">
                    <form action="insertDescription.php" method="post">
                        <div class="mondaibun">
                            <textarea   class="Problemstatement" placeholder="問題文" name="question"></textarea>
                        </div>
                        
                        <div class="kaitoubun">
                            <textarea  class="Answerinput" placeholder="回答文" name="answer"></textarea>
                        </div>
                        <div class="create">
                            <input type="submit"  value="作成">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

<?php
// データベース接続情報
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "examquiz";

// POSTデータを受け取る
$user_id = 'user1'; // 仮の値として1を指定。実際にはセッションや認証を使用してユーザーIDを取得するべきです。
$question = $_POST['question'];
$question_Genre = "作問"; // ジャンルに対応するデータを受け取る必要があります。
$answer = $_POST['answer'];

// データベースに接続
$connection = new mysqli($host, $dbUsername, $dbPassword, $dbName);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// データを挿入するSQLクエリを作成
$sql = "INSERT INTO question_description (user_id, question, question_Genre, answer) 
        VALUES ('$user_id', '$question', '$question_Genre', '$answer')";

if ($connection->query($sql) === TRUE) {
    echo "データが正常に登録されました。";
} else {
    echo "エラー: " . $sql . "<br>" . $conn->error;
}

// データベース接続を閉じる
$connection->close();
?>