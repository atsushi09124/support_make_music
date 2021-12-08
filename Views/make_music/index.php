<?php
session_start();
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
<?php 
if(!isset($_SESSION['acount']))
{
    include "loginHeader.php";
}else{
    include "header.php";
}
?>

<div class = "mainTitle">
    <img src="/img/parts/title1.jpg">
    <div id = "mainTitleCover"></div>
    <div id = "titleMes">
        <p><strong>Thanks for coming !<br>Support Making Music ♪</strong></p>
    </div>
</div>


<h2>使用キーの選択</h2>
<div class = "selectKey">

    <div id = "keyC">
        <p><a href="scale.php?get=C">C</a></p>
        <p><a href="scale.php?get=Cs">C#</a></p>
    </div>

    <div id = "keyD">
        <p><a href="scale.php?get=D">D</a></p>
        <p><a href="scale.php?get=Ds">D#</a></p>
    </div>

    <div id = "keyE">
        <p><a href="scale.php?get=E">E</a></p>
    </div>

    <div id = "keyF">
        <p><a href="scale.php?get=F">F</a></p>
        <p><a href="scale.php?get=Fs">F#</a></p>
    </div>

    <div id = "keyG">
        <p><a href="scale.php?get=G">G</a></p>
        <p><a href="scale.php?get=Gs">G#</a></p>
    </div>

    <div id = "keyA">
        <p><a href="scale.php?get=A">A</a></p>
        <p><a href="scale.php?get=As">A#</a></p>
    </div>

    <div id = "keyB">
        <p><a href="scale.php?get=B">B</a></p>
    </div>

</div>

<div class = "indexComment">
    <p>※ログイン済ユーザー様は他の会員様の投稿を閲覧することができます。</p>
</div>

<?php include "footer.php" ?>
</body>
</html>