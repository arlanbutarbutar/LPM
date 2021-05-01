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
                        <li class="scroll-to-section"><a href="<?php if(isset($_SESSION['auth'])){echo ".";}?>./" class="">Home</a></li>
                        <li class="scroll-to-section"><a href="<?php if(isset($_SESSION['auth'])){echo ".";}?>./info" class="">Info</a></li>
                        <li class="scroll-to-section"><a href="http://spmi.unwira.ac.id/auth" class="">e-SPMI</a></li>
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
                        <li class="scroll-to-section"><a href="Application/controller/logout">Logout</a></li>
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
