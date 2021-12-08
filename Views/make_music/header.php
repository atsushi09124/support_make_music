<?php
require_once(ROOT_PATH .'/Controllers/make_musicController.php');
$makeMusic = new MakeMusicCtl();
$getUsers = $makeMusic->getUsersCtl();

$acount = $_SESSION['acount'];

$userId = "";
$userName = "";
foreach($getUsers as $value)
{
    if($value['email']==$acount['email'])
    {
        $userId = $value['id'];
        $userName = $value['name'];
    }
}
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

<div class = "header">
    <div id = "headerOver">
        <a href="index.php">弾き語り作曲支援サイト</a>
    </div>

    <div id = "headerLink">
        <a href="menu.php?id=<?= $userId ?>">マイページ</a>
        <a href="logout.php">ログアウト</a>
    </div>

</div>
<div class = "marginBox"></div>
</body>
</html>