<?php if(!isset($_SESSION['access-file'])){?>
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="#page-top" class="logo">LPM UNWIRA</a>
                        <!-- ***** Logo End ***** --> 
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="<?php if(isset($_SESSION['auth'])){echo ".";}?>./">Home</a></li>
                            <li class="scroll-to-section"><a href="<?php if(isset($_SESSION['auth'])){echo "../";}?>info">Info</a></li>
                            <li class="scroll-to-section"><a href="http://spmi.unwira.ac.id/auth">e-SPMI</a></li>
                            <!-- <li class="scroll-to-section"><a href="#about">About</a></li>
                            <li class="scroll-to-section"><a href="#contact-us">Contact Us</a></li> -->
                            <?php if(isset($_SESSION['id-user'])){?>
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
                    <li class="nav-item"><a class="nav-link js-scroll-trigger text-light" href="info">Info</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger text-light mr-3" href="http://spmi.unwira.ac.id/auth">e-SPMI</a></li>
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