<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>基本情報技術者試験×クイズ</title>
        <link rel="stylesheet" href="../css/navigation.css">
        <link rel="stylesheet" href="css/index.css">
        <script src="js/navigation.js"></script>
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
                <li><a href="../solveQuestion/four-choice.php">四択</a></li>
                <li><a href="../solveQuestion/description.php">記述</a></li>
                <li><a href="../solveQuestion/grade.php">回答後成績</a></li>
            </ul>
        </nav>
        <div class="frame-gray">
            <div class="frame-white">
                <h1>問題ジャンル選択</h1>
                <div class="container">
                    <div class="problemselection">
                        <label for="fourChoice"><input type="radio" id="fourChoice" name="problemselection" value="four" checked>四択問題</label>
                        <label for="description"><input type="radio" id="description" name="problemselection" value="writing" >記述問題</label>
                    </div>
                    <hr class="line">
                    <hr class="line2">
                    <div class="flexgenre">
                        <div class="checkedgenre">
                            <div class="summary">
                                <label for="check101"><input type="checkbox" id="check101" name="Genreselection" value="Genreselection" checked>テクノロジ系</label>
                            </div>
                            <div class="Genreselection">
                                <div class="checkbutton">
                                    <label for="check1"><input type="checkbox" id="check1" name="Genreselection" value="Genreselection" checked>基礎理論</label>
                                    <label for="check2"><input type="checkbox" id="check2" name="Genreselection" value="Genreselection" checked>アルゴリズムとプログラミング</label>
                                    <label for="check3"><input type="checkbox" id="check3" name="Genreselection" value="Genreselection" checked>システム構成要素</label>
                                    <label for="check4"><input type="checkbox" id="check4" name="Genreselection" value="Genreselection" checked>ソフトウェア</label>
                                    <label for="check5"><input type="checkbox" id="check5" name="Genreselection" value="Genreselection" checked>ハードウェア</label>
                                    <label for="check6"><input type="checkbox" id="check6" name="Genreselection" value="Genreselection" checked>ヒューマンインターフェース</label>
                                    <label for="check7"><input type="checkbox" id="check7" name="Genreselection" value="Genreselection" checked>マルチメディア</label>
                                    <label for="check8"><input type="checkbox" id="check8" name="Genreselection" value="Genreselection" checked>データベース</label>
                                    <label for="check9"><input type="checkbox" id="check9" name="Genreselection" value="Genreselection" checked>ネットワーク</label>
                                    <label for="check10"><input type="checkbox" id="check10" name="Genreselection" value="Genreselection" checked>セキュリティ</label>
                                    <label for="check11"><input type="checkbox" id="check11" name="Genreselection" value="Genreselection" checked>システム開発技術</label>
                                    <label for="check12"><input type="checkbox" id="check12" name="Genreselection" value="Genreselection" checked>ソフトウェア開発管理技術</label>
                                </div>
                                
                            </div>
                        </div>
                        <div class="questioninput">
                            <div class="summary1">
                                <label for="check102"><input type="checkbox" id="check102"  name="Genreselection" value="Genreselection" checked>マネジメント系</label>
                            </div>
                            <div class="Genreselection1">
                                <label for="check14"><input type="checkbox" id="check14" name="Genreselection" value="Genreselection" checked>プロジェクトマネジメント</label>
                                <label for="check15"><input type="checkbox" id="check15" name="Genreselection" value="Genreselection" checked>サービスマネジメント</label>
                                <label for="check16"><input type="checkbox" id="check16" name="Genreselection" value="Genreselection" checked>システム監査</label>
                            </div>
                            <div class="summary1">
                                <label for="check103"><input type="checkbox" id="check103" name="Genreselection" value="Genreselection" checked>ストラテジ系</label>
                            </div>
                            <div class="Genreselection1">
                                <label for="check17"><input type="checkbox" id="check7" name="Genreselection" value="Genreselection" checked>システム戦略</label>
                                <label for="check18"><input type="checkbox" id="check8" name="Genreselection" value="Genreselection" checked>システム企画</label>
                                <label for="check19"><input type="checkbox" id="check5" name="Genreselection" value="Genreselection" checked>経営戦略マネジメント</label>
                                <label for="check20"><input type="checkbox" id="check5" name="Genreselection" value="Genreselection" checked>技術戦略マネジメント</label>
                                <label for="check21"><input type="checkbox" id="check5" name="Genreselection" value="Genreselection" checked>ビジネスインダストリ</label>
                                <label for="check22"><input type="checkbox" id="check5" name="Genreselection" value="Genreselection" checked>企業企画</label>
                                <label for="check23"><input type="checkbox" id="check5" name="Genreselection" value="Genreselection" checked>法務</label>
                            </div>
                        </div>
                    </div>
                    <div class="num">
                        <div class="suu">
                            
                            <label for="questioninput"><input type="radio" name="questionlimit" id="questioninput">出題数:</label>
                            <select name="questioninput" id="questioninput" class="textnum">
                                <script src="js/index.js"></script>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <label for="radio2"><input type="radio" id="radio2" name="questionlimit" value="questionlimit">無制限</label>
                        <label for="radio4"><input type="checkbox" id="radio4" name="questionlimit" value="questionlimit">作問</label>
                        <label for="radio3"><input type="checkbox" id="radio3" name="questionlimit" value="questionlimit">間違えた問題</label>
                    </div>
                    <div class="start">
                        <a href="" class="startbutton">スタート</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>