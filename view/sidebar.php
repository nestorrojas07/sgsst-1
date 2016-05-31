<?php include '../controller/controlador_menus.php' ; ?>  
<div class="sidebar-menu toggle-others fixed">

    <div class="sidebar-menu-inner">	

        <header class="logo-env">

            <!-- logo -->
            <div class="logo">
                <a href="index.php" class="logo-expanded">
                    <img src="assets/images/sgsst.png" width="100%" alt="" />
                </a>

                <a href="index.php" class="logo-collapsed">
                    <img src="assets/images/sgsst.png" width="100%" alt="" />
                </a>
            </div>

            <!-- This will toggle the mobile menu and will be visible only on mobile devices -->
            <div class="mobile-menu-toggle visible-xs">
                <a href="#" data-toggle="user-info-menu">
                    <i class="fa-bell-o"></i>
                    <span class="badge badge-success">7</span>
                </a>

                <a href="#" data-toggle="mobile-menu">
                    <i class="fa-bars"></i>
                </a>
            </div>

            <!-- This will open the popup with user profile settings, you can use for any purpose, just be creative -->
            


        </header>



        <ul id="main-menu" class="main-menu">

            <!-- add class "multiple-expanded" to allow multiple submenus to open -->
            <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
            <li class="active opened active">
                <a href="index.php">
                    <i class="fa fa-tachometer"></i>
                    <span class="title">Dashboard</span>
                </a>


            </li>

            <?php
            for ( $i = 0 ; $i < sizeof ( $registros ) ; $i ++  )
            {
                ?>
                <li id="<?php echo $registros[ $i ][ 'titulo' ] ; ?>">

                    <a href="#<?php echo $registros[ $i ][ 'titulo' ] ; ?>">
                        <i class="<?php echo $registros[ $i ][ 'icono' ] ; ?>"></i>
                        <span class="title"><?php echo $registros[ $i ][ 'titulo' ] ; ?></span>
                        <?php $menu_id = $registros[ $i ][ 'menu_id' ] ; ?>
                    </a>

                    <?php for ( $j = 0 ; $j < sizeof ( $reg ) ; $j ++  )
                        {
                       
                       if ($menu_id == $reg[$j]['padre'])
                       {
                    ?>
                    <ul>
                        
                                                     
                            
                            <li>
                                <a href="<?php echo $reg[$j]['url']; ?>">
                                    <span class="title"><?php echo $reg[$j]['titulo']; ?></span>
                                </a>
                            </li>
                           
                    </ul>
                    
                    <?php
                       }
                    
                       } ?> 
                </li>
            <?php } ?>

    </div>

</div>
