<?php
    session_start();

    if (isset($_SESSION['username'])) {
        // ログイン済み
        echo $_SESSION['username'] . "さんがログインしています";
    }
?>