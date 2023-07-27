<?php
require_once 'C:\xampp\htdocs\ExamQuiz\connect.php';

// ページがPOSTリクエストされた場合
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 現在の問題番号を取得
    $currentQuestionNumber = $_POST["question_number"];
    // 次の問題番号を計算
    $nextQuestionNumber = $currentQuestionNumber + 1;

    // 問題を取得するSQLクエリ
    $sql = "SELECT question, choice1, choice2, choice3, choice4 FROM question_fourchoice ORDER BY question_no LIMIT 1 OFFSET " . ($nextQuestionNumber - 1);


    $result = $connection->query($sql);

    // 結果が1つ以上の行を含む場合、次の問題を取得
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $question = $row["question"];
        $choice_a = $row["choice1"];
        $choice_b = $row["choice2"];
        $choice_c = $row["choice3"];
        $choice_d = $row["choice4"];
        
        session_start();

        if (isset($_POST['choice'])) {
            if ($_POST['choice'] === 'ア') {
                $answer = checkAnswer($_POST["question_number"], 1, $connection);
            } elseif ($_POST['choice'] === 'イ') {
                checkAnswer($_POST["question_number"], 2, $connection);
            } elseif ($_POST['choice'] === 'ウ') {
                checkAnswer($_POST["question_number"], 3, $connection);
            } elseif ($_POST['choice'] === 'エ') {
                checkAnswer($_POST["question_number"], 4, $connection);
            }
        }

        // 次の問題番号をhiddenフィールドとしてフォームに含める
        echo '<input type="hidden" name="question_number" value="' . $nextQuestionNumber . '">';
    } else {
        // 問題がない場合はメッセージを表示
        $question = "問題がありません。";
        $choice_a = "回答がありません。";
        $choice_b = "回答がありません。";
        $choice_c = "回答がありません。";
        $choice_d = "回答がありません。";
    }
} else {
    // 最初のページロード時に最初の問題を表示するために最初の問題番号を1に設定
    $nextQuestionNumber = 1;

    // 最初の問題を取得するSQLクエリ
    $sql = "SELECT question, choice1, choice2, choice3, choice4 FROM question_fourchoice ORDER BY question_no LIMIT 1";

    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $question = $row["question"];
        $choice_a = $row["choice1"];
        $choice_b = $row["choice2"];
        $choice_c = $row["choice3"];
        $choice_d = $row["choice4"];
        $answer = "";
        // 次の問題番号をhiddenフィールドとしてフォームに含める
        echo '<input type="hidden" name="question_number" value="' . $nextQuestionNumber . '">';
    } else {
        $question = "問題がありません。";
        $choice_a = "回答がありません。";
        $choice_b = "回答がありません。";
        $choice_c = "回答がありません。";
        $choice_d = "回答がありません。";
        $answer = "";
    }
}

// データベース接続を閉じる
$connection->close();

function checkAnswer($question_no, $choice, $connection) {
    $sql = "SELECT * FROM question_fourchoice WHERE question_no = " . $question_no . " AND answer = " . $choice;
    $result = $connection->query($sql);
    // 正解した時の処理
    if (isset($_SESSION['username'])) {
        if ($result->num_rows > 0) {
            $sql = "INSERT INTO user_answer VALUES (NULL, '" . $_SESSION['username'] . "', '" . $question_no ."', 
            '" . 1 . "', '" . $choice . "', '" . date("Y-m-d") . "')";
            $result = $connection->query($sql);
            return "正解です！";
        } else {
            $sql = "INSERT INTO user_answer VALUES (NULL, '" . $_SESSION['username'] . "', '" . $question_no ."', 
            '" . 0 . "', '" . $choice . "', '" . date("Y-m-d") . "')";
            $result = $connection->query($sql);
            return "不正解です";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>基本情報技術者試験×クイズ</title>
    <link rel="stylesheet" href="../css/navigation.css">
    <link rel="stylesheet" href="css/four-choice.css">
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
            </h2>
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
            <h1>四択問題</h1>
            <div class="container">
                <div class="tes">
                    <!--
                    <a class="interruption">中断する</a>
                    <a class="now">X問正解!!! 正答率X問回答中・・・</a>
                    <a class="skip">スキップ</a>
                    -->
                </div>
                <form action="" method="post">
                    <p><?php echo $answer; ?></p>
                    <div class="mondai">
                        <p class="question"><?php echo $question; ?></p>
                    </div>

                    <div class="choiceQuestion">
                        <div class="1 number">
                            <input type="submit" name="choice" value="ア" class="A button">
                            <a class="A answer"><?php echo $choice_a; ?></a>
                        </div>

                        <div class="2 number">
                            <input type="submit" name="choice" value="イ" class="B button">
                            <a class="B answer"><?php echo $choice_b; ?></a>
                        </div>

                        <div class="3 number">
                            <input type="submit" name="choice" value="ウ" class="C button">
                            <a class="C answer"><?php echo $choice_c; ?></a>
                        </div>

                        <div class="4 number">
                            <input type="submit" name="choice" value="エ" class="D button">
                            <a class="D answer"><?php echo $choice_d; ?></a>
                        </div>
                        <input type="hidden" name="question_number" value="<?php echo $nextQuestionNumber; ?>">
                    </div>
                </form>
            </div>
        </div>
        
</body>

</html>