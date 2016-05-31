<nav class="navbar user-info-navbar" role="navigation">

    <!-- Left links for user info navbar -->
    <ul class="user-info-menu left-links list-inline list-unstyled">

        <li class="hidden-sm hidden-xs">
            <a href="#" data-toggle="sidebar">
                <i class="fa-bars"></i>
            </a>
        </li>

        <li class="dropdown hover-line">
            <a href="#" data-toggle="dropdown">
                <i class="fa-bell-o"></i>
                <span class="badge badge-blue">7</span>
            </a>

            <ul class="dropdown-menu notifications">
                <li class="top">
                    <p class="small">
                      
                        Usted Tiene <strong>3</strong> Nuevas Notificaciones
                    </p>
                </li>

                <li>
                    <ul class="dropdown-menu-list list-unstyled ps-scrollbar">
                        <li class="active notification-success">
                            <a href="#">
                                <i class="fa-user"></i>

                                <span class="line">
                                    <strong>New user registered</strong>
                                </span>

                                <span class="line small time">
                                    30 seconds ago
                                </span>
                            </a>
                        </li>

                        <li class="active notification-secondary">
                            <a href="#">
                                <i class="fa-lock"></i>

                                <span class="line">
                                    <strong>Privacy settings have been changed</strong>
                                </span>

                                <span class="line small time">
                                    3 hours ago
                                </span>
                            </a>
                        </li>

                        <li class="notification-primary">
                            <a href="#">
                                <i class="fa-thumbs-up"></i>

                                <span class="line">
                                    <strong>Someone special liked this</strong>
                                </span>

                                <span class="line small time">
                                    2 minutes ago
                                </span>
                            </a>
                        </li>

                        <li class="notification-danger">
                            <a href="#">
                                <i class="fa-calendar"></i>

                                <span class="line">
                                    John cancelled the event
                                </span>

                                <span class="line small time">
                                    9 hours ago
                                </span>
                            </a>
                        </li>

                        <li class="notification-info">
                            <a href="#">
                                <i class="fa-database"></i>

                                <span class="line">
                                    The server is status is stable
                                </span>

                                <span class="line small time">
                                    yesterday at 10:30am
                                </span>
                            </a>
                        </li>

                        <li class="notification-warning">
                            <a href="#">
                                <i class="fa-envelope-o"></i>

                                <span class="line">
                                    New comments waiting approval
                                </span>

                                <span class="line small time">
                                    last week
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>

               
            </ul>
        </li>

    </ul>


    <!-- Right links for user info navbar -->
    <ul class="user-info-menu right-links list-inline list-unstyled">

        <li class="search-form"><!-- You can add "always-visible" to show make the search input visible -->

            <form method="get" action="extra-search.html">
                <input type="text" name="s" class="form-control search-field input-large" placeholder="Buscar Por.." />

                <button type="submit" class="btn btn-link">
                    <i class="linecons-search"></i>
                </button>
            </form>

        </li>
       
        <li class="dropdown user-profile">
            <a href="#" data-toggle="dropdown">
                <img src="assets/images/user-4.png" alt="user-image" class="img-circle img-inline userpic-32" width="28" />
                <span>
                  
                    
                    <?php echo strtoupper($_SESSION["nombre_usuario"]); ?>
                    <i class="fa-angle-down"></i>
                </span>
            </a>

            <ul class="dropdown-menu user-profile-menu list-unstyled">
                              
                <li>
                    <a href="#help">
                        <i class="fa-info"></i>
                      Manuales
                    </a>
                </li>
                <li class="last">
                    <a onclick="cerrar();" href="javascript:void(0);">
                        <i class="fa-lock"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </li>

        

    </ul>

</nav>
<script src="librerias/login.js"></script>