<?php
session_start();
require_once(ROOT_PATH .'/Controllers/make_musicController.php');
$menu = new MakeMusicCtl();
$getUsers = $menu->getUsersCtl();
$findPost = $menu->findPostCtl();


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

$count = 0;
foreach($findPost as $value)
{
    $count++;
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
<?php 
if(!isset($_SESSION['acount']))
{
    include "loginHeader.php";
}else{
    include "header.php";
}
?>

<h2>いつもご利用いただきありがとうございます。</h2>

    <div id = "userData">
        <h2><?php echo $userName ?>さん</h2>
        <h2>投稿数：<?php echo $count ?>件</h2>
        <a href="editAcount.php?id=<?= $userId ?>">アカウントの編集</a>
    
    </div>


<div id = "bigPostTable">
<?php 
foreach($findPost as $val){?>
    <div class = "postTable">
        <table>
        <tr>
            <td width="250" align="right">使用キー</td><td width="400"><?php echo $val['main_key'] ?></td>
        </tr>
        <tr>
            <td width="250" align="right">使用スケール</td><td width="400"><?php echo $val['main_scale'] ?></td>
        </tr>
        <tr>
            <td width="250" align="right">使用コード進行</td><td width="400"><?php echo $val['progress_chord'] ?></td>
        </tr>
        <tr>
            <td width="250" align="right">感想</td><td width="400"><?php echo $val['body'] ?></td>
        </tr>
        </table>
        <div class = "option">
            <a href="detail.php?id=<?= $val['id'] ?>">詳細</a>
        </div>  
    </div>
<?php } ?>
</div>

<?php include "footer.php" ?>
</body>
</html>