<?php
session_start();
require_once(ROOT_PATH .'/Controllers/make_musicController.php');
$menu = new MakeMusicCtl();
$getUsers = $menu->getUsersCtl();
$pointFindPost = $menu->pointFindPostCtl();

$niceUserId = "";

$acount = $_SESSION['acount'];
foreach($getUsers as $value)
{
    if($value['email']==$acount['email'])
    {
        $niceUserId = $value['id'];
    }
}

$userId = "";
$userName = "";
$userHistory = "";
$userGuiter = "";
$userArtist1 = "";
$userArtist2 = "";
$userArtist3 = "";
$userMusic1 = "";
$userMusic2 = "";
$userMusic3 = "";


$postId = "";
$postUserId = "";
$postName = "";
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
    $postUserId = $value['user_id'];
    $postName = $value['name'];
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

foreach($getUsers as $value)
{
    if($value['id']==$postUserId)
    {
        $userId = $value['id'];
        $userName = $value['name'];
        $userHistory = $value['history'];
        $userGuiter = $value['guiter'];
        $userArtist1 = $value['artist1'];
        $userArtist2 = $value['artist2'];
        $userArtist3 = $value['artist3'];
        $userMusic1 = $value['music1'];
        $userMusic2 = $value['music2'];
        $userMusic3 = $value['music3'];
    }
}



//ここからいいね処理

if($_SERVER['REQUEST_METHOD'] != "POST")
{
}
else
{
    if(isset($_POST['niceBtn']))
    {
        $menu->niceUpdateCtl();
        header('Location: allDetail.php?id='.$postId);
    }
}


$selectNiceCount = $menu->selectNiceCountCtl();
$countNice = "";
foreach($selectNiceCount as $value)
{
    $countNice++;
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
<br>
<h2><?php echo $postName ?>さんの投稿</h2>

<div id = "bigDetail">
    <p>キー<?php echo $main_key ?>での作曲</p>

    <div id = "detailScale">
        <p>使用スケール：<?php echo $main_scale ?></p>
    </div>

    <p>メインコード進行　<?php echo $progress_chord ?></p>

    <div id = "detailTable">
        <table>
            <?php
            if(!empty($in_chord))
            {?>
            <tr>
                <td width="220" align="right">イントロ：</td><td width="220" align="left"><?php echo $in_chord ?></td>
            </tr>
            <?php } 
            
            if(!empty($A_chord))
            {?>
            <tr>
                <td width="220" align="right">Aメロ：</td><td width="220" align="left"><?php echo $A_chord ?></td>
            </tr>
            <?php } 

            if(!empty($B_chord))
            {?>
            <tr>
                <td width="220" align="right">Bメロ：</td><td width="220" align="left"><?php echo $B_chord ?></td>
            </tr>
            <?php } 
            
            if(!empty($main_chord))
            {?>
            <tr>
                <td width="220" align="right">サビ：</td><td width="220" align="left"><?php echo $main_chord ?></td>
            </tr>
            <?php } 
            
            if(!empty($C_chord))
            {?>
            <tr>
                <td width="220" align="right">Cメロ：</td><td width="220" align="left"><?php echo $C_chord ?></td>
            </tr>
            <?php } 
            
            if(!empty($out_chord))
            {?>
            <tr>
                <td width="220" align="right">アウトロ：</td><td width="220" align="left"><?php echo $out_chord ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>

        <p>感想</p>
    <div id = "detailBody">
        <p><?php echo $body ?></p>
    </div>

        <p>作曲者情報</p>
    <div id = "makerDetail">
        <div id = "makerDetailLeft">
                <p><?php echo $postName ?>さん</p>
                <p>音楽歴：<?php echo $userHistory ?>年</p>
        </div>
        <div id = "makerDetailRight">
            <table>
                <tr>
                    <td width="250" align="right">使用ギター：</td><td width="250" align="left"><?php echo $userGuiter ?></td>
                </tr>
                <?php 
                if(!empty($userArtist1))
                {?>
                <tr>
                    <td width="250" align="right">好きなアーティスト：</td><td width="250" align="left"><?php echo $userArtist1 ?></td>
                </tr>
                <?php } 

                if(!empty($userArtist2))
                {?>
                <tr>
                    <td width="250" align="right"></td><td width="250" align="left"><?php echo $userArtist2 ?></td>
                </tr>
                <?php } 
                if(!empty($userArtist3))
                {?>
                <tr>
                    <td width="250" align="right"></td><td width="250" align="left"><?php echo $userArtist3 ?></td>
                </tr>
                <?php } ?>

                <?php
                if(!empty($userMusic1))
                {?>
                <tr>
                    <td width="250" align="right">好きな曲：</td><td width="250" align="left"><?php echo $userMusic1 ?></td>
                </tr>
                
                <?php } 
                if(!empty($userMusic2))
                {?>
                <tr>
                    <td width="250" align="right"></td><td width="250" align="left"><?php echo $userMusic2 ?></td>
                </tr>
                <?php } 
                if(!empty($userMusic3))
                {?>
                <tr>
                    <td width="250" align="right"></td><td width="250" align="left"><?php echo $userMusic3 ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>

    <div id = "niceBox">
        <p>いいね:<?php 
        if($countNice>0)
        {
            echo $countNice;
        }else{
            echo "0";
        } ?>件</p>
        <form action="" method="POST">
            <input type="hidden" name="post_id" value=<?= $postId ?>>
            <input type="hidden" name="user_id" value=<?= $niceUserId ?>>
            <input type="submit"  id="niceBtn" name='niceBtn' value='Nice!'>
        </form>
    </div>
</div>

<div class = "returnTopBox">
    <a href="index.php">トップに戻る</a>
</div>


<?php include "footer.php" ?>
</body>
</html>