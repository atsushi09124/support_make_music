<?php
require_once(ROOT_PATH .'/Controllers/make_musicController.php');
$deletePost = new MakeMusicCtl();
$pointFindPost = $deletePost->pointFindPostCtl();
session_start();

$postId = $_GET['id'];

$main_key = "";
$main_scale = "";
$progress_chord = "";
$in_chord = "";
$A_chord = "";
$B_chord = "";
$main_chord = "";
$C_chord = "";
$out_chord = "";
$body = "";

foreach($pointFindPost as $value)
{
    $main_key = $value['main_key'];
    $main_scale = $value['main_scale'];
    $progress_chord = $value['progress_chord'];
    $in_chord = $value['in_chord'];
    $A_chord = $value['A_chord'];
    $B_chord = $value['B_chord'];
    $main_chord = $value['main_chord'];
    $C_chord = $value['C_chord'];
    $out_chord = $value['out_chord'];
    $body = $value['body'];
}

if(isset($_POST['registerBtn']))
{
    $deletePostComplete = $deletePost->deletePostCtl();
    ?><script>
        alert("削除が完了しました。")
        location.href = 'index.php';
    </script><?php
    //header('Location:index.php');
    exit();
}

if(isset($_POST['backBtn']))
{
    header('Location:detail.php?id='.$postId);
    exit();
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
<h2>本当に削除しても宜しいでしょうか？</h2>
<div class = "checkTable">
<form action="" method="POST">
    <input name="id" type="hidden" value=<?php echo $postId ?>>
<table>
    <tr>
        <td>使用キー</td>
        <td><?php echo $main_key ?></td>
    </tr>
    <tr>
        <td>使用スケール</td>
        <td><?php echo $main_scale ?></td>

    </tr>
    <tr>
        <td>コード進行</td>
        <td><?php echo $progress_chord ?></td>
    </tr>
    <tr>
        <td>イントロ</td>
        <td><?php echo $in_chord ?></td>
    </tr>
    <tr>
        <td>Aメロ</td>
        <td><?php echo $A_chord ?></td>
    </tr>
    <tr>
        <td>Bメロ</td>
        <td><?php echo $B_chord ?></td>
    </tr>
    <tr>
        <td>サビ</td>
        <td><?php echo $main_chord ?></td>
    </tr>
    <tr>
        <td>Cメロ</td>
        <td><?php echo $C_chord ?></td>
    </tr>
    <tr>
        <td>アウトロ</td>
        <td><?php echo $out_chord ?></td>
    </tr>
    <tr>
        <td>感想</td>
        <td><?php echo nl2br($body) ?></td>
    </tr>
</table>
    <input name="registerBtn" id="registerBtn" type="submit" value="削除">
    <input name="backBtn" id="backBtn" type="submit" value="詳細画面に戻る">
</form>
</div>

<?php include "footer.php" ?>
</body>
</html>