<?php
// データベース接続情報
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "examquiz";

// POSTデータを受け取る
$user_id = "1";
$question = $_POST['question'];
$question_genre = "作問";
$choice1 = $_POST['choice1'];
$choice2 = $_POST['choice2'];
$choice3 = $_POST['choice3'];
$choice4 = $_POST['choice4'];
$answer = $_POST['answer'];

// データベースに接続
$connection = new mysqli($host, $dbUsername, $dbPassword, $dbName);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// データを挿入するSQLクエリを作成
$sql = "INSERT INTO question_fourchoice (user_id, question, question_genre, choice1, choice2, choice3, choice4, answer) 
        VALUES ('$user_id', '$question', '$question_genre', '$choice1', '$choice2', '$choice3', '$choice4', '$answer')";

if ($connection->query($sql) === TRUE) {
    echo "データが正常に登録されました。";
} else {
    echo "エラー: " . $sql . "<br>" . $conn->error;
}

// データベース接続を閉じる
$connection->close();
?>