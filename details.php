<?php
require("connect.inc.php");
 $getid = $_GET['id'];

$spl = "SELECT id, sitename, sitelogo, siteurl, details, country FROM newssite WHERE id = $getid";
$sql_query = mysqli_query($con, $spl);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylesheet/main.css">
</head>
<body>
    <div class="mainBody">
        <div class="topbar">
            <h1>NewsSiteDirectory</h1>
        </div>
        <div class="menuBar">
        <?php include("include/menu.inc.php"); ?>
        </div>
        <div class="contentBody">
            <div class="contentBodyLeft">
                <div class="contentContainer">
                    <?php 
                    $data = mysqli_fetch_array($sql_query);
                    $sitename = $data['sitename'];
                    $sitelogo = $data['sitelogo'];
                    $details = $data['details'];
                    ?>  
                    <h2><?php echo $sitename ?></h2> 
                    <img src="images/<?php echo $sitelogo; ?>" alt="">
                    <p><?php echo $details ?></p>
                </div>
            </div>
            <div class="contentBodyRight">
                <div class="contentBodyRightOne">
                contentBodyRightOne
                </div>
                <div class="contentBodyRightTwo">
                contentBodyRightTwo
                </div>
            </div>
        </div>
        <div class="coppyrightBar">coppyrightBar</div>
    </div>
</body>
</html>