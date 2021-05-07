<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Lembaga Penjamin Mutu (LPM) - Universitas Katolik Widya Mandira Kupang">
<meta name="author" content="Template Mo">
<link rel="shortcut icon" href="https://i.ibb.co/dc2tbV3/logo-unwira.png">
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- <div>Icons made by <a href="" title="Kiranshastry">Kiranshastry</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div> -->
<!-- <div>Icons made by <a href="https://www.flaticon.com/authors/kiranshastry" title="Kiranshastry">Kiranshastry</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div> -->
<script type='text/javascript'>
    msg = " LPM UNWIRA<?php if(isset($_SESSION['name-page']) && $_SESSION['name-page']!=""){echo " - ".$_SESSION['name-page'];}?>";
    msg = " " + msg; 
    pos = 0;

    function scrollMSG() {
        document.title = msg.substring(pos, msg.length) + msg.substring(0, pos);
        pos++;
        if (pos > msg.length) pos = 0
        window.setTimeout("scrollMSG()", 400);
    }
    scrollMSG();
</script> 
<?php if(!isset($_SESSION['id-user'])){?>
    <!-- <link rel="stylesheet" type="text/css" href="<?php if(isset($_SESSION['auth'])){echo "../";}?>Assets/css/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" href="<?php if(isset($_SESSION['auth'])){echo "../";}?>Assets/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?php if(isset($_SESSION['auth'])){echo "../";}?>Assets/css/stylex.css">
    <link rel="stylesheet" type="text/css" href="<?php if(isset($_SESSION['auth'])){echo "../";}?>Assets/css/owl-carousel.css">
    <link rel="stylesheet" type="text/css" href="<?php if(isset($_SESSION['auth'])){echo "../";}?>Assets/css/scroll.css">
    <link rel="stylesheet" type="text/css" href="<?php if(isset($_SESSION['auth'])){echo "../";}?>Assets/fontawesome-free/css/all.min.css">
<?php }if(isset($_SESSION['id-user'])){?>
    <!-- <link rel="stylesheet" type="text/css" href="Assets/css/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" href="Assets/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/stylex.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/owl-carousel.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/scroll.css">
    <link rel="stylesheet" type="text/css" href="Assets/fontawesome-free/css/all.min.css">
<?php }?>
<style>
.mobileAR{
    margin-top: 0;
}
.mobileIMG{
    display: block;
}
@media screen and (max-width: 640px){
    .mobileAR{
        margin-top: 250px;
    }
    .mobileIMG{
        display: hidden;
    }
}
</style>