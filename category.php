<?php
require("connect.inc.php");
$getcategory = $_GET['category'];

$spl = "SELECT id, sitename, sitelogo, siteurl, details, country FROM newssite WHERE country ='$getcategory' ";
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
                    while($data = mysqli_fetch_array($sql_query)){
                        $id = $data['id'];
                        $sitename = $data['sitename'];
                        $sitelogo = $data['sitelogo'];    
                        $siteurl = $data['siteurl'];    
                    
                        ?>
                    <div class="logoContainer">
                       <a href="http://<?php echo $siteurl ?>"><img src="images/<?php echo $sitelogo ?>" alt="prothomalo"></a>
                       <a href="details.php?id=<?php echo $id; ?>"><h3><?php echo $sitename ?></h3></a>
                    </div>
                   <?php  } ?>     
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