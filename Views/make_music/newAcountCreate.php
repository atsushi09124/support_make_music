<?php
require_once(ROOT_PATH.'/Controllers/make_musicController.php');
$users = new MakeMusicCtl();

session_start();
$data = $_SESSION['newAcount'];



$post = filter_input_array(INPUT_POST,$_POST);

if(isset($_POST['registerBtn']))
{
    $params = $users->createAcountCtl();
    $_SESSION['acount'] = $post;
    unset($_SESSION['newAcount']);
    ?><script>
        alert("登録が完了しました。")
        location.href = 'index.php';
    </script><?php
    exit();
}

if(isset($_POST['backBtn']))
{
    header('Location:newAcount.php');
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
<h2>この内容で登録しても宜しいでしょうか？</h2>
<div class = "checkTable">
<form action="" method="POST">
<table>
    <tr>
        <td>ニックネーム</td>
        <td><?php echo $data['name'] ?></td>
        <input name="name" type="hidden" value=<?php echo $data['name'] ?>>
    </tr>
    <tr>
        <td>メールアドレス</td>
        <td><?php echo $data['email'] ?></td>
        <input name="email" type="hidden" value=<?php echo $data['email'] ?>>

    </tr>
    <tr>
        <td>パスワード</td>
        <td><?php echo $data['password'] ?></td>
        <input name="password" type="hidden" value=<?php echo $data['password'] ?>>
    </tr>
    <tr>
        <td>音楽歴</td>
        <td><?php echo $data['history'] ?></td>
        <input name="history" type="hidden" value=<?php echo $data['history'] ?>>
    </tr>
    <tr>
        <td>使用ギター</td>
        <td><?php echo $data['guiter'] ?></td>
        <input name="guiter" type="hidden" value=<?php echo $data['guiter'] ?>>
    </tr>
    <tr>
        <td>好きなアーティスト１</td>
        <td><?php echo $data['artist1'] ?></td>
        <input name="artist1" type="hidden" value=<?php echo $data['artist1'] ?>>
    </tr>
    <tr>
        <td>好きなアーティスト２</td>
        <td><?php echo $data['artist2'] ?></td>
        <input name="artist2" type="hidden" value=<?php echo $data['artist2'] ?>>
    </tr>
    <tr>
        <td>好きなアーティスト３</td>
        <td><?php echo $data['artist3'] ?></td>
        <input name="artist3" type="hidden" value=<?php echo $data['artist3'] ?>>
    </tr>
    <tr>
        <td>好きな曲１</td>
        <td><?php echo $data['music1'] ?></td>
        <input name="music1" type="hidden" value=<?php echo $data['music1'] ?>>
    </tr>
    <tr>
        <td>好きな曲２</td>
        <td><?php echo $data['music2'] ?></td>
        <input name="music2" type="hidden" value=<?php echo $data['music2'] ?>>
    </tr>
    <tr>
        <td>好きな曲３</td>
        <td><?php echo $data['music3'] ?></td>
        <input name="music3" type="hidden" value=<?php echo $data['music3'] ?>>
    </tr>
</table>
    <div id = "submitBox">
        <input name="registerBtn" id="registerBtn" type="submit" value="登録">
        <input name="backBtn" id="backBtn" type="submit" value="入力画面に戻る">
    </div>
</form>
</div>

<?php include "footer.php" ?>
</body>
</html>