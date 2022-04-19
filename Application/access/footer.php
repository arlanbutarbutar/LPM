<?php if(!isset($_SESSION['access-file'])){if(isset($_SESSION['page'])=="index" || "info"){?>
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <p class="copyright">Powered by <a rel="nofollow" href="https://arcode.pw" target="_blank">Sahala Z.R Butar Butar</a></p>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12">
                    <ul class="social">
                        <li><a href="http://10.10.10.10/sia" target="_blank"><i class="fas fa-key"></i></a></li>
                        <li><a href="https://perpus.unwira.ac.id" target="_blank"><i class="fas fa-book-open"></i></a></li>
                        <li><a href="https://journal.unwira.ac.id" target="_blank"><i class="fas fa-book"></i></a></li>
                        <li><a href="http://elearning.unwira.ac.id"><i class="fas fa-chalkboard-teacher"></i></a></li>
                        <li><a href="https://docs.google.com/forms/d/e/1FAIpQLSfeE0OGUXe_5gUR_Ujv5exypQxiemaBYkTpA4s-TyVZtV6Eiw/viewform"><i class="fas fa-university"></i></a></li>
                        <li><a href="https://alumni.unwira.ac.id"><i class="fas fa-graduation-cap"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
<?php }if(!isset($_SESSION['id-user'])){?>
    <!-- jQuery -->
    <script src="<?php if(isset($_SESSION['auth'])){echo "../";}?>Assets/js/jquery-2.1.0.min.js"></script>
    
    <!-- Bootstrap -->
    <script src="<?php if(isset($_SESSION['auth'])){echo "../";}?>Assets/js/popper.js"></script>
    <!-- <script src="<?php if(isset($_SESSION['auth'])){echo "../";}?>Assets/js/bootstrap.min.js"></script> -->
    
    <!-- Plugins -->
    <script src="<?php if(isset($_SESSION['auth'])){echo "../";}?>Assets/js/owl-carousel.js"></script>
    <script src="<?php if(isset($_SESSION['auth'])){echo "../";}?>Assets/js/scrollreveal.min.js"></script>
    <script src="<?php if(isset($_SESSION['auth'])){echo "../";}?>Assets/js/waypoints.min.js"></script>
    <script src="<?php if(isset($_SESSION['auth'])){echo "../";}?>Assets/js/jquery.counterup.min.js"></script>
    <script src="<?php if(isset($_SESSION['auth'])){echo "../";}?>Assets/js/imgfix.min.js"></script> 
    
    <!-- Global Init -->
    <script src="<?php if(isset($_SESSION['auth'])){echo "../";}?>Assets/js/custom.js"></script>
<?php }if(isset($_SESSION['id-user'])){?>
    <!-- jQuery -->
    <script src="Assets/js/jquery-2.1.0.min.js"></script>
    
    <!-- Bootstrap -->
    <script src="Assets/js/popper.js"></script>
    <!-- <script src="Assets/js/bootstrap.min.js"></script> -->
    
    <!-- Plugins -->
    <script src="Assets/js/owl-carousel.js"></script>
    <script src="Assets/js/scrollreveal.min.js"></script>
    <script src="Assets/js/waypoints.min.js"></script>
    <script src="Assets/js/jquery.counterup.min.js"></script>
    <script src="Assets/js/imgfix.min.js"></script> 
    
    <!-- Global Init -->
    <script src="Assets/js/custom.js"></script>

    <!-- Asset -->
    <script src="Assets/js/register.js"></script>
    <script>
        // ==> alert timeout
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove();
                });
            }, 15000)
        // ==> end alert timeout
        // ==> file photo up
            $('.custom-file-input').on('change', function(){
                let fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').addClass("selected").html(fileName);
            });
        // ==> end file photo up
    </script>
<?php }?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<?php }if(isset($_SESSION['access-file'])){?>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container"><p class="m-0 text-center text-white">Powered by <a rel="nofollow" href="http://47.74.65.71:83" target="_blank">Sahala Z.R Butar Butar</a></p></div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <!-- Core theme JS-->
    <script src="Assets/js/scripts-profile.js"></script>
<?php }?>