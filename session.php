<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_SESSION['username'])) {
        // ログイン済み
        echo $_SESSION['username'] . "さんがログインしています";
    } else {
        echo "ログインしていません";
    }
?>