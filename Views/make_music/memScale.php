<?php
session_start();
require_once(ROOT_PATH .'/Controllers/make_musicController.php');
$findChord = new MakeMusicCtl();
$major = $findChord->findMajorChordCtl();
$minor = $findChord->findMinorChordCtl();
$memPost = $findChord->memPostCtl();


$key = $_GET['get'];
foreach($major as $majorParts)
{
    if($majorParts['chord'] == $key)
    {
        $firstId = $majorParts['id'];
        break;
    }
}
$majorFistId = $firstId;
$majorSecondId = $firstId + 2; //minor//
$majorThirdId = $firstId + 4; //minor//
$majorFourthId = $firstId + 5; 
$majorFifthId = $firstId + 7;
$majorSixthId = $firstId + 9; //minor//
$majorSeventhId = $firstId + 11; //minor//

$minorFirstId = $firstId;  //minor//
$minorSecondId = $firstId + 2; //minor//
$minorThirdId = $firstId + 3;
$minorFourthId = $firstId + 5; //minor//
$minorFifthId = $firstId + 7; //minor//
$minorSixthId = $firstId + 8;
$minorSeventhId = $firstId + 10;

$majorFirstChord = "";
$majorSecondChord = ""; //minor//
$majorThirdChord = ""; //minor//
$majorFourthChord = "";
$majorFifthChord = "";
$majorSixthChord = ""; //minor//
$majorSeventhChord = ""; //minor//

$minorFirstChord = ""; //minor//
$minorSecondChord = ""; //minor//
$minorThirdChord = ""; 
$minorFourthChord = ""; //minor//
$minorFifthChord = ""; //minor//
$minorSixthChord = "";
$minorSeventhChord = "";

foreach($major as $majorChord)
{
    if($majorChord['id'] == $majorFistId)
    {
        $majorFirstChord = $majorChord['chord'];
    }
    if($majorChord['id'] == $minorThirdId)
    {
        $minorThirdChord = $majorChord['chord'];
    }
    if($majorChord['id'] == $majorFourthId)
    {
        $majorFourthChord = $majorChord['chord'];
    }
    if($majorChord['id'] == $majorFifthId)
    {
        $majorFifthChord = $majorChord['chord'];
    }
    if($majorChord['id'] == $minorSixthId)
    {
        $minorSixthChord = $majorChord['chord'];
    }
    if($majorChord['id'] == $minorSeventhId)
    {
        $minorSeventhChord = $majorChord['chord'];
    }
}


foreach($minor as $minorChord)
{
    if($minorChord['id'] == $minorFirstId)
    {
        $minorFirstChord = $minorChord['chord'];
    }
    if($minorChord['id'] == $majorSecondId)
    {
        $majorSecondChord = $minorChord['chord'];
        $minorSecondChord = $minorChord['chord'];
    }
    if($minorChord['id'] == $majorThirdId)
    {
        $majorThirdChord = $minorChord['chord'];
    }
    if($minorChord['id'] == $minorFourthId)
    {
        $minorFourthChord = $minorChord['chord'];
    }
    if($minorChord['id'] == $minorFifthId)
    {
        $minorFifthChord = $minorChord['chord'];
    }
    if($minorChord['id'] == $majorSixthId)
    {
        $majorSixthChord = $minorChord['chord'];
    }
    if($minorChord['id'] == $majorSeventhId)
    {
        $majorSeventhChord = $minorChord['chord'];
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

<div class = "mainTitle">
    <img src="/img/parts/title1.jpg">
    <div id = "mainTitleCover"></div>
    <div id = "titleMes">
        <p><strong>Thanks for coming !<br>Support Making Music ♪</strong></p>
    </div>
</div>

<h2>選択したキーのスケールで使用できるコード</h2>

<div id = "scaleTitle1"><h2>メジャースケール</h2></div>
<div id = "majorScale">
    <div id = "majorScaleTop">
        <img src="/img/chord/<?= $majorFirstChord ?>.jpg">
        <img src="/img/chord/<?= $majorSecondChord ?>.jpg">
        <img src="/img/chord/<?= $majorThirdChord ?>.jpg">
        <img src="/img/chord/<?= $majorFourthChord ?>.jpg">
        <img src="/img/chord/<?= $majorFifthChord ?>.jpg">
    </div>
    <div id = "majorScaleBottom">
        <img src="/img/chord/<?= $majorSixthChord ?>.jpg">
        <img src="/img/chord/<?= $majorSeventhChord ?>.jpg">
        <img src="/img/chord/white.jpg">
        <img src="/img/chord/white.jpg">
        <img src="/img/chord/white.jpg">
    </div>
</div>

<div id = "scaleTitle2"><h2>メジャーペンタトニックスケール</h2></div>
<div id = "majorPentScale">
        <img src="/img/chord/<?= $majorFirstChord ?>.jpg">
        <img src="/img/chord/<?= $minorSecondChord ?>.jpg">
        <img src="/img/chord/<?= $majorThirdChord ?>.jpg">
        <img src="/img/chord/<?= $majorFifthChord ?>.jpg">
        <img src="/img/chord/<?= $majorSixthChord ?>.jpg">
</div>

<div id = "scaleTitle3"><h2>マイナースケール</h2></div>
<div id = "minorScale">
    <div id = "minorScaleTop">
        <img src="/img/chord/<?= $minorFirstChord ?>.jpg">
        <img src="/img/chord/<?= $minorSecondChord ?>.jpg">
        <img src="/img/chord/<?= $minorThirdChord ?>.jpg">
        <img src="/img/chord/<?= $minorFourthChord ?>.jpg">
        <img src="/img/chord/<?= $minorFifthChord ?>.jpg">
    </div>
    <div id = "minorScaleBottom">
        <img src="/img/chord/<?= $minorSixthChord ?>.jpg">
        <img src="/img/chord/<?= $minorSeventhChord ?>.jpg">
        <img src="/img/chord/white.jpg">
        <img src="/img/chord/white.jpg">
        <img src="/img/chord/white.jpg">
    </div>

</div>

<div id = "scaleTitle4"><h2>マイナーペンタトニックスケール</h2></div>
    <div id = "minorPentScale">
        <img src="/img/chord/<?= $minorFirstChord ?>.jpg">
        <img src="/img/chord/<?= $minorThirdChord ?>.jpg">
        <img src="/img/chord/<?= $minorFourthChord ?>.jpg">
        <img src="/img/chord/<?= $minorFifthChord ?>.jpg">
        <img src="/img/chord/<?= $minorSeventhChord ?>.jpg">
    </div>
</div>

<br>
<br>

    <h2>他の会員様の作曲情報</h2>
<div id = "memNew">
    <a href="newPost.php">新規投稿</a>
</div>
<div id = "bigMemTable">
<?php 
foreach($memPost as $val){?>
    <div class = "memTable">

        <div class = "memTitle">
            <p><?php echo $val['name'] ?>さんの投稿</p>
        </div>

        <table>
        <tr>
            <td width="" align="right">キー：</td><td width=""><?php echo $val['main_key'] ?></td>
        </tr>
        <tr>
            <td width="" align="right">スケール：</td><td width=""><?php echo $val['main_scale'] ?></td>
        </tr>
        <tr>
            <td width="" align="right">コード進行：</td><td width=""><?php echo $val['progress_chord'] ?></td>
        </tr>
        </table>

        <div class = "memBody">
                <p>感想</p>
            <div class = "memBodyBox">
                <p><?php echo $val['body'] ?></p>
            </div>
        </div>

        <div class = "memOption">
            <a href="allDetail.php?id=<?= $val['id'] ?>">詳細</a>
        </div>  
    </div>
<?php } ?>
</div>




<div class = "returnTopBox">
    <a href="index.php">トップに戻る</a>
</div>

<?php include "footer.php" ?>


<div id = "sideBar">
    <a href="#scaleTitle1">メジャースケールへ<br></a>
    <a href="#scaleTitle2">メジャーPスケールへ<br></a>
    <a href="#scaleTitle3">マイナースケールへ<br></a>
    <a href="#scaleTitle4">マイナーPスケールへ<br></a>
    <a href="#memNew">作曲情報へ</a>
</div>

</body>
</html>