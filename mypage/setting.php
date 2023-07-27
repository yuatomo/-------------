<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>基本情報技術者試験×クイズ</title>
        <link rel="stylesheet" href="../css/navigation.css">
        <link rel="stylesheet" href="css/setting.css">
        <script src="../js/navigation.js"></script>
        <script src="js/setting.js"></script>
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
                <h1>設定</h1>
                <div class="container">
                    <h2>BGM</h2>
                    <div class="container2">
                        <div class="tyuuouyose">
                                <input type="range" id="slider01" min="0" max="100" step="1" value="50" class="slider01" oninput="display_value_slider('slider01');">
                                <span id="slider01Value"></span>
                        </div>
                    </div>
                    <h2>SE</h2>
                    <div class="container2">
                        <div class="tyuuouyose">
                            <input type="range" id="slider02" min="0" max="100" step="1" value="50" class="slider02" oninput="display_value_slider('slider02');">
                            <span id="slider02Value"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>