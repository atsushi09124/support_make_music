<?php
session_start();
unset($_SESSION['acount']);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type = "text/javascript" src="/js/java.js"></script>
    <htmlspecialchars($str, ENT_QUOTES, ‘UTF-8′);>
</head>
<body>
<?php include "loginHeader.php"; ?>
<h2>ログアウトしました。<br>またのご利用お待ちしております。</h2>
<div id = "logoutBox">
    <a href="index.php">トップに戻る</a>
</div>
<?php include "footer.php"; ?>
</body>
</html>