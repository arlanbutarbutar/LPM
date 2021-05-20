<?php if(!isset($_SESSION['access-file'])){?>
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="#page-top" class="logo">Pelayanan Dokumen<br><p class="mt-n4">Lembaga Penjamin Mutu UNWIRA</p></a>
                        <!-- ***** Logo End ***** --> 
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="<?php if(isset($_SESSION['auth'])){echo ".";}?>./">Home</a></li>
                            <li class="scroll-to-section"><a href="http://spmi.unwira.ac.id/auth">e-SPMI</a></li>
                            <!-- <li class="scroll-to-section"><a href="#about">About</a></li>
                            <li class="scroll-to-section"><a href="#contact-us">Contact Us</a></li> -->
                            <?php if(isset($_SESSION['id-user'])){if($_SESSION['id-role']<=3){?>
                            <li class="scroll-to-section">
                                <button type="button" class="btn btn-info shadow-lg ml-n3 mt-1 btn-sm" data-toggle="modal" data-target=".jadwal-kegiatan"><i class="fas fa-calendar-alt"></i> <span class="badge badge-info text-warning"><?= $countSchedule_now?></span></button>
                            </li>
                            <?php }?>
                            <!-- <li class="submenu">
                                <a href="#">Info</a>
                                <ul>
                                    <li><a href="#">halaman 1</a></li>
                                    <li><a href="#">halaman 2</a></li>
                                    <li><a href="#">halaman 2</a></li>
                                </ul>
                            </li> -->
                            <?php }if(!isset($_SESSION['id-user']) && !isset($_SESSION['auth'])){?>
                            <li class="scroll-to-section"><a href="Auth/login">Login</a></li>
                            <?php }if(isset($_SESSION['id-user'])){?>
                            <a class="nav-link dropdown-toggle text-dark no-arrow mt-n2" href="" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php if(mysqli_num_rows($icon_profile)==0){?>
                                    <p class="text-danger">Query error!</p>
                                <?php }if(mysqli_num_rows($icon_profile)>0){while($row=mysqli_fetch_assoc($icon_profile)){?>
                                    <img class="img-profile rounded-circle no-arrow" style="width: 45px;" src="Assets/img/<?= $row['img']?>">
                                <?php }}?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in no-arrow" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2"></i>
                                    My Profile
                                </a>
                                <a class="dropdown-item" href="profile-settings">
                                    <i class="fas fa-cog fa-sm fa-fw mr-2"></i>
                                    Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="Application/controller/logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                                    Logout
                                </a>
                            </div>
                            <?php }?>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
<?php }if(isset($_SESSION['access-file'])){?>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-info shadow fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger font-weight-bold" href="./">LPM UNWIRA</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger text-light" href="./">Home</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger text-light mr-3" href="http://spmi.unwira.ac.id/auth">e-SPMI</a></li>
                    <?php if($_SESSION['id-role']<=3){?>
                    <li class="scroll-to-section">
                        <button type="button" class="btn btn-info shadow-lg ml-n3 mt-1 btn-sm" data-toggle="modal" data-target=".jadwal-kegiatan"><i class="fas fa-calendar-alt"></i> <span class="badge badge-info text-warning"><?= $countSchedule_now?></span></button>
                    </li>
                    <?php }?>
                    <a class="nav-link dropdown-toggle text-dark no-arrow mt-n2" href="" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php if(mysqli_num_rows($icon_profile)==0){?>
                            <p class="text-danger">Query error!</p>
                        <?php }if(mysqli_num_rows($icon_profile)>0){while($row=mysqli_fetch_assoc($icon_profile)){?>
                            <img class="img-profile rounded-circle no-arrow" style="width: 45px" src="Assets/img/<?= $row['img']?>">
                        <?php }}?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in no-arrow" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="profile">
                            <i class="fas fa-user fa-sm fa-fw mr-2"></i>
                            My Profile
                        </a>
                        <a class="dropdown-item" href="profile-settings">
                            <i class="fas fa-cog fa-sm fa-fw mr-2"></i>
                            Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="Application/controller/logout">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                            Logout
                        </a>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
<?php }?>

<?php if(isset($_SESSION['id-user'])){if($_SESSION['id-role']<=3){if(mysqli_num_rows($viewSchedule)==0){?>
    <div class="modal fade jadwal-kegiatan" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content text-center">
                <p class="mt-3">Belum ada jadwal kegiatan yang dimasukan.</p>
                <?php if(isset($_SESSION['id-user'])){if($_SESSION['id-role']<=2){?>
                    <p class="mt-5">Silakan masukan jadwal anda dibawah ini.</p>
                    <div class="col-4 m-auto">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="custom-file mt-3">
                                <input type="file" name="documen" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Pilih File Jadwal Kegiatan</label>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="upload-schedule" class="btn btn-info btn-sm mt-3 shadow">Upload</button>
                            </div>
                        </form>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>
<?php }}if(mysqli_num_rows($viewSchedule)>0){while($row=mysqli_fetch_assoc($viewSchedule)){?>
    <div class="modal fade jadwal-kegiatan" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content text-center bg-transparent border-0">
                <?php $ekstensiDokumen=['pdf'];
                $ekstensiGambar=explode('.',$row['schedule']);
                $ekstensiGambar=strtolower(end($ekstensiGambar));
                if(in_array($ekstensiGambar,$ekstensiDokumen)){
                    echo "<embed src='Assets/document/".$row['schedule']."' class='m-auto' width='1100px' height='600px' />";
                }?>
                <form action="" method="POST">
                    <input type="hidden" name="schedule" value="<?= $row['schedule']?>">
                    <div class="form-group">
                        <button type="submit" name="del-schedule" class="btn btn-danger btn-sm mt-3"><i class="fas fa-trash"></i> Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 <?php }}}}?>