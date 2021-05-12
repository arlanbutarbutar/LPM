<?php if(!isset($_SESSION)){session_start();}
    if(!isset($_SESSION['id-user'])){header("Location: ./");exit;}
    require_once("Application/controller/script.php");
    if(isset($_SESSION['auth'])){unset($_SESSION['auth']);}
    $_SESSION['name-page']="My Profile";  $_SESSION['page']="profile";
    $_SESSION['access-file']=2;
?>

<!DOCTYPE html>
<html lang="id">
    <head><?php require_once("Application/access/header.php");?></head>
    <body id="page-top">
        <?php require_once("Application/access/navbar.php");?>
        <header class="bg-light" id="services">
            <div class="container text-center text-light">
                <h1>My Profile</h1>
                <p class="lead text-light">Selamat datang <?= $_SESSION['username']?>, silakan kelola data pribadi kamu.</p>
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
                        <div class="col-lg-8">
                            <div class="card card-body border-0 shadow text-center">
                                <h2>Data Pribadi Anda</h2>
                                <?php if(!isset($_POST['view-biodata-profile'])){?>
                                <p class="m-0 p-0">NIDN/NIP: <?= $row['nidn']?></p>
                                <p class="m-0 p-0">Username: <?= $row['username']?></p>
                                <p class="m-0 p-0">Email: <?= $row['email']?></p>
                                <p class="m-0 p-0">Prodi atau Unit: <?= $row['prodi']?></p>
                                <p class="m-0 p-0">Tanggal Buat: <?= $row['date_created']?></p>
                                <form action="" method="POST">
                                    <button type="submit" name="view-biodata-profile" class="btn btn-info shadow btn-sm mt-3">Ubah</button>
                                </form>
                                <?php }if(isset($_POST['view-biodata-profile'])){?>
                                <div class="col-8 mt-4 mx-auto">
                                    <form action="" method="POST">
                                        <input type="hidden" name="id-user" value="<?= $row['id_user']?>">
                                        <input type="hidden" name="old-nidn" value="<?= $row['nidn']?>">
                                        <input type="hidden" name="old-email" value="<?= $row['email']?>">
                                        <div class="form-group text-center">
                                            <label for="nidn-nip" class="font-weight-bold">NIDN/NIP</label>
                                            <input type="number" name="nidn" value="<?= $row['nidn']?>" id="nidn-nip" placeholder="NIDN/NIP" class="form-control text-center" required>
                                        </div>
                                        <div class="form-group text-center">
                                            <label for="username" class="font-weight-bold">Username</label>
                                            <input type="text" name="username" value="<?= $row['username']?>" id="username" placeholder="Nama Dosen" class="form-control text-center" required>
                                        </div>
                                        <div class="form-group text-center">
                                            <label for="email" class="font-weight-bold">e-Mail</label>
                                            <input type="email" name="email" value="<?= $row['email']?>" id="email" placeholder="e-Mail" class="form-control text-center" required>
                                        </div>
                                        <div class="form-group text-center">
                                            <label for="prodi-unit" class="font-weight-bold">Program Studi atau Unit</label>
                                            <select name="id-prodi" id="prodi-unit" class="form-control text-center" required>
                                                <option>Pilih Program Studi atau Unit</option>
                                                <?php foreach($select_prodi as $row_prodi):?>
                                                <option value="<?= $row_prodi['id_prodi']?>"><?= $row_prodi['prodi']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="form-group text-center">
                                            <button type="submit" name="save-biodata" class="btn btn-info shadow btn-sm mt-3">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    <!-- Biodata Ends -->

                    <!-- Photo Profile -->
                        <div class="col-lg-4 text-center" id="register">
                            <div class="card card-body border-0 shadow">
                                <?php if(!isset($_POST['view-image-profile'])){?>
                                <img src="Assets/img/<?= $row['img']?>" alt="Profile Saya" class="img-thumbnail mx-auto rounded-circle" style="width: 200px">
                                <form action="" method="POST">
                                    <button type="submit" name="view-image-profile" class="btn btn-info btn-sm shadow mt-3">Ubah</button>
                                </form>
                                <?php }if(isset($_POST['view-image-profile'])){?>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id-user" value="<?= $row['id_user'];?>">
                                    <input type="hidden" name="old-img" value="<?= $row['img']?>">
                                    <div class="upload-profile-image d-flex justify-content-center">
                                        <div class="text-center">
                                            <div class="d-flex justify-content-center">
                                                <img class="camera-icon" src="Assets/img/camera-solid.svg" alt="camera">
                                            </div>
                                            <img src="Assets/img/<?= $row['img'];?>" style="width: 200px" class="img rounded-circle" alt="profile">
                                            <small class="form-text text-black-50">Pilih Fotomu</small>
                                            <input type="file" class="form-control-file" name="profile" id="upload-profile">
                                        </div>
                                    </div>
                                    <div class="form-group mt-4">
                                        <button type="submit" name="save-profile" class="btn btn-info btn-sm shadow card-scale">Simpan</button>
                                    </div>
                                </form>
                                <?php }?>
                            </div>
                        </div>
                    <!-- Photo Profile Ends -->
                    <?php endforeach;?>
                </div>
            </div>
        </section>
        <?php require_once("Application/access/footer.php");?>

    </body>
</html>