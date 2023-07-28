<?php
require_once 'C:\xampp\htdocs\ExamQuiz\connect.php';

// ページがPOSTリクエストされた場合
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 現在の問題番号を取得
    $currentQuestionNumber = $_POST["question_number"];
    // 次の問題番号を計算
    $nextQuestionNumber = $currentQuestionNumber + 1;

    $_POST["question_count"]++;
    $questionCount = $_POST["question_count"];
    echo '<input type="hidden" name="question_count" value=' . $questionCount . '>';

    session_start();

    $sql = "SELECT * FROM question_description WHERE question_no = " . $_POST["question_number"] . " AND answer = '" . $_POST["answer"] . "'";
    $result = $connection->query($sql);
    // 正解した時の処理
    if ($result->num_rows > 0) {
        if (isset($_SESSION['username'])) {
            $sql = "INSERT INTO user_answer VALUES (NULL, '" . $_SESSION['username'] . "', '" . $_POST["question_number"] ."', 
            '" . 1 . "', '" . $_POST['answer']. "', '" . date("Y-m-d") . "')";
            $result = $connection->query($sql);
        }
        $is_correct = true;
    } else {
        if (isset($_SESSION['username'])) {
            $sql = "INSERT INTO user_answer VALUES (NULL, '" . $_SESSION['username'] . "', '" . $_POST["question_number"] ."', 
            '" . 0 . "', '" . $_POST['answer'] . "', '" . date("Y-m-d") . "')";
            $result = $connection->query($sql);
        }
        $is_correct = false;
    }

    if ($is_correct) {
        $answer = "正解です！";
        $_POST["correct_answer_count"]++;
        $correctAnswerCount = $_POST["correct_answer_count"];
        echo '<input type="hidden" name="correct_answer_count" value="' . $correctAnswerCount . '">';
    } else {
        $answer = "不正解です";
        $correctAnswerCount = $_POST["correct_answer_count"];
        echo '<input type="hidden" name="correct_answer_count" value="' . $correctAnswerCount . '">';
    }

    // 問題を取得するSQLクエリ
    $sql = "SELECT question FROM question_description ORDER BY question_no LIMIT 1 OFFSET " . ($nextQuestionNumber - 10001);


    $result = $connection->query($sql);

    // 結果が1つ以上の行を含む場合、次の問題を取得
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $question = $row["question"];
        // 次の問題番号をhiddenフィールドとしてフォームに含める
        echo '<input type="hidden" name="question_number" value="' . $nextQuestionNumber . '">';
    } else {
        $_SESSION['question_count'] = $_POST["question_count"];
        $_SESSION['correct_answer_count'] = $_POST["correct_answer_count"];
        header("Location: grade.php");
        exit();
    }
} else {
    // 最初のページロード時に最初の問題を表示するために最初の問題番号を10001に設定
    $nextQuestionNumber = 10001;
    $answer = "";
    $questionCount = 0;
    $correctAnswerCount = 0;

    // 最初の問題を取得するSQLクエリ
    $sql = "SELECT question FROM question_description ORDER BY question_no LIMIT 1";

    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $question = $row["question"];
        // 次の問題番号をhiddenフィールドとしてフォームに含める
        echo '<input type="hidden" name="question_number" value="' . $nextQuestionNumber . '">';
        echo '<input type="hidden" name="question_count" value="' . $questionCount . '">';
        echo '<input type="hidden" name="correct_answer_count" value="' . $correctAnswerCount . '">';
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
                    <!--
                    <a class="interruption">中断する</a>
                    <a class="now">X問正解!!! 正答率X問回答中・・・</a>
                    <a class="skip">スキップ</a>
                    -->
                </div>
                <form action="" method="post">
                    <p>
                    <span id="question_count"></span>
                    問中
                    <span id="correct_answer_count"></span>
                    問正解！　
                    正答率<span id="correct_answer_percentage"></span>％
                    </p>
                    <p><?php echo $answer; ?></p>
                    <script>
                        // hiddenフィールドの値を取得
                        let question_count = document.querySelector('input[name="question_count"]').value;

                        // 結果を表示する要素にhiddenフィールドの値を追加
                        let resultElement = document.getElementById('question_count');
                        resultElement.innerText = question_count;

                        // hiddenフィールドの値を取得
                        let correct_answer_count = document.querySelector('input[name="correct_answer_count"]').value;

                        // 結果を表示する要素にhiddenフィールドの値を追加
                        let resultElement2 = document.getElementById('correct_answer_count');
                        resultElement2.innerText = correct_answer_count;
                        
                        // hiddenフィールドの値を取得
                        let resultElement3 = document.getElementById('correct_answer_percentage');

                        if(parseInt(correct_answer_count) === 0) {
                            resultElement3.innerText = 0;
                        } else {
                            let percentage = (parseInt(correct_answer_count) / parseInt(question_count)) * 100;
                            let roundedPercentage = Math.floor(percentage * 10) / 10;

                            resultElement3.innerText = roundedPercentage;
                        }
                    </script>
                    <div class="mondaibun">
                        <p class="Problemstatement" name="question"><?php echo $question; ?></ｐ>
                    </div>
                    <div class="kaitoubun">
                        <textarea class="Answersentence" placeholder="回答文" name="answer"></textarea>
                    </div>
                    <!-- 次の問題番号をhiddenフィールドとしてフォームに含める -->
                    <input type="hidden" name="question_number" value="<?php echo $nextQuestionNumber; ?>">
                    <input type="hidden" name="question_count" value="<?php echo $questionCount; ?>">
                        <input type="hidden" name="correct_answer_count" value="<?php echo $correctAnswerCount; ?>">
                    <div class="answerbutton">
                        <input type="submit" value="回答">
                    </div>
                </form>
            </div>

        </div>
    </div>
</body>

</html>