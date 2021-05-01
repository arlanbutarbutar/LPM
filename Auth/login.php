<?php if(!isset($_SESSION)){session_start();}
    require_once("../Application/controller/script.php");
    $_SESSION['auth']=1; $_SESSION['name-page']="Login"; $_SESSION['page']="login";
?>

<!DOCTYPE html>
<html lang="id">
    <head><?php require_once("../Application/access/header.php");?></head>
    <body>
        <!-- ***** Preloader Start ***** -->
            <div id="preloader">
                <div class="jumper">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>  
        <!-- ***** Preloader End ***** -->

        <?php require_once("../Application/access/navbar.php");?>

        <!-- ***** Welcome Area Start ***** -->
            <div class="welcome-area" id="welcome">
                <div class="header-text">
                    <div class="container">
                        <div class="row">
                            <div class="left-text col-lg-6 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                                <h3 class="text-center text-white">Login</h3>
                                <p class="d-flex justify-content-center">Belum punya akun? silakan <a href="registration" class="nav-link ml-n2 mr-n3 mt-n2 text-white font-weight-bold">Daftar</a>.</p>
                                <div class="col-8 m-auto mt-3">
                                    <?php if(isset($message_success)){echo$message_success;}if(isset($message_danger)){echo$message_danger;}if(isset($message_warning)){echo$message_warning;}if(isset($message_info)){echo$message_info;}if(isset($message_dark)){echo$message_dark;}?>
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <input type="email" name="email" placeholder="Email" class="form-control text-center" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" placeholder="Password" class="form-control text-center" required>
                                        </div>
                                        <div class="form-group text-center">
                                            <button type="submit" name="login" class="btn btn-light btn-sm">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                                <img src="https://i.ibb.co/HqXWG7b/login.png" style="width: 300px" class="rounded img-fluid d-block mx-auto" alt="Login Content">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- ***** Welcome Area End ***** -->
    
        <?php require_once("../Application/access/footer.php");?>

  </body>
</html>