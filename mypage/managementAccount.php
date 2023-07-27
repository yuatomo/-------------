<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>基本情報技術者試験×クイズ</title>
        <link rel="stylesheet" href="../css/navigation.css">
        <link rel="stylesheet" href="css/managementAccount.css">
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
                
                    <h1>アカウント管理</h1>
                <div class="container">
                    <h2>パスワード変更</h2>
                    <!--container2はパスワード変更の緑の線とパスワード入力欄を合わせる処理のためのクラス名-->
                    <div class="container2">
                    <form action="login.php" method="POST">
                        <div class="form-group">
                            <label for="password"><img src="../image/key.png" class="icon2">パスワード:</label>
                            <input type="password" id="password" name="password" >
                        </div>
                        <div class="form-group">
                            <label for="confirmationpassword"><img src="../image/key.png" class="icon2">確認パスワード:</label>
                            <input type="password" id="confirmationpassword" name="confirmationpassword" >
                        </div>
                        <div class="form-group">
                            <div class="change">
                            <input type="submit" value="変更する">
                            </div>
                        </div>
                        </form>
                        </div>
                        <h2>アカウント削除</h2>
                        <div class="container2">
                        <form action="login.php" method="POST">
                            <div class="form-group">
                            <label for="Deletepassword"><img src="../image/key.png" class="icon2">パスワード:</label>
                            <input type="password" id="Deletepassword" name="Deletepassword" >
                        </div>
                        <div class="delete">
                        <input type="submit" value="削除する">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </body>
</html>