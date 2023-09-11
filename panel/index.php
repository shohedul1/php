<?php 
require('core.inc.php');

if(!empty($_SESSION['user_id'])){

?>
<a href="newdata.php"><h2>New Data</h2></a>
<a href="listofdata.php"><h2>Edit Data</h2></a>
<a href="logout.php"><h2>Log out</h2></a>
<?php 
}else{
    header('location:login.php');

}
?>