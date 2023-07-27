<?php
require_once 'C:\xampp\htdocs\ExamQuiz\connect.php';

// POSTデータを受け取る
$user_id = 'user1'; // 仮の値として1を指定。実際にはセッションや認証を使用してユーザーIDを取得するべきです。
$question = $_POST['question'];
$question_Genre = "作問"; // ジャンルに対応するデータを受け取る必要があります。
$answer = $_POST['answer'];



// データを挿入するSQLクエリを作成
$sql = "INSERT INTO question_description (user_id, question, question_Genre, answer) 
        VALUES ('$user_id', '$question', '$question_Genre', '$answer')";

if ($connection->query($sql) === TRUE) {
    echo "データが正常に登録されました。";
} else {
    echo "エラー: " . $sql . "<br>" . $connection->error;
}

// データベース接続を閉じる
$connection->close();
?>