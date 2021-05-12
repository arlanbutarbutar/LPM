<?php if(!isset($_SESSION)){session_start();}
    if(!isset($_SESSION['id-user'])){header("Location: ./");exit;}
    require_once("Application/controller/script.php");
    if(isset($_SESSION['auth'])){unset($_SESSION['auth']);}
    $_SESSION['name-page']="Settings";  $_SESSION['page']="profile-settings";
    $_SESSION['access-file']=2;
?>

<!DOCTYPE html>
<html lang="id">
    <head><?php require_once("Application/access/header.php");?></head>
    <body id="page-top">
        <?php require_once("Application/access/navbar.php");?>
        <header class="bg-light" id="services">
            <div class="container text-center text-light">
                <h1>Settings</h1>
                <p class="lead text-light">Selamat datang <?= $_SESSION['username']?>, silakan setting kata sandi atau password kamu.</p>
            </div>
        </header>
        <section id="about">
            <div class="container">
                <div class="row">
                    <!-- Alert -->
                        <div class="col-md-12">
                            <?php if(isset($message_success)){echo$message_success;}if(isset($message_danger)){echo$message_danger;}if(isset($message_warning)){echo$message_warning;}if(isset($message_info)){echo$message_info;}if(isset($message_dark)){echo$message_dark;}?>
                        </div>
                    <!-- Alert Ends -->

                    <?php foreach($viewProfile as $row):?>
                    <!-- Biodata -->
                        <div class="col-lg-8 mx-auto">
                            <div class="card card-body border-0 shadow text-center">
                                <h2>Kelola Password</h2>
                                <form action="" method="POST" class="mt-4">
                                    <input type="hidden" name="id-user" value="<?= $row['id_user']?>">
                                    <div class="form-group">
                                        <input type="password" name="password" placeholder="Password Lama" class="form-control text-center" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password1" placeholder="Password Baru" class="form-control text-center" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password2" placeholder="Ulangi Password Baru" class="form-control text-center" required>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="save-password" class="btn btn-info btn-sm shadow mt-3">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <!-- Biodata Ends -->
                    <?php endforeach;?>
                </div>
            </div>
        </section>
        <?php require_once("Application/access/footer.php");?>

    </body>
</html>