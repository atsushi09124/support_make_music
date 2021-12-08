<?php

require_once(ROOT_PATH .'/Controllers/make_musicController.php');
$editPost = new MakeMusicCtl();

session_start();
$post = $_SESSION['editPost'];
$body = $post['body'];

$postId = $_GET['id'];


if(isset($_POST['registerBtn']))
{
    $editPostComplete = $editPost->editPostCtl();
    unset($_SESSION['editPost']);
    ?><script>
        alert("変更が完了しました。")
        location.href = 'index.php';
    </script><?php
    //header('Location:index.php');
    exit();
}

if(isset($_POST['backBtn']))
{
    header('Location:edit.php?id='.$postId);
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
<h2>この内容で変更しても宜しいでしょうか？</h2>
<div class = "checkTable">
<form action="" method="POST">
    <input name="id" type="hidden" value=<?php echo $postId ?>>
<table>
    <tr>
        <td>使用キー</td>
        <td><?php echo $post['main_key'] ?></td>
        <input name="main_key" type="hidden" value=<?php echo $post['main_key'] ?>>
    </tr>
    <tr>
        <td>使用スケール</td>
        <td><?php echo $post['main_scale'] ?></td>
        <input name="main_scale" type="hidden" value=<?php echo $post['main_scale'] ?>>

    </tr>
    <tr>
        <td>コード進行</td>
        <td><?php echo $post['progress_chord'] ?></td>
        <input name="progress_chord" type="hidden" value=<?php echo $post['progress_chord'] ?>>
    </tr>
    <tr>
        <td>イントロ</td>
        <td><?php echo $post['in_chord'] ?></td>
        <input name="in_chord" type="hidden" value=<?php echo $post['in_chord'] ?>>
    </tr>
    <tr>
        <td>Aメロ</td>
        <td><?php echo $post['A_chord'] ?></td>
        <input name="A_chord" type="hidden" value=<?php echo $post['A_chord'] ?>>
    </tr>
    <tr>
        <td>Bメロ</td>
        <td><?php echo $post['B_chord'] ?></td>
        <input name="B_chord" type="hidden" value=<?php echo $post['B_chord'] ?>>
    </tr>
    <tr>
        <td>サビ</td>
        <td><?php echo $post['main_chord'] ?></td>
        <input name="main_chord" type="hidden" value=<?php echo $post['main_chord'] ?>>
    </tr>
    <tr>
        <td>Cメロ</td>
        <td><?php echo $post['C_chord'] ?></td>
        <input name="C_chord" type="hidden" value=<?php echo $post['C_chord'] ?>>
    </tr>
    <tr>
        <td>アウトロ</td>
        <td><?php echo $post['out_chord'] ?></td>
        <input name="out_chord" type="hidden" value=<?php echo $post['out_chord'] ?>>
    </tr>
    <tr>
        <td>感想</td>
        <td><?php echo nl2br($post['body']) ?></td>
        <?php 
        $body = str_replace(PHP_EOL, '', $body) ?>
        <input name="body" type="hidden" value=<?php echo $body ?>>
    </tr>
</table>
    <input name="registerBtn" id="registerBtn" type="submit" value="登録">
    <input name="backBtn" id="backBtn" type="submit" value="入力画面に戻る">
</form>
</div>

<?php include "footer.php" ?>
</body>
</html>