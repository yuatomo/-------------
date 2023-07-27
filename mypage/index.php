<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>基本情報技術者試験×クイズ</title>
        <link rel="stylesheet" href="../css/navigation.css">
        <link rel="stylesheet" href="css/index.css">
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
            <h1>マイページ</h1>
            <div class="container">
                <a href="gradeList.php" class="Button">成績</a>
                <a href="growthRecord.php" class="Button">成長曲線</a>
                <a href="managementAccount.php" class="Button">アカウント管理</a>
                <a href="logout.php" class="Button">ログアウト</a>
            </div>
        </div>
        </div>
    </body>
</html>