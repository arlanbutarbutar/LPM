<?php if(!isset($_SESSION)){session_start();}
    require_once("Application/controller/script.php");
    if(isset($_SESSION['auth'])){unset($_SESSION['auth']);}
    $_SESSION['name-page']="";  $_SESSION['page']="./";
    if(isset($_SESSION['access-file'])){unset($_SESSION['access-file']);}
?>

<!DOCTYPE html>
<html lang="id">
    <head><?php require_once("Application/access/header.php");?></head>
    <body id="page-top">
        <!-- ***** Preloader Start ***** -->
            <div id="preloader">
                <div class="jumper">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>  
        <!-- ***** Preloader End ***** -->

        <?php require_once("Application/access/navbar.php");?>

        <!-- ***** Welcome Area Start ***** -->
            <div class="" id="welcome">
                <div class="header-text">
                    <div class="container">
                        <div class="row">
                            <div class="left-text col-lg-6 col-md-6 col-sm-12 col-xs-12 m-auto" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                                <h1 class="text-white mt-5">Pelayanan Dokumen Lembaga Penjamin Mutu <strong>UNWIRA</strong></h1>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 m-auto" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                                <?php if(isset($_SESSION['section'])){if($_SESSION['section']==1){if(isset($message_success)){echo$message_success;}if(isset($message_danger)){echo$message_danger;}if(isset($message_warning)){echo$message_warning;}if(isset($message_info)){echo$message_info;}if(isset($message_dark)){echo$message_dark;}}}?>
                                <?php if(isset($_SESSION['id-user'])){if($_SESSION['id-role']<=3){?>
                                <div class="row">
                                    <!-- Insert Document -->
                                    <?php if($_SESSION['id-role']<=3){?>
                                    <div class="col-lg-6">
                                        <div class="card card-body border-0 shadow text-center mt-3">
                                            <img src="https://i.ibb.co/vmFRv1z/add-file.png" style="width: 100px" class="m-auto" alt="Add Document">
                                            <button type="button" class="btn btn-info btn-sm mt-3" data-toggle="modal" data-target="#tambahDokumen">Tambah Dokumen</button>
                                            <div class="modal fade" id="tambahDokumen" tabindex="-1" role="dialog" aria-labelledby="tambahDokumen" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="tambahDokumen">Tambah Dokumen</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="" method="POST" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <select name="id-doc" class="form-control" required>
                                                                        <option>Pilih Jenis Dokumen</option>
                                                                        <?php foreach($selectDoc as $rowDoc):?>
                                                                        <option value="<?= $rowDoc['id_doc']?>"><?= $rowDoc['documen']?></option>
                                                                        <?php endforeach;?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <select name="id-prodi" class="form-control" required>
                                                                        <option value="0">Pilih Program Studi</option>
                                                                        <?php foreach($selectProdi as $rowProdi):?>
                                                                        <option value="<?= $rowProdi['id_prodi']?>"><?= $rowProdi['prodi']?></option>
                                                                        <?php endforeach;?>
                                                                    </select>
                                                                    <small class="text-info">Jika Jenis Dokumen tidak per-Program Studi, tidak perlu diisi.</small>
                                                                </div>
                                                                <div class="custom-file">
                                                                    <input type="file" name="documen" class="custom-file-input" id="customFile">
                                                                    <label class="custom-file-label" for="customFile">Pilih Doc</label>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light btn-sm shadow" data-dismiss="modal">Close</button>
                                                                <button type="submit" name="lpm-data1-doc" class="btn btn-info btn-sm shadow">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Insert Document -->

                                    <!-- Unduh Document -->
                                    <div class="col-lg-6">
                                        <div class="card card-body border-0 shadow mt-3">
                                            <img src="https://i.ibb.co/W5zMQNg/file.png" style="width: 100px" class="m-auto" alt="Add Document">
                                            <button type="button" class="btn btn-info btn-sm mt-3" data-toggle="modal" data-target=".bd-example-modal-xl">Unduh Dokumen</button>
                                            <div class="modal fade bd-example-modal-xl bg-light" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl shadow">
                                                    <div class="modal-content">
                                                        <h4 class="text-center mt-4">Data Pelayanan Dokumen Lembaga Penjamin Mutu UNWIRA</h4>
                                                        <div class="row mt-3">
                                                            <!-- Non prodi -->
                                                            <div class="col-lg-6 text-center mt-3">
                                                                <h6>Data LPM Non Prodi</h6>
                                                                <div class="card card-body border-0" style="overflow-x: auto">
                                                                    <table class="table table-sm text-center">
                                                                        <thead>
                                                                            <tr style="border-top: hidden">
                                                                                <th scope="col">#</th>
                                                                                <th scope="col">Jenis Dokumen</th>
                                                                                <th scope="col">Nama Dokumen</th>
                                                                                <th scope="col">Tanggal Buat</th>
                                                                                <?php if($_SESSION['id-access']==1){?>
                                                                                <th colspan="1">Aksi</th>
                                                                                <?php }?>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php $no=1; if(mysqli_num_rows($dataLPM2)==0){?>
                                                                            <tr>
                                                                                <th colspan="5">Belum ada dokumen yang dimasukan.</th>
                                                                            </tr>
                                                                            <?php }else if(mysqli_num_rows($dataLPM2)>0){while($rowNProdi=mysqli_fetch_assoc($dataLPM2)){?>
                                                                            <tr>
                                                                                <th scope="row"><?= $no;?></th>
                                                                                <td><?= $rowNProdi['documen']?></td>
                                                                                <td><?= $rowNProdi['data_doc']?></td>
                                                                                <td><?= $rowNProdi['date_created']?></td>
                                                                                <?php if($_SESSION['id-access']==1){?>
                                                                                <td><form action="" method="POST">
                                                                                    <input type="hidden" name="data-doc" value="<?= $rowNProdi['data_doc']?>">
                                                                                    <input type="hidden" name="documen" value="<?= $rowNProdi['documen']?>">
                                                                                    <button type="submit" name="unduh-DocNProdi" class="btn btn-info btn-sm"><i class="fas fa-download"></i> Unduh</button>
                                                                                </form></td>
                                                                                <?php }?>
                                                                            </tr>
                                                                            <?php $no++; }}?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <!-- End Non Prodi -->

                                                            <!-- Prodi -->
                                                            <div class="col-lg-6 text-center mt-3">
                                                                <h6>Data LPM Prodi <?= $rowVProdi['prodi']?></h6>
                                                                <div class="card card-body border-0" style="overflow-x: auto">
                                                                    <table class="table table-sm text-center">
                                                                        <thead>
                                                                            <tr style="border-top: hidden">
                                                                                <th scope="col">#</th>
                                                                                <th scope="col">Jenis Dokumen</th>
                                                                                <th scope="col">Nama Dokumen</th>
                                                                                <th scope="col">Tanggal Buat</th>
                                                                                <?php if($_SESSION['id-access']==1){?>
                                                                                <th colspan="1">Aksi</th>
                                                                                <?php }?>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php $no=1; if(mysqli_num_rows($dataLPM1)==0){?>
                                                                            <tr>
                                                                                <th colspan="6">Belum ada dokumen yang dimasukan.</th>
                                                                            </tr>
                                                                            <?php }else if(mysqli_num_rows($dataLPM1)>0){while($rowProdi=mysqli_fetch_assoc($dataLPM1)){?>
                                                                            <tr>
                                                                                <th scope="row"><?= $no;?></th>
                                                                                <td><?= $rowProdi['documen']?></td>
                                                                                <td><?= $rowProdi['data_doc']?></td>
                                                                                <td><?= $rowProdi['date_created']?></td>
                                                                                <?php if($_SESSION['id-access']==1){?>
                                                                                <td><form action="" method="POST">
                                                                                    <input type="hidden" name="data-doc" value="<?= $rowProdi['data_doc']?>">
                                                                                    <input type="hidden" name="documen" value="<?= $rowProdi['documen']?>">
                                                                                    <button type="submit" name="unduh-DocProdi" class="btn btn-info btn-sm"><i class="fas fa-download"></i> Unduh</button>
                                                                                </form></td>
                                                                                <?php }?>
                                                                            </tr>
                                                                            <?php $no++; }}?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <!-- End Prodi -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }?>
                                    <!-- End Unduh Document -->
                                </div>
                                <?php }else if($_SESSION['id-role']==4){?>
                                <img src="https://i.ibb.co/jyKgWzS/header.png" class="rounded img-fluid d-block mx-auto mt-3" alt="Profile LPM UNWIRA">
                                <?php }}else if(!isset($_SESSION['id-user'])){?>
                                <img src="https://i.ibb.co/jyKgWzS/header.png" class="rounded img-fluid d-block mx-auto mt-3" alt="Profile LPM UNWIRA">
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- ***** Welcome Area End ***** -->
    
        <?php if(isset($_SESSION['id-user'])){if($_SESSION['id-role']<=2){?>

        <!-- ***** Data Jenis Doc Start ***** -->
            <section class="section" id="jenis-doc">
                <div class="container" style="margin-top: 150px">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-sm-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                            <img src="Assets/img/document.png" class="rounded img-fluid d-block mx-auto" alt="App">
                        </div>
                        <div class="right-text col-lg-8 col-md-12 col-sm-12 m-auto mobile-bottom-fix">
                            <div class="left-heading">
                                <h3>Jenis Dokumen LPM UNWIRA</h3>
                            </div>
                            <div class="row">
                                <!-- Alert Start -->
                                    <div class="col-md-12">
                                        <?php if(isset($_SESSION['section'])){if($_SESSION['section']==5){if(isset($message_success)){echo$message_success;}if(isset($message_danger)){echo$message_danger;}if(isset($message_warning)){echo$message_warning;}if(isset($message_info)){echo$message_info;}if(isset($message_dark)){echo$message_dark;}}}?>
                                    </div>
                                <!-- Alert End -->

                                <!-- Add Jenis Dokumen Start -->
                                        <div class="card card-body shadow border-0 mt-3">
                                            <div class="div">
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambahjenisDokumen">Tambah Jenis Dokumen</button>
                                                <div class="modal fade" id="tambahjenisDokumen" tabindex="-1" role="dialog" aria-labelledby="tambahjenisDokumen" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="tambahjenisDokumen">Tambah Jenis Dokumen</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="" method="POST">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <input type="text" name="document" placeholder="Nama Dokumen" class="form-control">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <select name="id-access" class="form-control" required>
                                                                            <option>Pilih Akses</option>
                                                                            <?php foreach($lpm_doc_access as $rowAccess):?>
                                                                            <option value="<?= $rowAccess['id_access']?>"><?= $rowAccess['access']?></option>
                                                                            <?php endforeach;?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light btn-sm shadow" data-dismiss="modal">Close</button>
                                                                    <button type="submit" name="add-jenis-doc" class="btn btn-info btn-sm shadow">Save</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="overflow-auto">
                                                <table class="table table-sm text-center mt-2">
                                                    <thead>
                                                        <tr style="border-top: hidden;">
                                                            <th scope="col">#</th>
                                                            <th scope="col">Nama</th>
                                                            <th scope="col">Akses</th>
                                                            <?php if($_SESSION['id-access']==1){?>
                                                            <th colspan="1">Aksi</th>
                                                            <?php }?>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no=1; if(mysqli_num_rows($lpm_doc)==0){?>
                                                        <tr>
                                                            <th colspan="8">Belum ada jenis dokumen yang dimasukan.</th>
                                                        </tr>
                                                        <?php }if(mysqli_num_rows($lpm_doc)>0){while($rowDoc=mysqli_fetch_assoc($lpm_doc)){?>
                                                        <tr>
                                                            <th scope="row"><?= $no;?></th>
                                                            <td><?= $rowDoc['documen']?></td>
                                                            <td><?= $rowDoc['access']?></td>
                                                            <?php if($_SESSION['id-access']==1){?>
                                                            <td><form action="" method="POST">
                                                                <input type="hidden" name="id-doc" value="<?= $rowDoc['id_doc']?>">
                                                                <input type="hidden" name="old-doc" value="<?= $rowDoc['documen']?>">
                                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#jenisdoc<?= $rowDoc['id_doc']?>"><i class="fas fa-trash"></i> Hapus</button>
                                                                <div class="modal fade" id="jenisdoc<?= $rowDoc['id_doc']?>" tabindex="-1" role="dialog" aria-labelledby="jenisdoc<?= $rowDoc['id_doc']?>Label" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                Anda yakin ingin menghapus direktori <?= $rowDoc['documen']?>? Jika anda menghapusnya maka file yang berada di dalam direktori tersebut akan hilang. Jika ingin maka tekan Yes dan jika tidak tekan No.
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-light btn-sm shadow" data-dismiss="modal">No</button>
                                                                                <button type="submit" name="hapus-jenis-doc" class="btn btn-info btn-sm shadow">Yes</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form></td>
                                                            <?php }?>
                                                        </tr>
                                                        <?php $no++; }}?>
                                                    </tbody>
                                                </table>
                                                <nav class="small" aria-label="Page navigation example">
                                                    <ul class="pagination justify-content-center">
                                                        <?php if(isset($page2)){if(isset($total_page2)){if($page2>1):?>
                                                        <li class="page-item shadow">
                                                            <a class="page-link border-0" href="./?page=<?= $page2-1;?>" tabindex="-1" aria-disabled="true">Previous</a>
                                                        </li>
                                                        <?php endif;?>
                                                        <?php for($i=1; $i<=$total_page2; $i++):?>
                                                            <?php if($i<=5):?>
                                                                <?php if($i==$page2):?>
                                                                    <li class="page-item shadow"><a class="page-link font-weight-bold border-0" href="./?page=<?= $i;?>"><?= $i;?></a></li>
                                                                <?php else :?>
                                                                    <li class="page-item shadow"><a class="page-link border-0" href="./?page=<?= $i;?>"><?= $i;?></a></li>
                                                                <?php endif;?>
                                                            <?php endif;?>
                                                        <?php endfor;?>
                                                        <?php if($page2<$total_page2):?>
                                                        <li class="page-item shadow">
                                                            <a class="page-link border-0" href="./?page=<?= $page2+1;?>">Next</a>
                                                        </li>
                                                        <?php endif;}}?>
                                                    </ul>
                                                </nav>
                                            </div>
                                        </div>
                                    <!-- <div class="col-lg-12">
                                    </div> -->
                                <!-- Add Jenis Dokumen Start -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <!-- ***** Data jenis Doc End ***** -->

        <!-- ***** Data Prodi/Unit Start ***** -->
            <section class="section" id="prodi-unit">
                <div class="container" style="margin-top: 150px">
                    <div class="row">
                        <div class="left-text col-lg-6 col-md-12 col-sm-12 m-auto mobile-bottom-fix">
                            <div class="left-heading">
                                <h3>Prodi/Unit LPM UNWIRA</h3>
                            </div>
                            <div class="row">
                                <!-- Alert Start -->
                                    <div class="col-md-12">
                                        <?php if(isset($_SESSION['section'])){if($_SESSION['section']==4){if(isset($message_success)){echo$message_success;}if(isset($message_danger)){echo$message_danger;}if(isset($message_warning)){echo$message_warning;}if(isset($message_info)){echo$message_info;}if(isset($message_dark)){echo$message_dark;}}}?>
                                    </div>
                                <!-- Alert End -->

                                <!-- Add Prodi/Unit Start -->
                                    <div class="col-lg-6">
                                        <div class="card card-body shadow border-0 mt-3">
                                            <img src="https://i.ibb.co/xLkWWNg/plus.png" style="width: 100px" class="m-auto" alt="Add Document">
                                            <button type="button" class="btn btn-info btn-sm mt-3" data-toggle="modal" data-target="#exampleModal">Tambah Prodi/Unit</button>
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Tambahkan Program Studi atau Unit.</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="" method="POST">
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <input type="text" name="prodi-unit" class="form-control" placeholder="Nama Prodi/Unit" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <select name="id-fakultas" class="form-control" required>
                                                                        <option>Pilih Fakultas/Unit</option>
                                                                        <?php foreach($selectFakultas as $rowFak):?>
                                                                        <option value="<?= $rowFak['id_fakultas']?>"><?= $rowFak['fakultas']?></option>
                                                                        <?php endforeach;?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Close</button>
                                                                <button type="submit" name="save-prodi-unit" class="btn btn-info btn-sm">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- Add Prodi/Unit Start -->

                                <!-- Data Prodi/Unit Start -->
                                    <div class="col-lg-6">
                                        <div class="card card-body shadow border-0 mt-3">
                                            <img src="https://i.ibb.co/CVXZPx3/id-card.png" style="width: 100px" class="m-auto" alt="Add Document">
                                            <button type="button" class="btn btn-info btn-sm mt-3" data-toggle="modal" data-target=".prodi-unit">View Prodi/Unit</button>
                                            <div class="modal fade prodi-unit bg-light" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl shadow">
                                                    <div class="modal-content" style="overflow-x: auto">
                                                        <h4 class="text-center mt-4">Daftar Program Studi atau Unit yang terdata.</h4>
                                                        <table class="table table-sm small text-center">
                                                            <thead>
                                                                <tr style="border-top: hidden">
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">Prodi/Unit</th>
                                                                    <th scope="col">Fakultas/Unit</th>
                                                                    <?php if($_SESSION['id-access']==1){?>
                                                                    <th colspan="1">Aksi</th>
                                                                    <?php }?>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $no=1; if(mysqli_num_rows($prodiUnit)==0){?>
                                                                <tr>
                                                                    <th colspan="4">Belum ada data Prodi/Unit.</th>
                                                                </tr>
                                                                <?php }else if(mysqli_num_rows($prodiUnit)>0){while($rowProdi=mysqli_fetch_assoc($prodiUnit)){?>
                                                                <tr>
                                                                    <th scope="row"><?= $no;?></th>
                                                                    <td><?= $rowProdi['prodi']?></td>
                                                                    <td><?= $rowProdi['fakultas']?></td>
                                                                    <?php if($_SESSION['id-access']==1){?>
                                                                    <td><form action="" method="POST">
                                                                        <input type="hidden" name="id-prodi" value="<?= $rowProdi['id_prodi']?>">
                                                                        <button type="submit" name="hapus-prodi" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                                                    </form></td>
                                                                    <?php }?>
                                                                </tr>
                                                                <?php $no++; }}?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- Data Prodi/Unit End -->
                            </div>
                        </div>
                        <div class="right-image col-lg-6 col-md-12 col-sm-12 mobile-bottom-fix-big" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                            <img src="https://i.ibb.co/ZSYZKZH/5251.png" class="rounded img-fluid d-block mx-auto" alt="App">
                        </div>
                    </div>
                </div>
            </section>
        <!-- ***** Data prodi/unit End ***** -->

        <!-- ***** Data Users Start ***** -->
            <section class="section" id="users">
                <div class="container" style="margin-top: 150px">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-sm-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                            <img src="https://i.ibb.co/wQkqPdz/users-sharing.png" class="rounded img-fluid d-block mx-auto" alt="App">
                        </div>
                        <div class="right-text col-lg-8 col-md-12 col-sm-12 mobile-top-fix">
                            <div class="left-heading">
                                <h3>Ingin berbagi dokumen dengan Pengguna lain? Ubah data Pengguna kamu ke Dosen Prodi/Pegawai Unit</h3>
                            </div>
                            <div class="left-text mt-3">
                                <?php if(isset($_SESSION['section'])){if($_SESSION['section']==2){if(isset($message_success)){echo$message_success;}if(isset($message_danger)){echo$message_danger;}if(isset($message_warning)){echo$message_warning;}if(isset($message_info)){echo$message_info;}if(isset($message_dark)){echo$message_dark;}}}?>
                                <div class="card card-body shadow border-0 overflow-auto">
                                    <form action="" method="POST" class="form-inline my-2 my-lg-0">
                                        <input name="keyword-nidn" class="form-control form-control-sm mr-sm-2" type="search" placeholder="Cari NIDN" aria-label="Search">
                                        <button name="search-users" class="btn btn-outline-primary btn-sm my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                                    </form>
                                    <table class="table table-sm text-center">
                                        <thead>
                                            <tr style="border-top: hidden;">
                                                <th scope="col">#</th>
                                                <th scope="col">NIDN</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Prodi/Fakultas</th>
                                                <th scope="col">Role</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Akses Aksi</th>
                                                <?php if($_SESSION['id-access']==1){?>
                                                <th colspan="1">Aksi</th>
                                                <?php }?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; if(mysqli_num_rows($viewUsers)==0){?>
                                            <tr>
                                                <th colspan="8">Belum ada pengguna yang terdaftar.</th>
                                            </tr>
                                            <?php }if(mysqli_num_rows($viewUsers)>0){while($rowUsers=mysqli_fetch_assoc($viewUsers)){?>
                                            <tr>
                                                <th scope="row"><?= $no;?></th>
                                                <td><?= $rowUsers['nidn']?></td>
                                                <td>
                                                    <button type="button" class="btn btn-link btn-sm" data-toggle="modal" data-target="#dataUser<?= $rowUsers['nidn']?>"><?= $rowUsers['username']?></button>
                                                    <div class="modal fade" id="dataUser<?= $rowUsers['nidn']?>" tabindex="-1" role="dialog" aria-labelledby="dataUser<?= $rowUsers['nidn']?>Title" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-body text-center mb-n3">
                                                                    <img src="Assets/img/<?= $rowUsers['img']?>" alt="Foto Profil <?= $rowUsers['username']?>" style="width: 150px">
                                                                    <p class="mt-3">Email: <?= $rowUsers['email']?></p>
                                                                    <p>Tgl Buat: <?= $rowUsers['date_created']?></p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light btn-sm shadow" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-link btn-sm" data-toggle="modal" data-target="#dataJurusan<?= $rowUsers['nidn']?>"><?= $rowUsers['prodi']?>/<?= $rowUsers['fakultas']?></button>
                                                    <div class="modal fade" id="dataJurusan<?= $rowUsers['nidn']?>" tabindex="-1" role="dialog" aria-labelledby="dataJurusan<?= $rowUsers['nidn']?>Title" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <form action="" method="POST">
                                                                    <input type="hidden" name="nidn" value="<?= $rowUsers['nidn']?>">
                                                                    <div class="modal-body">
                                                                        <h6 class="font-weight-bold mb-3">Ubah Prodi/Fakultas</h6>
                                                                        <div class="form-group">
                                                                            <select name="id-prodi" class="form-control">
                                                                                <option value="0">Pilih Program Studi</option>
                                                                                <?php foreach($selectProdi as $rowProdi):?>
                                                                                <option value="<?= $rowProdi['id_prodi']?>"><?= $rowProdi['prodi']?></option>
                                                                                <?php endforeach;?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-light btn-sm shadow" data-dismiss="modal">Close</button>
                                                                        <button type="submit" name="ubah-prodi" class="btn btn-info btn-sm">Save</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-link btn-sm" data-toggle="modal" data-target="#dataRole<?= $rowUsers['nidn']?>"><?= $rowUsers['role']?></button>
                                                    <div class="modal fade" id="dataRole<?= $rowUsers['nidn']?>" tabindex="-1" role="dialog" aria-labelledby="dataRole<?= $rowUsers['nidn']?>Title" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <form action="" method="POST">
                                                                    <input type="hidden" name="nidn" value="<?= $rowUsers['nidn']?>">
                                                                    <div class="modal-body">
                                                                        <h6 class="font-weight-bold mb-3">Role</h6>
                                                                        <div class="form-group">
                                                                            <select name="id-role" class="form-control">
                                                                                <option value="0">Pilih Role</option>
                                                                                <?php foreach($selectRole as $rowRole):?>
                                                                                <option value="<?= $rowRole['id_role']?>"><?= $rowRole['role']?></option>
                                                                                <?php endforeach;?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-light btn-sm shadow" data-dismiss="modal">Close</button>
                                                                        <button type="submit" name="ubah-role" class="btn btn-info btn-sm">Save</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-link btn-sm" data-toggle="modal" data-target="#dataStatus<?= $rowUsers['nidn']?>"><?= $rowUsers['active']?></button>
                                                    <div class="modal fade" id="dataStatus<?= $rowUsers['nidn']?>" tabindex="-1" role="dialog" aria-labelledby="dataStatus<?= $rowUsers['nidn']?>Title" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <form action="" method="POST">
                                                                    <input type="hidden" name="nidn" value="<?= $rowUsers['nidn']?>">
                                                                    <div class="modal-body">
                                                                        <h6 class="font-weight-bold mb-3">Status</h6>
                                                                        <div class="form-group">
                                                                            <select name="id-active" class="form-control">
                                                                                <option value="0">Pilih Status</option>
                                                                                <?php foreach($selectStatus as $rowStatus):?>
                                                                                <option value="<?= $rowStatus['id_active']?>"><?= $rowStatus['active']?></option>
                                                                                <?php endforeach;?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-light btn-sm shadow" data-dismiss="modal">Close</button>
                                                                        <button type="submit" name="ubah-status" class="btn btn-info btn-sm">Save</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-link btn-sm" data-toggle="modal" data-target="#dataAccess<?= $rowUsers['nidn']?>"><?= $rowUsers['access']?></button>
                                                    <div class="modal fade" id="dataAccess<?= $rowUsers['nidn']?>" tabindex="-1" role="dialog" aria-labelledby="dataAccess<?= $rowUsers['nidn']?>Title" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <form action="" method="POST">
                                                                    <input type="hidden" name="nidn" value="<?= $rowUsers['nidn']?>">
                                                                    <div class="modal-body">
                                                                        <h6 class="font-weight-bold mb-3">Akses aksi</h6>
                                                                        <div class="form-group">
                                                                            <select name="id-access" class="form-control">
                                                                                <option value="0">Pilih Akses</option>
                                                                                <?php foreach($selectAccess as $rowAccess):?>
                                                                                <option value="<?= $rowAccess['id_access']?>"><?= $rowAccess['access']?></option>
                                                                                <?php endforeach;?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-light btn-sm shadow" data-dismiss="modal">Close</button>
                                                                        <button type="submit" name="ubah-access" class="btn btn-info btn-sm">Save</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <?php if($_SESSION['id-access']==1){?>
                                                <td><form action="" method="POST">
                                                    <input type="hidden" name="id-user" value="<?= $rowUsers['id_user']?>">
                                                    <button type="submit" name="hapus-user" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                                                </form></td>
                                                <?php }?>
                                            </tr>
                                            <?php $no++; }}?>
                                        </tbody>
                                    </table>
                                    <nav class="small" aria-label="Page navigation example">
                                        <ul class="pagination justify-content-center">
                                            <?php if(isset($page1)){if(isset($total_page1)){if($page1>1):?>
                                            <li class="page-item shadow">
                                                <a class="page-link border-0" href="./?page=<?= $page1-1;?>" tabindex="-1" aria-disabled="true">Previous</a>
                                            </li>
                                            <?php endif;?>
                                            <?php for($i=1; $i<=$total_page1; $i++):?>
                                                <?php if($i<=5):?>
                                                    <?php if($i==$page1):?>
                                                        <li class="page-item shadow"><a class="page-link font-weight-bold border-0" href="./?page=<?= $i;?>"><?= $i;?></a></li>
                                                    <?php else :?>
                                                        <li class="page-item shadow"><a class="page-link border-0" href="./?page=<?= $i;?>"><?= $i;?></a></li>
                                                    <?php endif;?>
                                                <?php endif;?>
                                            <?php endfor;?>
                                            <?php if($page1<$total_page1):?>
                                            <li class="page-item shadow">
                                                <a class="page-link border-0" href="./?page=<?= $page1+1;?>">Next</a>
                                            </li>
                                            <?php endif;}}?>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <!-- ***** Data Users End ***** -->

        <!-- ***** Data Document Item Start ***** -->
            <section class="section" id="document">
                <div class="container" style="margin-top: 150px">
                    <div class="row">
                        <div class="left-text col-lg-6 col-md-12 col-sm-12 m-auto mobile-bottom-fix">
                            <div class="left-heading">
                                <h3>Document LPM UNWIRA</h3>
                            </div>
                            <div class="row">
                                <!-- Alert Start -->
                                    <div class="col-md-12">
                                        <?php if(isset($_SESSION['section'])){if($_SESSION['section']==3){if(isset($message_success)){echo$message_success;}if(isset($message_danger)){echo$message_danger;}if(isset($message_warning)){echo$message_warning;}if(isset($message_info)){echo$message_info;}if(isset($message_dark)){echo$message_dark;}}}?>
                                    </div>
                                <!-- Alert End -->

                                <!-- Document Non prodi Start -->
                                    <div class="col-lg-6">
                                        <div class="card card-body shadow border-0 mt-3">
                                            <img src="https://i.ibb.co/HPLDy5M/file-non-prodi.png" class="m-auto" alt="File Non Prodi" style="width: 100px">
                                            <button type="button" class="btn btn-info btn-sm shadow mt-3" data-toggle="modal" data-target=".non-prodi">Non prodi</button>
                                            <div class="modal fade bd-example-modal-xl non-prodi bg-light" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content shadow border-0 p-3 overflow-auto">
                                                        <table class="table table-sm text-center">
                                                            <thead>
                                                                <tr style="border-top: hidden">
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">Tgl Buat</th>
                                                                    <th scope="col">Pengirim</th>
                                                                    <th scope="col">Jenis Dokumen</th>
                                                                    <th scope="col">Nama</th>
                                                                    <th colspan="3">Aksi</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $no=1; if(mysqli_num_rows($viewDocument1)==0){?>
                                                                <tr>
                                                                    <th colspan="8">Belum ada document yg dimasukan.</th>
                                                                </tr>
                                                                <?php }else if(mysqli_num_rows($viewDocument1)>0){while($rowDoc=mysqli_fetch_assoc($viewDocument1)){?>
                                                                <tr>
                                                                    <th scope="row"><?= $no;?></th>
                                                                    <td><?= $rowDoc['date_created']?></td>
                                                                    <td><?= $rowDoc['username']?></td>
                                                                    <td><?= $rowDoc['documen']?></td>
                                                                    <td><?= $rowDoc['data_doc']?></td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#viewDoc-NProdi<?= $rowDoc['id_data2']?>"><i class="fas fa-eye"></i> Lihat</button>
                                                                        <div class="modal fade" id="viewDoc-NProdi<?= $rowDoc['id_data2']?>" tabindex="-1" role="dialog" aria-labelledby="viewDoc-NProdi<?= $rowDoc['id_data2']?>Label" aria-hidden="true">
                                                                            <div class="modal-dialog modal-xl" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-body"><?php 
                                                                                        $ekstensiDokumen=['xls','pdf','ppt','doc','docx'];
                                                                                        $ekstensiGambar=explode('.',$rowDoc['data_doc']);
                                                                                        $ekstensiGambar=strtolower(end($ekstensiGambar));
                                                                                        if(in_array($ekstensiGambar,$ekstensiDokumen)){
                                                                                            echo "<embed src='Assets/document/".$rowDoc['documen']."/".$rowDoc['data_doc']."' width='800px' height='2100px' />";
                                                                                        }
                                                                                    ?></div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-light btn-sm shadow" data-dismiss="modal">Close</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td><form action="" method="POST">
                                                                        <input type="hidden" name="data-doc" value="<?= $rowDoc['data_doc']?>">
                                                                        <input type="hidden" name="documen" value="<?= $rowDoc['documen']?>">
                                                                        <button type="submit" name="unduh-Doc" class="btn btn-info btn-sm"><i class="fas fa-download"></i> Unduh</button>
                                                                    </form></td>
                                                                    <td>
                                                                        <form action="" method="POST">
                                                                            <input type="hidden" name="id-data2" value="<?= $rowDoc['id_data2']?>">
                                                                            <input type="hidden" name="data-doc" value="<?= $rowDoc['data_doc']?>">
                                                                            <input type="hidden" name="id-doc" value="<?= $rowDoc['id_doc']?>">
                                                                            <button type="submit" name="delete-docNon-prodi" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                                <?php $no++; }}?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- Document Non Prodi End -->

                                <!-- Document Prodi start -->
                                    <div class="col-lg-6">
                                        <div class="card card-body shadow border-0 mt-3 mb-5">
                                            <img src="https://i.ibb.co/WyqpRYt/file-prodi.png" class="m-auto" alt="File Prodi" style="width: 100px">
                                            <button type="button" class="btn btn-info btn-sm shadow mt-3" data-toggle="modal" data-target=".prodi">Prodi</button>
                                            <div class="modal fade bd-example-modal-xl prodi bg-light" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content shadow border-0 p-3 overflow-auto">
                                                        <table class="table table-sm text-center">
                                                            <thead>
                                                                <tr style="border-top: hidden">
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">Tgl Buat</th>
                                                                    <th scope="col">Pengirim</th>
                                                                    <th scope="col">Jenis Dokumen</th>
                                                                    <th scope="col">Nama</th>
                                                                    <th scope="col">Prodi/Fakultas</th>
                                                                    <th colspan="3">Aksi</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $no=1; if(mysqli_num_rows($viewDocument2)==0){?>
                                                                <tr>
                                                                    <th colspan="8">Belum ada document yg dimasukan.</th>
                                                                </tr>
                                                                <?php }else if(mysqli_num_rows($viewDocument2)>0){while($rowDoc=mysqli_fetch_assoc($viewDocument2)){?>
                                                                <tr>
                                                                    <th scope="row"><?= $no;?></th>
                                                                    <td><?= $rowDoc['date_created']?></td>
                                                                    <td><?= $rowDoc['username']?></td>
                                                                    <td><?= $rowDoc['documen']?></td>
                                                                    <td><?= $rowDoc['data_doc']?></td>
                                                                    <td><?= $rowDoc['prodi']?>/<?= $rowDoc['fakultas']?></td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#viewDoc-Prodi<?= $rowDoc['id_data1']?>"><i class="fas fa-eye"></i> Lihat</button>
                                                                        <div class="modal fade" id="viewDoc-Prodi<?= $rowDoc['id_data1']?>" tabindex="-1" role="dialog" aria-labelledby="viewDoc-Prodi<?= $rowDoc['id_data1']?>Label" aria-hidden="true">
                                                                            <div class="modal-dialog modal-xl" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-body"><?php 
                                                                                        $ekstensiDokumen=['xls','pdf','ppt','doc','docx'];
                                                                                        $ekstensiGambar=explode('.',$rowDoc['data_doc']);
                                                                                        $ekstensiGambar=strtolower(end($ekstensiGambar));
                                                                                        if(in_array($ekstensiGambar,$ekstensiDokumen)){
                                                                                            echo "<embed src='Assets/document/".$rowDoc['documen']."/".$rowDoc['data_doc']."' width='800px' height='2100px' />";
                                                                                        }
                                                                                    ?></div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-light btn-sm shadow" data-dismiss="modal">Close</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td><form action="" method="POST">
                                                                        <input type="hidden" name="data-doc" value="<?= $rowDoc['data_doc']?>">
                                                                        <input type="hidden" name="documen" value="<?= $rowDoc['documen']?>">
                                                                        <button type="submit" name="unduh-Doc" class="btn btn-info btn-sm"><i class="fas fa-download"></i> Unduh</button>
                                                                    </form></td>
                                                                    <td>
                                                                        <form action="" method="POST">
                                                                            <input type="hidden" name="id-data1" value="<?= $rowDoc['id_data1']?>">
                                                                            <input type="hidden" name="data-doc" value="<?= $rowDoc['data_doc']?>">
                                                                            <input type="hidden" name="id-doc" value="<?= $rowDoc['id_doc']?>">
                                                                            <button type="submit" name="delete-docProdi" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                                <?php $no++; }}?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- Document Prodi End -->
                            </div>
                        </div>
                        <div class="right-image col-lg-6 col-md-12 col-sm-12 mobile-bottom-fix-big" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                            <img src="https://i.ibb.co/3pbBxq2/document.png" class="rounded img-fluid d-block mx-auto" alt="App">
                        </div>
                    </div>
                </div>
            </section>
        <!-- ***** Data Document Item End ***** -->
        <?php }}?>

        <?php require_once("Application/access/footer.php");?>

    </body>
</html>