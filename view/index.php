<?php
session_start () ;

if ( ! $_SESSION )
{
    ?>
    <script language = javascript>
        location.href = 'login.php';
    </script>
    <?php
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'head.php' ; ?>
        <title>SGSST - Dashboard</title>
    </head>
    <body class="page-body">

        <div class="settings-pane">

            <a href="#" data-toggle="settings-pane" data-animate="true">
                &times;
            </a>

            <!--		<div class="settings-pane-inner">
                                    
                                    <div class="row">
                                            
                                            <div class="col-md-4">
                                                    
                                                    <div class="user-info">
                                                            
                                                            <div class="user-image">
                                                                    <a href="extra-profile.html">
                                                                            <img src="assets/images/user-2.png" class="img-responsive img-circle" />
                                                                    </a>
                                                            </div>
                                                            
                                                            <div class="user-details">
                                                                    
                                                                    <h3>
                                                                            <a href="extra-profile.html">John Smith</a>
                                                                            
                                                                             Available statuses: is-online, is-idle, is-busy and is-offline 
                                                                            <span class="user-status is-online"></span>
                                                                    </h3>
                                                                    
                                                                    <p class="user-title">Web Developer</p>
                                                                    
                                                                    <div class="user-links">
                                                                            <a href="extra-profile.html" class="btn btn-primary">Edit Profile</a>
                                                                            <a href="extra-profile.html" class="btn btn-success">Upgrade</a>
                                                                    </div>
                                                                    
                                                            </div>
                                                            
                                                    </div>
                                                    
                                            </div>
                                            
                                            <div class="col-md-8 link-blocks-env">
                                                    
                                                    <div class="links-block left-sep">
                                                            <h4>
                                                                    <span>Notifications</span>
                                                            </h4>
                                                            
                                                            <ul class="list-unstyled">
                                                                    <li>
                                                                            <input type="checkbox" class="cbr cbr-primary" checked="checked" id="sp-chk1" />
                                                                            <label for="sp-chk1">Messages</label>
                                                                    </li>
                                                                    <li>
                                                                            <input type="checkbox" class="cbr cbr-primary" checked="checked" id="sp-chk2" />
                                                                            <label for="sp-chk2">Events</label>
                                                                    </li>
                                                                    <li>
                                                                            <input type="checkbox" class="cbr cbr-primary" checked="checked" id="sp-chk3" />
                                                                            <label for="sp-chk3">Updates</label>
                                                                    </li>
                                                                    <li>
                                                                            <input type="checkbox" class="cbr cbr-primary" checked="checked" id="sp-chk4" />
                                                                            <label for="sp-chk4">Server Uptime</label>
                                                                    </li>
                                                            </ul>
                                                    </div>
                                                    
                                                    <div class="links-block left-sep">
                                                            <h4>
                                                                    <a href="#">
                                                                            <span>Help Desk</span>
                                                                    </a>
                                                            </h4>
                                                            
                                                            <ul class="list-unstyled">
                                                                    <li>
                                                                            <a href="#">
                                                                                    <i class="fa-angle-right"></i>
                                                                                    Support Center
                                                                            </a>
                                                                    </li>
                                                                    <li>
                                                                            <a href="#">
                                                                                    <i class="fa-angle-right"></i>
                                                                                    Submit a Ticket
                                                                            </a>
                                                                    </li>
                                                                    <li>
                                                                            <a href="#">
                                                                                    <i class="fa-angle-right"></i>
                                                                                    Domains Protocol
                                                                            </a>
                                                                    </li>
                                                                    <li>
                                                                            <a href="#">
                                                                                    <i class="fa-angle-right"></i>
                                                                                    Terms of Service
                                                                            </a>
                                                                    </li>
                                                            </ul>
                                                    </div>
                                                    
                                            </div>
                                            
                                    </div>
                            
                            </div>-->

        </div>

        <div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

            <!-- Add "fixed" class to make the sidebar fixed always to the browser viewport. -->
            <!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
            <!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->
            <?php include 'sidebar.php' ; ?>

            <div class="main-content">

                <!-- User Info, Notifications and Menu Bar -->
                <?php include 'encabezado.php' ; ?>



                <div class="row">

                    <div class="col-sm-3">
                        <?php $total_empleados = 1200 ; ?>
                        <div class="xe-widget xe-progress-counter xe-progress-counter-blue" data-count=".num" data-from="0" data-to="<?php echo $total_empleados ?>" data-duration="2">

                            <div class="xe-background">
                                <i class="fa fa-users"></i>
                            </div>

                            <div class="xe-upper">
                                <div class="xe-icon">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="xe-label">
                                    <h4><a href="browser_empleados.php"><b class="text-white"> EMPLEADOS</b></a></h4>
                                    <strong class="num">0</strong>
                                </div>
                            </div>

                            <div class="xe-progress">
                                <span class="xe-progress-fill" data-fill-from="0" data-fill-to="100" data-fill-unit="%" data-fill-property="width" data-fill-duration="2" data-fill-easing="true"></span>
                            </div>
                            <div class="xe-lower">
                                <strong><h6>100 % Empleados</h6> </strong>
                            </div>

                        </div>

                    </div>

                    <div class="col-sm-3">
                        <?php $total_hv = 1050 ; ?>
                        <div class="xe-widget xe-progress-counter xe-progress-counter-turquoise" data-count=".num" data-from="0" data-to="<?php echo $total_hv ; ?>" data-duration="2">

                            <div class="xe-background">
                                <i class="linecons-attach"></i>
                            </div>

                            <div class="xe-upper">
                                <div class="xe-icon">
                                    <i class="linecons-attach"></i>
                                </div>
                                <div class="xe-label">
                                    <h4><a href="browser_empleados.php"><b class="text-white">HOJAS DE VIDA</b></a></h4>
                                    <strong class="num">0</strong>
                                </div>
                            </div>

                            <div class="xe-progress">
                                <span class="xe-progress-fill" data-fill-from="0" data-fill-to="<?php echo $total_hv * 100 / $total_empleados ; ?>" data-fill-unit="%" data-fill-property="width" data-fill-duration="2" data-fill-easing="true"></span>
                            </div>
                            <div class="xe-lower">
                                <strong><h6><?php echo number_format ( ($total_hv * 100 / $total_empleados ) , 2 ) ; ?> %</h6> </strong>
                            </div>

                        </div>

                    </div>

                    <div class="col-sm-3">
                        <?php $total_contratos = 1078; ?>
                        <div class="xe-widget xe-progress-counter xe-progress-counter-red" data-count=".num" data-from="0" data-to="<?php echo $total_contratos ; ?>" data-duration="2">

                            <div class="xe-background">
                                <i class="fa fa-file-text"></i>
                            </div>

                            <div class="xe-upper">
                                <div class="xe-icon">
                                    <i class="fa fa-file-text"></i>
                                </div>
                                <div class="xe-label">
                                    <h4><a href="browser_empleados.php"><b class="text-white">CONTRATOS</b></a></h4>
                                    <strong class="num">0</strong>
                                </div>
                            </div>

                            <div class="xe-progress">
                                <span class="xe-progress-fill" data-fill-from="0" data-fill-to="<?php echo $total_contratos * 100 / $total_empleados ; ?>" data-fill-unit="%" data-fill-property="width" data-fill-duration="2" data-fill-easing="true"></span>
                            </div>
                            <div class="xe-lower">
                                <strong><h6><?php echo number_format ( ($total_contratos * 100 / $total_empleados ) , 2 ) ; ?> %</h6> </strong>
                            </div>

                        </div>

                    </div>


                    <div class="clearfix"></div>

                    

                </div>
                <!-- Main Footer -->
                <!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
                <!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
                <!-- Or class "fixed" to  always fix the footer to the end of page -->
                       <?php include 'footer.php'; ?>
            </div>


      
         
        </div>







        <!-- Imported styles on this page -->
        <link rel="stylesheet" href="assets/css/fonts/meteocons/css/meteocons.css">

        <!-- Bottom Scripts -->
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/TweenMax.min.js"></script>
        <script src="assets/js/resizeable.js"></script>
        <script src="assets/js/joinable.js"></script>
        <script src="assets/js/xenon-api.js"></script>
        <script src="assets/js/xenon-toggles.js"></script>


        <!-- Imported scripts on this page -->
        <script src="assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="assets/js/jvectormap/regions/jquery-jvectormap-world-mill-en.js"></script>
        <script src="assets/js/xenon-widgets.js"></script>


        <!-- JavaScripts initializations and stuff -->
        <script src="assets/js/xenon-custom.js"></script>

    </body>
</html>