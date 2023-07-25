<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>基本情報技術者試験×クイズ</title>
        <link rel="stylesheet" href="../css/navigation.css">
        <link rel="stylesheet" href="css/list.css">
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
            </h2>
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
                <h1>作問一覧</h1>
                <div class="container">
                    <div class="tes">
                    <input type="button" class="delete" value="削除">
                    <input type="button" class="edit" value="編集">
                    </div>
                    <div class="Problemlist">
                        <a href="" class="question">問題1</a>
                        <a href="" class="question">問題2</a>
                        <a href="" class="question">問題3</a>
                        <a href="" class="question">問題4</a>
                        <a href="" class="question">問題5</a>
                        <a href="" class="question">問題6</a>
                    </div>                
                </div>
            </div>
        </div>
    </body>
</html>