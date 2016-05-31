<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'head.php'; ?>
        <title>SGSST - Login</title>

    </head>
    <body class="page-body login-page">


        <div class="login-container">

            <div class="row">

                <div class="col-sm-6">

                    <script type="text/javascript">
                        jQuery(document).ready(function ($)
                        {
                            // Reveal Login form
                            setTimeout(function () {
                                $(".fade-in-effect").addClass('in');
                            }, 1);


                            // Validation and Ajax action
                            $("form#login").validate({
                                rules: {
                                    username: {
                                        required: true
                                    },
                                    passwd: {
                                        required: true
                                    }
                                },
                                messages: {
                                    username: {
                                        required: 'Por Favor Ingrese Usuario.'
                                    },
                                    passwd: {
                                        required: 'Por Favor Ingrese Password.'
                                    }
                                },
                                // Form Processing via AJAX
                                submitHandler: function (form)
                                {
                                    show_loading_bar(70); // Fill progress bar to 70% (just a given value)

                                    var opts = {
                                        "closeButton": true,
                                        "debug": false,
                                        "positionClass": "toast-top-full-width",
                                        "onclick": null,
                                        "showDuration": "300",
                                        "hideDuration": "1000",
                                        "timeOut": "5000",
                                        "extendedTimeOut": "1000",
                                        "showEasing": "swing",
                                        "hideEasing": "linear",
                                        "showMethod": "fadeIn",
                                        "hideMethod": "fadeOut"
                                    };

                                    $.ajax({
                                        url: '../controller/controlador_login.php',
                                        method: 'POST',
                                        dataType: 'json',
                                        data: {
                                            do_login: true,
                                            username: $(form).find('#username').val(),
                                            passwd: $(form).find('#passwd').val(),
                                        },
                                        success: function (resp)
                                        {
                                            
                                            show_loading_bar({
                                                delay: .5,
                                                pct: 100,
                                                finish: function () {

                                                    // Redirect after successful login page (when progress bar reaches 100%)
                                                    if (resp.accessGranted)
                                                    {
                                                        window.location.href = 'index.php';
                                                    } else
                                                    {
                                                        toastr.error("Usuario o Password Incorrectos ,Por Favor Verifique E Intente de Nuevo , Gracias!!!", " Ingreso Invalido!", opts);
                                                        //$passwd.select();
                                                    }
                                                }
                                            });

                                        }
                                    });

                                }
                            });

                            // Set Form focus
                            $("form#login .form-group:has(.form-control):first .form-control").focus();
                        });
                    </script>

                    <!-- Errors container -->
                    <div class="errors-container">


                    </div>

                    <!-- Add class "fade-in-effect" for login form effect -->
                    <form method="post" role="form" id="login" class="login-form fade-in-effect">

                        <div class="login-header">
                            <a href="login.php" class="logo">
                                <img src="assets/images/sgsst.png" alt="" width="100%" />
                   
                            </a>

            
                        </div>


                        <div class="form-group">
                            <label class="control-label" for="username">Usuario</label>
                            <input type="text" class="form-control input-dark" name="username" id="username" autocomplete="off" />
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="passwd">Password</label>
                            <input type="password" class="form-control input-dark" name="passwd" id="passwd" autocomplete="off" />
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-dark  btn-block text-left">
                                <i class="fa-lock"></i>
                                        Acceder
                            </button>
                        </div>

<!--                        <div class="login-footer">
                            <a href="#">Forgot your password?</a>

                            <div class="info-links">
                                <a href="#">ToS</a> -
                                <a href="#">Privacy Policy</a>
                            </div>

                        </div>-->

                    </form>

                    <!-- External login -->
<!--                    <div class="external-login">
                        <a href="#" class="facebook">
                            <i class="fa-facebook"></i>
                            Facebook Login
                        </a>

                         
                        <a href="#" class="twitter">
                                <i class="fa-twitter"></i>
                                Login with Twitter
                        </a>
                        
                        <a href="#" class="gplus">
                                <i class="fa-google-plus"></i>
                                Login with Google Plus
                        </a>
                        
                    </div>-->

                </div>

            </div>

        </div>



        <!-- Bottom Scripts -->
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/TweenMax.min.js"></script>
        <script src="assets/js/resizeable.js"></script>
        <script src="assets/js/joinable.js"></script>
        <script src="assets/js/xenon-api.js"></script>
        <script src="assets/js/xenon-toggles.js"></script>
        <script src="assets/js/jquery-validate/jquery.validate.min.js"></script>
        <script src="assets/js/toastr/toastr.min.js"></script>


        <!-- JavaScripts initializations and stuff -->
        <script src="assets/js/xenon-custom.js"></script>

    </body>
</html>