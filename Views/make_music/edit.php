<?php


session_start();
require_once(ROOT_PATH .'/Controllers/make_musicController.php');
$makeMusic = new MakeMusicCtl();
$getUsers = $makeMusic->getUsersCtl();
$pointFindPost = $makeMusic->pointFindPostCtl();
$acount = $_SESSION['acount'];

$postId = $_GET['id'];
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

$postId = "";
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
    $postId = $value['id'];
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


$space = " ";
$space2 = "　";

$xmain_key = "";
$xmain_scale = "";
$xprogress_chord = "";
$xbody = "";
$xspace = "";
if($_SERVER['REQUEST_METHOD']==="POST")
{

    $post = filter_input_array(INPUT_POST,$_POST);
    $main_key = $post['main_key'];
    $main_scale = $post['main_scale'];
    $progress_chord = $post['progress_chord'];
    $in_chord = $post['in_chord'];
    $A_chord = $post['A_chord'];
    $B_chord = $post['B_chord'];
    $main_chord = $post['main_chord'];
    $C_chord = $post['C_chord'];
    $out_chord = $post['out_chord'];
    $body = $post['body'];


    if(!$main_key)
    {
        $xmain_key = "使用キーは必須入力です。";
    }
    if(!$main_scale)
    {
        $xmain_scale = "使用スケールは必須入力です。";
    }
    if(!$progress_chord)
    {
        $xprogress_chord = "コード進行は必須入力です。";
    }
    if(!$body)
    {
        $xbody = "感想は必須入力です。";
    }
    if((strpos($main_key,' ') !== false)||(strpos($main_key,'　') !== false)||
       (strpos($main_scale,' ') !== false)||(strpos($main_scale,'　') !== false)||
       (strpos($progress_chord,' ') !== false)||(strpos($progress_chord,'　') !== false)||
       (strpos($in_chord,' ') !== false)||(strpos($in_chord,'　') !== false)||
       (strpos($A_chord,' ') !== false)||(strpos($A_chord,'　') !== false)||
       (strpos($B_chord,' ') !== false)||(strpos($B_chord,'　') !== false)||
       (strpos($main_chord,' ') !== false)||(strpos($main_chord,'　') !== false)||
       (strpos($C_chord,' ') !== false)||(strpos($C_chord,'　') !== false)||
       (strpos($out_chord,' ') !== false)||(strpos($out_chord,'　') !== false))
    {
        $xspace = "感想入力欄以外にスペースは入力しないでください。";
    }


    if(($xmain_key=="")&&($xmain_scale=="")&&($xprogress_chord=="")&&($xbody=="")&&($xspace==""))
    {
        $_SESSION['editPost'] = $post;
        header('Location:editComplete.php?id='.$postId);
        exit();
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

<h2>投稿編集<br><span><?= $xspace ?></span></h2>
<form action="" method="POST">
    <input type="hidden" name="id" value=<?php echo $postId ?>>
<div id = "newPostBox">
    <div id = "main_keyBox">
        <p>使用キー<span>*</span></p>
        <input type="text" name="main_key" placeholder="C" value=<?php echo $main_key ?>>
        <p><span><?= $xmain_key ?></span><p>
    </div>

    <div id = "main_scaleBox">
        <p>使用スケール<span>*</span></p>
        <input type="text" name="main_scale" placeholder="メジャースケール" value=<?php echo $main_scale ?>>
        <p><span><?= $xmain_scale ?></span><p>
    </div>

    <div id = "progress_chordBox">
        <p>コード進行<span>*</span></p>
        <input type="text" name="progress_chord" placeholder="Am→G→C→F" value=<?php echo $progress_chord ?>>
        <p><span><?= $xprogress_chord ?></span><p>
    </div>

    <div id = "in_chordBox">
        <p>イントロ</p>
        <input type="text" name="in_chord" placeholder="Am→G→C→F" value=<?php echo $in_chord ?>>
    </div>

    <div id = "A_chordBox">
        <p>Aメロ</p>
        <input type="text" name="A_chord" placeholder="Am→Em7→F→G→C" value=<?php echo $A_chord ?>>
    </div>

    <div id = "B_chordBox">
        <p>Bメロ</p>
        <input type="text" name="B_chord" placeholder="Dm7→Am→A#→G#→E7" value=<?php echo $B_chord ?>>
    </div>

    <div id = "main_chordBox">
        <p>サビ</p>
        <input type="text" name="main_chord" placeholder="Am→Em7→F→G→C" value=<?php echo $main_chord ?>>
    </div>

    <div id = "C_chordBox">
        <p>Cメロ</p>
        <input type="text" name="C_chord" placeholder="F→G→G#dim→Am→Dm7→E7" value=<?php echo $C_chord ?>>
    </div>

    <div id = "out_chordBox">
        <p>アウトロ</p>
        <input type="text" name="out_chord" placeholder="Am→G→C→F" value=<?php echo $out_chord ?>>
    </div>

    <div id = "bodyBox">
        <p>感想<span>*</span></p>
        <textarea name="body"><?php echo $body ?></textarea>
        <p><span><?= $xbody ?></span><p>
    </div>
</div>
<input type="submit" id="newPostSubmit" value="登録">
</form>

<div class = "returnTopBox">
    <a href="index.php">トップに戻る</a>
</div>

<?php include "footer.php" ?>
</body>
</html>