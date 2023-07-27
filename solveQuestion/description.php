<?php
require_once 'C:\xampp\htdocs\ExamQuiz\connect.php';

// ページがPOSTリクエストされた場合
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 現在の問題番号を取得
    $currentQuestionNumber = $_POST["question_number"];
    // 次の問題番号を計算
    $nextQuestionNumber = $currentQuestionNumber + 1;

    // 問題を取得するSQLクエリ
    $sql = "SELECT question FROM question_description ORDER BY question_no LIMIT 1 OFFSET " . ($nextQuestionNumber - 1);


    $result = $connection->query($sql);

    // 結果が1つ以上の行を含む場合、次の問題を取得
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $question = $row["question"];
        // 次の問題番号をhiddenフィールドとしてフォームに含める
        echo '<input type="hidden" name="question_number" value="' . $nextQuestionNumber . '">';
    } else {
        // 問題がない場合はメッセージを表示
        $question = "問題がありません。";
    }
} else {
    // 最初のページロード時に最初の問題を表示するために最初の問題番号を1に設定
    $nextQuestionNumber = 1;

    // 最初の問題を取得するSQLクエリ
    $sql = "SELECT question FROM question_description ORDER BY question_no LIMIT 1";

    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $question = $row["question"];
        // 次の問題番号をhiddenフィールドとしてフォームに含める
        echo '<input type="hidden" name="question_number" value="' . $nextQuestionNumber . '">';
    } else {
        $question = "問題がありません。";
    }
}

// データベース接続を閉じる
$connection->close();
?>

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
            <li><a href="../createQuestion/index.php">作問</a></li>
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
                <div class="tes">
                    <a class="interruption">中断する</a>
                    <a class="now">X問正解!!! 正答率X問回答中・・・</a>
                    <a class="skip">スキップ</a>
                </div>
                <form action="" method="post">
                    <div class="mondaibun">
                        <a class="Problemstatement" name="question"><?php echo $question; ?></a>
                    </div>
                    <div class="kaitoubun">
                        <textarea class="Answersentence" placeholder="回答文" name="answer"></textarea>
                    </div>
                    <!-- 次の問題番号をhiddenフィールドとしてフォームに含める -->
                    <input type="hidden" name="question_number" value="<?php echo $nextQuestionNumber; ?>">
                    <div class="answerbutton">
                        <input type="submit" value="回答">
                    </div>
                </form>
            </div>

        </div>
    </div>
</body>

</html>