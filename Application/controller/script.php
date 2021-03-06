<?php if(!isset($_SESSION)){session_start();}
    require_once("connect.php"); require_once("functions.php");
// ==> Alert
    if (isset($_SESSION['message-success'])) {
        $message_success = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                " . $_SESSION['message-success'] . "
                    <form action='' method='POST'>
                        <button type='submit' name='message-success' class='close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </form> 
                </div>";
    }
    if (isset($_SESSION['message-warning'])) {
        $message_warning = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                " . $_SESSION['message-warning'] . "
                    <form action='' method='POST'>
                        <button type='submit' name='message-warning' class='close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </form>
                </div>";
    }
    if (isset($_SESSION['message-danger'])) {
        $message_danger = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                " . $_SESSION['message-danger'] . "
                    <form action='' method='POST'>
                        <button type='submit' name='message-danger' class='close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </form>
                </div>";
    }
    if (isset($_SESSION['message-info'])) {
        $message_info = "<div class='alert alert-info alert-dismissible fade show' role='alert'>
                " . $_SESSION['message-info'] . "
                    <form action='' method='POST'>
                        <button type='submit' name='message-info' class='close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </form>
                </div>";
    }
    if (isset($_SESSION['message-dark'])) {
        $message_dark = "<div class='alert alert-dark alert-dismissible fade show' role='alert'>
                " . $_SESSION['message-dark'] . "
                    <form action='' method='POST'>
                        <button type='submit' name='message-dark' class='close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </form>
                </div>";
    }
    if (isset($_POST['message-success'])) {
        unset($_SESSION['section']);
        unset($_SESSION['message-success']);
        header("Location: ".$_SESSION['page']);exit;
    }
    if (isset($_POST['message-warning'])) {
        unset($_SESSION['section']);
        unset($_SESSION['message-warning']);
        header("Location: ".$_SESSION['page']);exit;
    }
    if (isset($_POST['message-danger'])) {
        unset($_SESSION['section']);
        unset($_SESSION['message-danger']);
        header("Location: ".$_SESSION['page']);exit;
    }
    if (isset($_POST['message-info'])) {
        unset($_SESSION['section']);
        unset($_SESSION['message-info']);
        header("Location: ".$_SESSION['page']);exit;
    }
    if (isset($_POST['message-dark'])) {
        unset($_SESSION['section']);
        unset($_SESSION['message-dark']);
        header("Location: ".$_SESSION['page']);exit;
    }
if(!isset($_SESSION['id-user'])){
    if(isset($_POST['login'])){
        if(login($_POST)>0){
            header("Location: ../"); exit;
        }
    }
    if(isset($_POST['registration'])){
        if(registration($_POST)>0){
            $_SESSION['message-success']="Akun anda berhasil terdaftar, silakan masuk untuk melanjutkan.";
            header("Location: login"); exit;
        }
    }
    $select_prodi=mysqli_query($conn_v1, "SELECT * FROM prodi");
}else if($_SESSION['id-user']){
    if($_SESSION['id-role']<=2){
        $data1=15;
        $result1=mysqli_query($conn_v1, "SELECT * FROM users");
        $total1=mysqli_num_rows($result1);
        $total_page1=ceil($total1/$data1);
        $page1=(isset($_GET['page']))?$_GET['page']:1;
        $awal_data1=($data1*$page1)-$data1;
        $viewUsers=mysqli_query($conn_v1, "SELECT * FROM users JOIN users_role ON users.id_role=users_role.id_role JOIN users_active ON users.id_active=users_active.id_active JOIN users_access ON users.id_access=users_access.id_access JOIN prodi ON users.id_prodi=prodi.id_prodi JOIN fakultas ON prodi.id_fakultas=fakultas.id_fakultas WHERE users.id_role>1 LIMIT $awal_data1, $data1");
        if(isset($_POST['search-users'])){
            $keyword=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $_POST['keyword-nidn']))));
            $viewUsers=mysqli_query($conn_v1, "SELECT * FROM users JOIN users_role ON users.id_role=users_role.id_role JOIN users_active ON users.id_active=users_active.id_active JOIN users_access ON users.id_access=users_access.id_access JOIN prodi ON users.id_prodi=prodi.id_prodi JOIN fakultas ON prodi.id_fakultas=fakultas.id_fakultas WHERE users.id_role>1 AND users.nidn LIKE '%$keyword%'");
        }
        if(isset($_POST['ubah-prodi'])){
            if(editProdi_user($_POST)>0){
                $_SESSION['section']=2;
                $_SESSION['message-success']="Program Studi pengguna berhasil diubah.";
                header("Location: ./#users"); exit;
            }
        }
        $selectRole=mysqli_query($conn_v1, "SELECT * FROM users_role");
        if(isset($_POST['ubah-role'])){
            if(editRole_user($_POST)>0){
                $_SESSION['section']=2;
                $_SESSION['message-success']="Role pengguna berhasil diubah.";
                header("Location: ./#users"); exit;
            }
        }
        $selectStatus=mysqli_query($conn_v1, "SELECT * FROM users_active");
        if(isset($_POST['ubah-status'])){
            if(editStatus_user($_POST)>0){
                $_SESSION['section']=2;
                $_SESSION['message-success']="Status pengguna berhasil diubah.";
                header("Location: ./#users"); exit;
            }
        }
        $selectAccess=mysqli_query($conn_v1, "SELECT * FROM users_access");
        if(isset($_POST['ubah-access'])){
            if(editAccess_user($_POST)>0){
                $_SESSION['section']=2;
                $_SESSION['message-success']="Akses aksi pengguna berhasil diubah.";
                header("Location: ./#users"); exit;
            }
        }
        if(isset($_POST['hapus-user'])){
            if(deleteUser($_POST)>0){
                $_SESSION['section']=2;
                $_SESSION['message-success']="Akun pengguna berhasil hapus.";
                header("Location: ./#users"); exit;
            }
        }
        $selectFakultas=mysqli_query($conn_v1, "SELECT * FROM fakultas");
        $prodiUnit=mysqli_query($conn_v1, "SELECT * FROM prodi JOIN fakultas ON prodi.id_fakultas=fakultas.id_fakultas");
        if(isset($_POST['save-prodi-unit'])){
            if(add_prodiUnit($_POST)>0){
                $_SESSION['section']=4;
                $_SESSION['message-success'] = "Telah berhasil menambahkan Prodi/Unit baru.";
                header("Location: ./#prodi-unit");
            }
        }
        if(isset($_POST['hapus-prodi'])){
            if(deleteProdiUnit($_POST)>0){
                $_SESSION['section']=4;
                $_SESSION['message-success'] = "Data Prodi/Unit yang kamu pilih telah dihapus.";
                header("Location: ./#prodi-unit");
            }
        }
        $viewDocument1=mysqli_query($conn_v1, "SELECT * FROM lpm_data2_doc JOIN lpm_doc ON lpm_data2_doc.id_doc=lpm_doc.id_doc JOIN users ON lpm_data2_doc.id_user=users.id_user");
        $viewDocument2=mysqli_query($conn_v1, "SELECT * FROM lpm_data1_doc JOIN lpm_doc ON lpm_data1_doc.id_doc=lpm_doc.id_doc JOIN prodi ON lpm_data1_doc.id_prodi=prodi.id_prodi JOIN fakultas ON prodi.id_fakultas=fakultas.id_fakultas JOIN users ON lpm_data1_doc.id_user=users.id_user");
        if(isset($_POST['unduh-Doc'])){
            $filename=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $_POST['data-doc']))));
            $documen=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $_POST['documen']))));
            $back_dir ="Assets/document/$documen/";
            $file = $back_dir.$filename;
            if (file_exists($file)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename='.basename($file));
                header('Content-Transfer-Encoding: binary');
                header('Expires: 0');
                header('Cache-Control: private');
                header('Pragma: private');
                header('Content-Length: ' . filesize($file));
                ob_clean();
                flush();
                readfile($file);
                exit;
            } 
            else {
                $_SESSION['section']=3;
                $_SESSION['message-danger'] = "Oops! File - $filename - tidak ditemukan...";
                header("Location: ./#document");
            }
        }
        if(isset($_POST['delete-docNon-prodi'])){
            if(deleteDoc_nonProdi($_POST)>0){
                $_SESSION['section']=3;
                $_SESSION['message-success'] = "Dokumen berhasil dihapus :(";
                header("Location: ./#document");
            }
        }
        if(isset($_POST['delete-docProdi'])){
            if(deleteDoc_Prodi($_POST)>0){
                $_SESSION['section']=3;
                $_SESSION['message-success'] = "Dokumen berhasil dihapus :(";
                header("Location: ./#document");
            }
        }
        $lpm_doc_access=mysqli_query($conn_v1, "SELECT * FROM lpm_doc_access");
        $data2=10;
        $result2=mysqli_query($conn_v1, "SELECT * FROM lpm_doc");
        $total2=mysqli_num_rows($result2);
        $total_page2=ceil($total2/$data2);
        $page2=(isset($_GET['page']))?$_GET['page']:1;
        $awal_data2=($data2*$page2)-$data2;
        $lpm_doc=mysqli_query($conn_v1, "SELECT * FROM lpm_doc JOIN lpm_doc_access ON lpm_doc.id_access=lpm_doc_access.id_access LIMIT $awal_data2, $data2");
        if(isset($_POST['add-jenis-doc'])){
            if(add_jenis_doc($_POST)>0){
                $_SESSION['section']=5;
                $_SESSION['message-success'] = "Jenis dokumen telah ditambahkan!";
                header("Location: ./#jenis-doc");
            }
        }
        if(isset($_POST['hapus-jenis-doc'])){
            if(delete_jenis_doc($_POST)>0){
                $_SESSION['section']=5;
                $_SESSION['message-success'] = "Jenis dokumen yang kamu pilih telah dihapus!";
                header("Location: ./#jenis-doc");
            }
        }
        if(isset($_POST['upload-schedule'])){
            if(schedule($_POST)>0){
                header("Location: ./");
            }
        }
        if(isset($_POST['del-schedule'])){
            if(del_schedule($_POST)>0){
                header("Location: ./");
            }
        }
    }
    if($_SESSION['id-role']<=3){
        $selectDoc=mysqli_query($conn_v1, "SELECT * FROM lpm_doc");
        $selectProdi=mysqli_query($conn_v1, "SELECT * FROM prodi");
        if(isset($_POST['lpm-data1-doc'])){
            if(data1_lpm($_POST)>0){
                $_SESSION['section']=1;
                $_SESSION['message-success']="Dokumen berhasil di upload.";
                header("Location: ./#page-top"); exit;
            }
        }
        $dataLPM2=mysqli_query($conn_v1, "SELECT * FROM lpm_data2_doc JOIN lpm_doc ON lpm_data2_doc.id_doc=lpm_doc.id_doc ORDER BY id_data2 DESC");
        if(isset($_POST['unduh-DocNProdi'])){
            $filename=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $_POST['data-doc']))));
            $documen=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $_POST['documen']))));
            $back_dir ="Assets/document/$documen/";
            $file = $back_dir.$filename;
            if (file_exists($file)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename='.basename($file));
                header('Content-Transfer-Encoding: binary');
                header('Expires: 0');
                header('Cache-Control: private');
                header('Pragma: private');
                header('Content-Length: ' . filesize($file));
                ob_clean();
                flush();
                readfile($file);   
                exit;
            } 
            else {
                $_SESSION['section']=1;
                $_SESSION['message-danger'] = "Oops! File - $filename - tidak ditemukan...";
                header("Location: ./#page-top");
            }
        }
        $dataLPM1=mysqli_query($conn_v1, "SELECT * FROM lpm_data1_doc JOIN lpm_doc ON lpm_data1_doc.id_doc=lpm_doc.id_doc ORDER BY id_data1 DESC");
        if(isset($_POST['unduh-DocProdi'])){
            $filename=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $_POST['data-doc']))));
            $documen=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $_POST['documen']))));
            $back_dir ="Assets/document/$documen/";
            $file = $back_dir.$filename;
            if (file_exists($file)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename='.basename($file));
                header('Content-Transfer-Encoding: binary');
                header('Expires: 0');
                header('Cache-Control: private');
                header('Pragma: private');
                header('Content-Length: ' . filesize($file));
                ob_clean();
                flush();
                readfile($file);   
                exit;
            } 
            else {
                $_SESSION['section']=1;
                $_SESSION['message-danger'] = "Oops! File - $filename - tidak ditemukan...";
                header("Location: ./#page-top");
            }
        }
        $countSchedule=mysqli_query($conn_v1, "SELECT * FROM schedule");
        $countSchedule_now=mysqli_num_rows($countSchedule);
        $viewSchedule=mysqli_query($conn_v1, "SELECT * FROM schedule");
    }
    if($_SESSION['id-role']<=4){
        $id_user=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $_SESSION['id-user']))));
        $id_prodi=addslashes(trim($_SESSION['id-prodi']));
        $viewProdi=mysqli_query($conn_v1, "SELECT * FROM prodi WHERE id_prodi='$id_prodi'");
        $rowVProdi=mysqli_fetch_assoc($viewProdi);
        $icon_profile=mysqli_query($conn_v1, "SELECT * FROM users WHERE id_user='$id_user'");
        $viewProfile=mysqli_query($conn_v1, "SELECT * FROM users JOIN users_role ON users.id_role=users_role.id_role JOIN prodi ON users.id_prodi=prodi.id_prodi WHERE id_user='$id_user'");
        $select_prodi=mysqli_query($conn_v1, "SELECT * FROM prodi");
        if(isset($_POST['save-biodata'])){
            if(save_biodata($_POST)>0){
                $_SESSION['message-success']="Biodata kamu berhasil diubah.";
                header("Location: profile"); exit;
            }
        }
        if(isset($_POST['save-profile'])){
            if(save_profile($_POST)>0){
                $_SESSION['message-success']="Profile kamu berhasil diubah.";
                header("Location: profile"); exit;
            }
        }
        if(isset($_POST['save-password'])){
            if(save_password($_POST)>0){
                $_SESSION['message-success']="Password kamu berhasil diubah.";
                header("Location: profile-settings"); exit;
            }
        }
    }
}