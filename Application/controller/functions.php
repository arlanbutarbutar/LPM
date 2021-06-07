<?php if(!isset($_SESSION)){session_start();}
$date=date("l, d M Y");
if(!isset($_SESSION['id-user'])){
    function login($data){global $conn_v1;
        $nidn_email=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['nidn-email']))));
        $password=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['password']))));
        $users=mysqli_query($conn_v1, "SELECT * FROM users WHERE nidn='$nidn_email' OR email='$nidn_email'");
        if(mysqli_num_rows($users)>0){
            while($row=mysqli_fetch_assoc($users)){
                $pass=$row['password'];
                $active=$row['id_active'];
                if($active==1){
                    if(password_verify($password, $pass)){
                        if(isset($_SESSION['message-danger'])||isset($_SESSION['message-success'])){unset($_SESSION['message-danger']);unset($_SESSION['message-success']);}
                        if(isset($_SESSION['auth'])){unset($_SESSION['auth']);}
                        $_SESSION['id-user']=$row['id_user'];
                        $_SESSION['id-role']=$row['id_role'];
                        $_SESSION['id-access']=$row['id_access'];
                        $_SESSION['id-prodi']=$row['id_prodi'];
                        $_SESSION['username']=$row['username'];
                    }else{
                        $_SESSION['message-danger']="Maaf, password yang kamu masukan salah. Silakan masukan ulang!";
                        header("Location: login");return false;
                    }
                }else if($active==2){
                    $_SESSION['message-danger']="Maaf, akun kamu belum diaktifkan oleh admin. Silakan hubungi admin untuk mempercepat proses aktifasi akun!";
                    header("Location: login"); return false;
                }
            }
        }else if(mysqli_num_rows($users)==0){
            $_SESSION['message-danger']="Maaf, akun kamu belum terdaftar di LPM UNWIRA!";
            header("Location: login");return false;
        }
        return mysqli_affected_rows($conn_v1);
    }
    function registration($data){global $conn_v1, $date;
        $id_prodi=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['id-prodi']))));
        if(empty($id_prodi) || $id_prodi==0){
            $_SESSION['message-danger']="Maaf, kamu belum memilih Progam Studi atau Unit!";
            header("Location: registration"); return false;
        }
        $nidn=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['nidn']))));
        $checkNIDN=mysqli_query($conn_v1, "SELECT * FROM users WHERE nidn='$nidn'");
        if(mysqli_num_rows($checkNIDN)>0){
            $_SESSION['message-danger']="Maaf, NIDN sudah terdaftar! Silakan coba lagi.";
            header("Location: registration"); return false;
        }
        $username=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['username']))));
        $email=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['email']))));
        $checkEmail=mysqli_query($conn_v1, "SELECT * FROM users WHERE email='$email'");
        if(mysqli_num_rows($checkEmail)>0){
            $_SESSION['message-danger']="Maaf, akun email yang kamu daftarkan sudah ada! Silakan masukan yang lain.";
            header("Location: registration"); return false;
        }
        $pass1=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['password1']))));
        $pass2=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['password2']))));
        if($pass1!=$pass2){
            $_SESSION['message-danger']="Maaf, kata sandi yang kamu masukan tidak sama!";
            header("Location: registration"); return false;
        }else{
            $check_lenght_pass=strlen($pass1);
            if($check_lenght_pass<8){
                $_SESSION['message-danger']="Maaf, password kamu terlalu pendek (Min: 8)!";
                header("Location: registration");return false;
            }
        }
        $password=password_hash($pass1, PASSWORD_DEFAULT);
        mysqli_query($conn_v1, "INSERT INTO users(id_prodi,nidn,username,email,password,date_created) VALUES('$id_prodi','$nidn','$username','$email','$password','$date')");
        return mysqli_affected_rows($conn_v1);
    }
    // function __($data){global $conn_1, $date;}
}
if(isset($_SESSION['id-user'])){
    $id_user=addslashes(trim($_SESSION['id-user']));
    if($_SESSION['id-role']<=2){
        function editProdi_user($data){global $conn_v1;
            $nidn=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['nidn']))));
            $id_prodi=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['id-prodi']))));
            if(empty($id_prodi) || $id_prodi==0){
                $_SESSION['section']=2;
                $_SESSION['message-danger']="Kamu belum memasukan program studi!";
                header("Location: ./#users");return false;
            }
            mysqli_query($conn_v1, "UPDATE users SET id_prodi='$id_prodi' WHERE nidn='$nidn'");
            return mysqli_affected_rows($conn_v1);
        }
        function editRole_user($data){global $conn_v1;
            $nidn=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['nidn']))));
            $id_role=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['id-role']))));
            if(empty($id_role) || $id_role==0){
                $_SESSION['section']=2;
                $_SESSION['message-danger']="Kamu belum memasukan role!";
                header("Location: ./#users");return false;
            }
            mysqli_query($conn_v1, "UPDATE users SET id_role='$id_role' WHERE nidn='$nidn'");
            return mysqli_affected_rows($conn_v1);
        }
        function editStatus_user($data){global $conn_v1;
            $nidn=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['nidn']))));
            $id_active=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['id-active']))));
            if(empty($id_active) || $id_active==0){
                $_SESSION['section']=2;
                $_SESSION['message-danger']="Kamu belum memasukan status!";
                header("Location: ./#users");return false;
            }
            mysqli_query($conn_v1, "UPDATE users SET id_active='$id_active' WHERE nidn='$nidn'");
            return mysqli_affected_rows($conn_v1);
        }
        function editAccess_user($data){global $conn_v1;
            $nidn=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['nidn']))));
            $id_access=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['id-access']))));
            if(empty($id_access) || $id_access==0){
                $_SESSION['section']=2;
                $_SESSION['message-danger']="Kamu belum memasukan akses aksi!";
                header("Location: ./#users");return false;
            }
            mysqli_query($conn_v1, "UPDATE users SET id_access='$id_access' WHERE nidn='$nidn'");
            return mysqli_affected_rows($conn_v1);
        }
        function deleteUser($data){global $conn_v1;
            $id_user=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['id-user']))));
            mysqli_query($conn_v1, "DELETE FROM users WHERE id_user='$id_user'");
            return mysqli_affected_rows($conn_v1);
        }
        function deleteDoc_nonProdi($data){global $conn_v1;
            $id_data2=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['id-data2']))));
            $id_doc=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['id-doc']))));
            $putDocName=mysqli_query($conn_v1, "SELECT * FROM lpm_doc WHERE id_doc='$id_doc'");
            $rowDoc=mysqli_fetch_assoc($putDocName);
            $docName=$rowDoc['documen'];
            $data_doc=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['data-doc']))));
            $files=glob("Assets/document/".$docName."/".$data_doc);
            foreach ($files as $file) {
                if (is_file($file))
                unlink($file);
            }
            mysqli_query($conn_v1, "DELETE FROM lpm_data2_doc WHERE id_data2='$id_data2'");
            return mysqli_affected_rows($conn_v1);
        }
        function deleteDoc_Prodi($data){global $conn_v1;
            $id_data1=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['id-data1']))));
            $id_doc=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['id-doc']))));
            $putDocName=mysqli_query($conn_v1, "SELECT * FROM lpm_doc WHERE id_doc='$id_doc'");
            $rowDoc=mysqli_fetch_assoc($putDocName);
            $docName=$rowDoc['documen'];
            $data_doc=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['data-doc']))));
            $files=glob("Assets/document/".$docName."/".$data_doc);
            foreach ($files as $file) {
                if (is_file($file))
                unlink($file);
            }
            mysqli_query($conn_v1, "DELETE FROM lpm_data1_doc WHERE id_data1='$id_data1'");
            return mysqli_affected_rows($conn_v1);
        }
        function add_prodiUnit($data){global $conn_v1;
            $prodi_unit=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['prodi-unit']))));
            $id_fakultas=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['id-fakultas']))));
            if(empty($id_fakultas) || $id_fakultas==0){
                $_SESSION['section']=4;
                $_SESSION['message-danger']="Kamu belum memilih fakultas/unit!";
                header("Location: ./#prodi-unit");return false;
            }
            mysqli_query($conn_v1, "INSERT INTO prodi(id_fakultas,prodi) VALUES('$id_fakultas','$prodi_unit')");
            return mysqli_affected_rows($conn_v1);
        }
        function deleteProdiUnit($data){global $conn_v1;
            $id_prodi=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['id-prodi']))));
            mysqli_query($conn_v1, "DELETE FROM prodi WHERE id_prodi='$id_prodi'");
            return mysqli_affected_rows($conn_v1);
        }
        function add_jenis_doc($data){global $conn_v1;
            $document=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['document']))));
            $checkDocument=mysqli_query($conn_v1, "SELECT * FROM lpm_doc WHERE documen='$document'");
            if(mysqli_num_rows($checkDocument)>0){
                $_SESSION['section']=5;
                $_SESSION['message-danger']="Nama dokumen sudah ada! silakan masukan yang lain.";
                header("Location: ./#jenis-doc");return false;
            }
            $id_access=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['id-access']))));
            if(empty($id_access)){
                $_SESSION['section']=5;
                $_SESSION['message-danger']="Kamu belum memilih akses dokumen.";
                header("Location: ./#jenis-doc");return false;
            }
            mkdir("Assets/document/$document");
            mysqli_query($conn_v1, "INSERT INTO lpm_doc(documen,id_access) VALUES('$document','$id_access')");
            return mysqli_affected_rows($conn_v1);
        }
        function delete_jenis_doc($data){global $conn_v1;
            $id_doc=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['id-doc']))));
            $old_doc=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['old-doc']))));
            rmdir("Assets/document/$old_doc");
            mysqli_query($conn_v1, "DELETE FROM lpm_doc WHERE id_doc='$id_doc'");
            return mysqli_affected_rows($conn_v1);
        }
        function schedule(){global $conn_v1,$id_user;
            $dataSchedule=file_schedule();
            mysqli_query($conn_v1, "INSERT INTO schedule(id_user,schedule) VALUES('$id_user','$dataSchedule')");
            return mysqli_affected_rows($conn_v1);
        }
        function file_schedule(){
            $namaFile=$_FILES["documen"]["name"];
            $ukuranFile=$_FILES["documen"]["size"];
            $error=$_FILES["documen"]["error"];
            $tmpName=$_FILES["documen"]["tmp_name"];
            if($error===4){
                $_SESSION['section']=1;
                $_SESSION['message-danger']="Pilih file kamu terlebih dahulu!";
                header("Location: ./"); return false;
            }
            $ekstensiGambarValid=['pdf'];
            $ekstensiGambar=explode('.',$namaFile);
            $ekstensiGambar=strtolower(end($ekstensiGambar));
            if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
                $_SESSION['section']=1;
                $_SESSION['message-danger']="Maaf, file kamu bukan documen!";
                header("Location: ./"); return false;
            }
            if($ukuranFile>5000000){
                $_SESSION['section']=1;
                $_SESSION['message-danger']="Maaf, ukuran file terlalu besar! (5MB)";
                header("Location: ./"); return false;
            }
            $data=$namaFile;
            move_uploaded_file($tmpName,'Assets/document/'.$data);
            return $data;
        }
        function del_schedule($data){global $conn_v1;
            $schedule=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['schedule']))));
            unlink("Assets/document/$schedule");
            mysqli_query($conn_v1, "DELETE FROM schedule");
            return mysqli_affected_rows($conn_v1);
        }
        // function __($data){global $conn_v1, $date;}
    }
    if($_SESSION['id-role']<=3){
        function data1_lpm($data){global $conn_v1, $date, $id_user;
            $id_doc=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['id-doc']))));
            if(empty($id_doc) || $id_doc==0){
                $_SESSION['section']=1;
                $_SESSION['message-danger']="Kamu belum memasukan Jenis Dokumen, silakan masukan ulang!";
                header("Location: ./#page-top");return false;
            }
            $putDocName=mysqli_query($conn_v1, "SELECT * FROM lpm_doc WHERE id_doc='$id_doc'");
            $rowDoc=mysqli_fetch_assoc($putDocName);
            $docName=$rowDoc['documen'];
            $id_prodi=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['id-prodi']))));
            if(empty($id_prodi)){$id_prodi=0;}
            $data_doc=file_documen($id_doc,$id_prodi,$docName);
            if(!$data_doc){return false;}
            if(empty($id_prodi) || $id_prodi==0){
                mysqli_query($conn_v1, "INSERT INTO lpm_data2_doc(id_doc,id_user,data_doc,date_created) VALUES('$id_doc','$id_user','$data_doc','$date')");
            }else if(!empty($id_prodi) || $id_prodi>0){
                mysqli_query($conn_v1, "INSERT INTO lpm_data1_doc(id_doc,id_user,id_prodi,data_doc,date_created) VALUES('$id_doc','$id_user','$id_prodi','$data_doc','$date')");
            }
            return mysqli_affected_rows($conn_v1);
        }
        function file_documen($id_doc,$id_prodi,$docName){
            $namaFile=$_FILES["documen"]["name"];
            $ukuranFile=$_FILES["documen"]["size"];
            $error=$_FILES["documen"]["error"];
            $tmpName=$_FILES["documen"]["tmp_name"];
            if($error===4){
                $_SESSION['section']=1;
                $_SESSION['message-danger']="Pilih documen kamu terlebih dahulu!";
                header("Location: ./#page-top"); return false;
            }
            $ekstensiGambarValid=['xls','pdf','ppt','doc','docx','zip','rar'];
            $ekstensiGambar=explode('.',$namaFile);
            $ekstensiGambar=strtolower(end($ekstensiGambar));
            if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
                $_SESSION['section']=1;
                $_SESSION['message-danger']="Maaf, file kamu bukan documen!";
                header("Location: ./#page-top"); return false;
            }
            if($ukuranFile>100000000){
                $_SESSION['section']=1;
                $_SESSION['message-danger']="Maaf, ukuran file terlalu besar! (10MB)";
                header("Location: ./#page-top"); return false;
            }
            $data_doc=$id_doc."_".$id_prodi."_".$namaFile;
            move_uploaded_file($tmpName,'Assets/document/'.$docName.'/'.$data_doc);
            return $data_doc;
        }
        // function __($data){global $conn_v1, $date;}
    }
    if($_SESSION['id-role']<=4){
        function save_biodata($data){global $conn_v1;
            $id_user=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['id-user']))));
            $nidn=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['nidn']))));
            $old_nidn=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['old-nidn']))));
            if($nidn!=$old_nidn){
                $check_nidn=mysqli_query($conn_v1, "SELECT * FROM users WHERE nidn='$nidn'");
                if(mysqli_num_rows($check_nidn)>0){
                    $_SESSION['message-danger']="Maaf, NIDN/NIP yang kamu masukan sudah ada atau sedang terpakai! Silakan cek ulang.";
                    header("Location: profile"); return false;
                }
            }
            $username=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['username']))));
            $email=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['email']))));
            $old_email=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['old-email']))));
            if($email!=$old_email){
                $checkEmail=mysqli_query($conn_v1, "SELECT * FROM users WHERE email='$email'");
                if(mysqli_num_rows($checkEmail)>0){
                    $_SESSION['message-danger']="Maaf, akun email yang kamu daftarkan sudah ada! Silakan masukan yang lain.";
                    header("Location: registration"); return false;
                }
            }
            $id_prodi=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['id-prodi']))));
            if(empty($id_prodi) || $id_prodi==0){
                $_SESSION['message-danger']="Maaf, kamu belum memilih Progam Studi atau Unit!";
                header("Location: profile"); return false;
            }
            mysqli_query($conn_v1, "UPDATE users SET nidn='$nidn', username='$username', email='$email', id_prodi='$id_prodi' WHERE id_user='$id_user'");
            return mysqli_affected_rows($conn_v1);
        }
        function save_profile($data){global $conn_v1;
            $id_user=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['id-user']))));
            $old_img=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['old-img']))));
            $img=file_photo_user($id_user);
            if(!$img){return false;}
            if($old_img!='default.png'){unlink('Assets/img/'.$old_img);}
            mysqli_query($conn_v1, "UPDATE users SET img='$img' WHERE id_user='$id_user'");
            return mysqli_affected_rows($conn_v1);
        }
        function file_photo_user(){
            $namaFile=$_FILES["profile"]["name"];
            $ukuranFile=$_FILES["profile"]["size"];
            $error=$_FILES["profile"]["error"];
            $tmpName=$_FILES["profile"]["tmp_name"];
            if($error===4){
                $_SESSION['message-danger']="Pilih gambar profil kamu terlebih dahulu!";
                header("Location: profile"); return false;
            }
            $ekstensiGambarValid=['jpg','jpeg','png'];
            $ekstensiGambar=explode('.',$namaFile);
            $ekstensiGambar=strtolower(end($ekstensiGambar));
            if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
                $_SESSION['message-danger']="Maaf, file kamu bukan gambar!";
                header("Location: profile"); return false;
            }
            if($ukuranFile>2000000){
                $_SESSION['message-danger']="Maaf, ukuran gambar terlalu besar! (2MB)";
                header("Location: profile"); return false;
            }
            $namaFile_encrypt=crc32($namaFile);
            $encrypt=$namaFile_encrypt.".jpg";
            move_uploaded_file($tmpName,'Assets/img/'.$encrypt);
            return $encrypt;
        }
        function save_password($data){global $conn_v1;
            $id_user=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['id-user']))));
            $password=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['password']))));
            $checkUser=mysqli_query($conn_v1, "SELECT * FROM users WHERE id_user='$id_user'");
            $row=mysqli_fetch_assoc($checkUser);
            $pass=$row['password'];
            if(password_verify($password, $pass)){
                $password1=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['password1']))));
                $password2=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['password2']))));
                if($password1!=$password2){
                    $_SESSION['message-danger']="Maaf, kata sandi yang kamu masukan tidak sama!";
                    header("Location: profile-settings"); return false;
                }else{
                    $check_lenght_pass=strlen($password1);
                    if($check_lenght_pass<8){
                        $_SESSION['message-danger']="Maaf, password kamu terlalu pendek (Min: 8)!";
                        header("Location: profile-settings");return false;
                    }
                }
                $newPass=password_hash($password1, PASSWORD_DEFAULT);
                mysqli_query($conn_v1, "UPDATE users SET password='$newPass' WHERE id_user='$id_user'");
                return mysqli_affected_rows($conn_v1);
            }else{
                $_SESSION['message-danger']="Maaf, password lama yang kamu masukan salah. Silakan masukan ulang!";
                header("Location: profile-settings");return false;
            }
        }
        // function __($data){global $conn_v1, $date;}
    }
}
    