
<?php
require_once(ROOT_PATH .'/Controllers/make_musicController.php');
$pointFindUser = new MakeMusicCtl();
$params = $pointFindUser->pointFindUserCtl();
session_start();

$id = "";
$name = "";
$email = "";
$password = "";
$history = "";
$guiter = "";
$artist1 = "";
$artist2 = "";
$artist3 = "";
$music1 = "";
$music2 = "";
$music3 = "";



foreach($params as $value)
{
    $id = $value['id'];
    $name = $value['name'];
    $email = $value['email'];
    $password = $value['password'];
    $history = $value['history'];
    $guiter = $value['guiter'];
    $artist1 = $value['artist1'];
    $artist2 = $value['artist2'];
    $artist3 = $value['artist3'];
    $music1 = $value['music1'];
    $music2 = $value['music2'];
    $music3 = $value['music3'];
}

$space = " ";
$space2 = "　";

$xname = "";
$xemail = "";
$xpassword = "";
$xhistory = "";
$xguiter = "";
$xspace = "";

if($_SERVER['REQUEST_METHOD'] === "POST")
{
    $post = filter_input_array(INPUT_POST,$_POST);
    $name = $post['name'];
    $email = $post['email'];
    $password = $post['password'];
    $history = $post['history'];
    $guiter = $post['guiter'];
    $artist1 = $post['artist1'];
    $artist2 = $post['artist2'];
    $artist3 = $post['artist3'];
    $music1 = $post['music1'];
    $music2 = $post['music2'];
    $music3 = $post['music3'];

    

    if($name == null)
    {
        $xname = "氏名をご入力下さい。";
    }

    if(($email == null)||(!filter_var($email,FILTER_VALIDATE_EMAIL)))
    {
        $xemail = "メールアドレスを正しくご入力下さい。";
    }

    if($password == null)
    {
        $xpassword = "パスワードをご入力下さい。";
    }

    $regNum = "/^[0-9]+$/";
    if(($history == null)||(!preg_match($regNum,$history)))
    {
        $xhistory = "数字のみでご入力下さい。(年単位)";
    }

    if($guiter == null)
    {
        $xguiter = "使用しているギター(楽器)をご入力下さい。";
    }
    if((strpos($name,' ') !== false)||(strpos($name,'　') !== false)||
    (strpos($email,' ') !== false)||(strpos($email,'　') !== false)||
    (strpos($password,' ') !== false)||(strpos($password,'　') !== false)||
    (strpos($history,' ') !== false)||(strpos($history,'　') !== false)||
    (strpos($guiter,' ') !== false)||(strpos($guiter,'　') !== false)||
    (strpos($artist1,' ') !== false)||(strpos($artist1,'　') !== false)||
    (strpos($artist2,' ') !== false)||(strpos($artist2,'　') !== false)||
    (strpos($artist3,' ') !== false)||(strpos($artist3,'　') !== false)||
    (strpos($music1,' ') !== false)||(strpos($music1,'　') !== false)||
    (strpos($music2,' ') !== false)||(strpos($music2,'　') !== false)||
    (strpos($music3,' ') !== false)||(strpos($music3,'　') !== false))
    {
        $xspace = "スペースは入力しないでください。";
    }

    if(($xname == "") && ($xemail == "") && ($xpassword == "")
                    && ($xhistory == "") && ($xguiter == "") 
                    && ($xspace==""))
    {
        if(isset($_POST['checkBtn']))
        {
            $_SESSION['editAcount'] = $post;
            header('Location:editAcountComplete.php');
            exit();
            
        }
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
<?php 
if(!isset($_SESSION['acount']))
{
    include "loginHeader.php";
}else{
    include "header.php";
}
?>

<div class = "newAcount">
<h1>会員情報編集<br><span><?= $xspace ?></span></h1>

<form action="" method="POST">
    <input type="hidden" name='id' value="<?= $id ?>">
<div id = "newName">
    <p>ニックネーム<span>*</span></p>
    <input type="text" name="name" value="<?= $name ?>">
</div>
<span><?php echo $xname ?></span>

<div id = "newEmail">
    <p>メールアドレス<span>*</span></p>
    <input type="text" name="email" value="<?= $email ?>" readonly>
    <p><span>メールアドレスは変更できません</span></p>
</div>
<span><?php echo $xemail ?></span>

<div id = "newPassword">
    <p>パスワード<span>*</span></p>
    <input type="password" name="password" value="<?= $password ?>">
</div>
<span><?php echo $xpassword ?></span>

<div id = "newHistory">
    <p>音楽歴<span>*</span></p>
    <input type="text" name="history" value="<?= $history ?>">
</div>
<span><?php echo $xhistory ?></span>

<div id = "newGuiter">
    <p>使用ギター<span>*</span></p>
    <input type="text" name="guiter" value="<?=  $guiter ?>">
</div>
<span><?php echo $xguiter ?></span>

<div id = "newArtist1">
    <p>好きなアーティスト１</p>
    <input type="text" name="artist1" value="<?= $artist1?>">
</div>

<div id = "newArtist2">
    <p>好きなアーティスト２</p>
    <input type="text" name="artist2" value="<?= $artist2 ?>">
</div>

<div id = "newArtist3">
    <p>好きなアーティスト３</p>
    <input type="text" name="artist3" value="<?= $artist3 ?>">
</div>

<div id = "newMusic1">
    <p>好きな曲１</p>
    <input type="text" name="music1" value="<?= $music1 ?>">
</div>

<div id = "newMusic2">
    <p>好きな曲２</p>
    <input type="text" name="music2" value="<?= $music2 ?>">
</div>

<div id = "newMusic3">
    <p>好きな曲３</p>
    <input type="text" name="music3" value="<?= $music3 ?>">
</div>



    <input name="checkBtn" id="checkBtn" type="submit" value="確認画面へ">
</form>


</div>
<?php include "footer.php" ?>

  
</body>
</html>