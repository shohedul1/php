<?php 
require("connect.inc.php");
include('menu.inc.php');
require('core.inc.php');

   if(!empty($_SESSION['user_id'])){


if(isset($_POST['sitename']) && isset($_POST['siteurl']) && isset($_POST['details']) && isset($_POST['country']) && isset($_POST['status'])){

    $sitename =  $_POST['sitename'];
    $siteurl =  $_POST['siteurl'];
    $details =  $_POST['details'];
    $country =  $_POST['country'];
    $status =  $_POST['status'];

    
  $sitelogo = $_FILES['sitelogo']['name'];
  $tmpname =  $_FILES['sitelogo']['tmp_name'];

    
    if(!empty($sitename) && !empty($sitelogo) && !empty($siteurl) && !empty($details) && !empty($country) && !empty($status)){ 
        move_uploaded_file($tmpname,'../images/'.$sitelogo);

        $sql = "INSERT INTO newssite VALUES('','  $sitename',' $sitelogo','$siteurl','$details','$country','$status')";
        if($sql_query = mysqli_query($con,  $sql)){
            header('location:listofdata.php');
        }else{
            echo 'same problem! Try again!';
        }


}else{
    echo 'Fill up all froms';
}
    
}
$sql_menu = "SELECT * FROM mainmenu";
$sql_menu_query = mysqli_query($con, $sql_menu);

?>

<form action = "newdata.php" method ="POST" enctype="multipart/form-data">
   Sitename: <input type = "text" name = "sitename"><br><br>
   Sitelogo: <input type = "file" name = "sitelogo"><br><br>
   Siteurl: <input type = "text" name = "siteurl"><br><br>
   Details: <input type = "text" name = "details"><br><br>
   Country: <select name='country'>
               <?php 
                while($menudata = mysqli_fetch_array($sql_menu_query)){ 
                   $menucountryname = $menudata['countryname'];
                   $menucountryalias = $menudata['countryalias'];
               ?>
               <option value="<?php echo $menucountryalias; ?>"><?php echo $menucountryname;?></option>
               <?php   } ?>
            </select><br><br>

   Status: <input type = "radio" name = "status" value="publish">Publish
           <input type="radio" name="status" vlaue="unpublish">Unpublish<br><br>


    <input type = "submit"  value = "submit">

</form>

<?php 
   }else{
    header('location:login.php');
   }
?>