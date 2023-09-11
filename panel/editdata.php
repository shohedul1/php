<?php
require("connect.inc.php");
include('menu.inc.php');
require('core.inc.php');

   if(!empty($_SESSION['user_id'])){


$getid = $_GET['id'];

$sql = "SELECT id, sitename, siteurl, details, country, status FROM newssite WHERE id='$getid' ";
$sql_query = mysqli_query($con, $sql);

$data = mysqli_fetch_array($sql_query);

$id = $data['id'];
$sitename = $data['sitename'];
$siteurl = $data['siteurl'];
$details = $data['details'];
$country = $data['country'];
$status = $data['status'];



if(isset($_POST['id']) && isset($_POST['sitename'])  && isset($_POST['siteurl'])  && isset($_POST['details'])  && isset($_POST['country'])  && isset($_POST['status'])){  
    
    $newid = $_POST['id'];
    $newsitename = $_POST['sitename'];
    $newsiteurl = $_POST['siteurl'];
    $newdetails = $_POST['details'];
    $newcountry = $_POST['country'];
    $newstatus = $_POST['status'];

    $sitelogo = $_FILES['sitelogo']['name'];
    $tmpname =  $_FILES['sitelogo']['tmp_name']; 

    if(!empty($newid) && !empty($newsitename) && !empty($sitelogo) && !empty($newsiteurl) && !empty($newdetails) && !empty($newcountry) && !empty($newstatus)){ 
        move_uploaded_file($tmpname,'../images/'.$sitelogo);

        $update_sql = "UPDATE newssite SET sitename='$newsitename', sitelogo='$sitelogo', siteurl='$newsiteurl', details='$newdetails', country='$newcountry', status='$newstatus' WHERE id='$newid' ";
       
        if($update_spl_query = mysqli_query($con, $update_sql)){
            header('location:listofdata.php');
        }else{
            echo 'Some problem! Try again!';
        }
    }elseif(!empty($newid) && !empty($newsitename) && empty($sitelogo) && !empty($newsiteurl) && !empty($newdetails) && !empty($newcountry) && !empty($newstatus)) {

        $update_sql = "UPDATE newssite SET sitename='$newsitename', siteurl='$newsiteurl', details='$newdetails', country='$newcountry', status='$newstatus' WHERE id='$newid' ";
        if($update_spl_query = mysqli_query($con, $update_sql)){
            header('location:listofdata.php');

        }else {
            echo 'Some problem! Try again!';
        }

    }else{
        echo 'fill up all filds';
    }


}
$sql_menu = "SELECT * FROM mainmenu";
$sql_menu_query = mysqli_query($con, $sql_menu);

?>

<form action = "editdata.php" method= "POST" enctype= "multipart/form-data">
    id : <input type="text" name='id' value="<?php echo $id; ?>" readonly><br><br>
    Sitename : <input type="text" name= "sitename" value= "<?php echo $sitename ?>"><br><br>
    Sitelogo : <input type="file" name= "sitelogo" value= "<?php echo $siteurl ?>"><br><br>
    Siteurl : <input type="text" name= "siteurl" value= "<?php echo $siteurl ?>"><br><br>
    Details : <input type="text" name= "details" value= "<?php echo $details ?>"><br><br>
    Country : <select name="country">
              <?php 
                while($menudata = mysqli_fetch_array($sql_menu_query)){ 
                   $menucountryname = $menudata['countryname'];
                   $menucountryalias = $menudata['countryalias'];
               ?>
               <option vlaue="<?php echo $menucountryalias; ?>" <?php if($country==$menucountryalias){echo 'selected';} ?> > <?php echo $menucountryname;?></option>
               <?php } ?>
              </select>
    
    <br><br>
    Status : <input type="radio" name= "status" value= "publish" <?php if($status=='publish'){echo 'checked';} ?> >Publish
             <input type="radio" name= "status" value= "unpublish"<?php if($status=='unpublish'){echo 'checked';} ?> >Unpublish
             
             <br><br>     

    <input type="submit" value="submit">

</form>

<?php 
}else{
    header('location:index.php');

} ?>