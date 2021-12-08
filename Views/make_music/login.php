<?php
require_once(ROOT_PATH .'/Controllers/make_musicController.php');
$getUsers = new MakeMusicCtl();
$params = $getUsers->getUsersCtl();
$flg = 1;

session_start();

$errEmail = "";
$errPassword = "";

if($_SERVER['REQUEST_METHOD']!=="POST")
{
    $email = "";
    $password = "";
    $errEmail = "";
    $errPassword = "";
}
else
{
    $acountPost = filter_input_array(INPUT_POST,$_POST);
    $email = $acountPost['email'];
    $password = $acountPost['password'];

    if((!filter_var($email,FILTER_VALIDATE_EMAIL))||(!$email))
    {
        $errEmail = "メールアドレスを正しくご入力下さい。";
    }
    if(!$password)
    {
        $errPassword = "パスワードを入力して下さい。";
    } 

    foreach($params as $val)
    { 
        if(($val['email']==$email)&&($val['password']==$password))
        {
            $userid=$val['id'];
            $flg=1;
            break;
        }
        else
        {
            $flg=0;
        }
    }

    if($flg==0)
    {
        ?><script>
            alert("ログインに失敗しました。")
        </script><?php
    }

    if(($errEmail=="")&&($errPassword=="")&&($flg==1))
    {
        if(isset($_POST['loginBtn']))
        {
            $_SESSION['acount']=$acountPost;
            ?><script>
            alert("ログインに成功しました。")
            location.href = 'index.php';
        </script><?php
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
<?php include "loginHeader.php" ?>

<div class = "login">
<h1>ログイン</h1>

<form action="" method="POST">
<div id = "email">
    <p>メールアドレス</p>
    <input type="text" name="email">
</div>
    <span><?php echo $errEmail ?></span>

<div id = "password">
    <p>パスワード</p>
    <input type="password" name="password">
</div>
    <span><?php echo $errPassword ?></span>

<div id = "loginBtnBox">
    <input name="loginBtn" id="loginBtn" type="submit" value="ログイン">
</div>
</form>

    <a href="newAcount.php">新規会員登録</a>

</div>
<?php include "footer.php" ?>

</body>
</html>