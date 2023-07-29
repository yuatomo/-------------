<?php 
require_once 'C:\xampp\htdocs\ExamQuiz\connect.php';

session_start();

// データベースから値を取得するクエリ
$sql = "SELECT * FROM user_answer WHERE username = '" . $_SESSION['username'] . "' ORDER BY answer_no DESC LIMIT 5";
$result = $connection->query($sql);

// データを格納するためのHTML文字列
$tableHTML = "<table border='1' style='margin: 0 auto;'>
               <tr>
                   <th width='100px'>回答番号</th>
                   <th width='120px'>ユーザー名</th>
                   <th width='300px'>問題</th>
                   <th width='50px'>正誤</th>
                   <th width='100px'>ユーザーの回答</th>
                   <th width='150px'>回答日時</th>
               </tr>";

// データをループしてHTMLに格納する
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if($row["question_no"] < 10000) {
            $sql2 = "SELECT * FROM question_fourchoice WHERE question_no = " . $row["question_no"];
            $result2 = $connection->query($sql2);
            if ($result2->num_rows > 0) {
                while ($row2 = $result2->fetch_assoc()) {
                    $question = $row2["question"];
                }
            } else {
                $question = "問題が見つかりませんでした。";
            }
        } else {
            $sql3 = "SELECT * FROM question_description WHERE question_no = " . $row["question_no"];
            $result3 = $connection->query($sql3);
            if ($result3->num_rows > 0) {
                while ($row3 = $result3->fetch_assoc()) { 
                    $question = $row3["question"];
                }
            } else {
                $question = "問題が見つかりませんでした。";
            }
        }
        

        $is_correct = $row["is_correct"] ? "○" : "×";
        if($row["user_answer"] == 1) {
            $user_answer = "ア";
        } else if($row["user_answer"] == 2) {
            $user_answer = "イ";
        } else if($row["user_answer"] == 3) {
            $user_answer = "ウ";
        } else if($row["user_answer"] == 4) {
            $user_answer = "エ";
        } else {
            $user_answer = $row["user_answer"];
        }
        $tableHTML .= "<tr>
                        <td>" . $row["answer_no"] . "</td>
                        <td>" . $row["username"] . "</td>
                        <td>" . $question . "</td>
                        <td>" . $is_correct . "</td>
                        <td>" . $user_answer . "</td>
                        <td>" . $row["answer_date"] . "</td>
                      </tr>";
    }
} else {
    $tableHTML .= "<tr><td colspan='6'>データがありません</td></tr>";
}

// テーブルの閉じタグを追加
$tableHTML .= "</table>";

// データベース接続を閉じる
$connection->close();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>基本情報技術者試験×クイズ</title>
        <link rel="stylesheet" href="../css/navigation.css">
        <link rel="stylesheet" href="css/gradeList.css">
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
                <h1>成績</h1><br>
                <div class="center">
                    <?php echo $tableHTML; ?>
                </div>
                <!--
                <div class="container">
                <div class="selection">
                <div class="cp_ipselect cp_sl04">
                    <select required>
                        <option value="Bygenre" hidden>ジャンル別</option>
                        <option value="technology">テクノロジー系</option>
                        <option value="strategy">ストラテジ系</option>
                        <option value="management">マネジメント系</option>
                    </select>
                    </div>
                    </div>
            <div class="Listofgrades">
            <a class="Grade">成績１</a>
            <a class="Grade">成績２</a>
            <a class="Grade">成績３</a>
            <a class="Grade">成績４</a>
            <a class="Grade">成績5</a>
            <a class="Grade">成績6</a>
            </div>
            </div>
            </div>
            -->
        </div>
    </body>
</html>