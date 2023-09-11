            <?php  
            $sql_menu = " SELECT id, countryname, countryalias FROM mainmenu";
            $sql_menu_query = mysqli_query($con, $sql_menu);
            ?>
            
            <ul>
                <li><a href="index.php">Home</a></li>
                <?php
                while( $menu = mysqli_fetch_array($sql_menu_query)){ 
                
                 $menuid = $menu['id'];
                 $countryname = $menu['countryname'];
                 $countryalias = $menu['countryalias'];
                
                 ?>
                 <li><a href="category.php?category=<?php echo $countryalias; ?>"><?php echo $countryname ?></a></li>
                 <?php } ?>
               
            </ul>