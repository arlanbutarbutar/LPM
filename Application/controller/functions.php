<?php if(!isset($_SESSION)){session_start();}
$date=date("l, d M Y");
if(!isset($_SESSION['id-user'])){
    function login($data){global $conn_v1;
        $email=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['email']))));
        $password=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['password']))));
        $users=mysqli_query($conn_v1, "SELECT * FROM users WHERE email='$email'");
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
            $_SESSION['message-danger']="Maaf, kamu belum memilih Progam Studi!";
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
    if($_SESSION['id-role']==1){
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
            $data_doc=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['data-doc']))));
            $files=glob("Assets/document/".$data_doc);
            foreach ($files as $file) {
                if (is_file($file))
                unlink($file);
            }
            mysqli_query($conn_v1, "DELETE FROM lpm_data2_doc WHERE id_data2='$id_data2'");
            return mysqli_affected_rows($conn_v1);
        }
        function deleteDoc_Prodi($data){global $conn_v1;
            $id_data1=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['id-data1']))));
            $data_doc=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['data-doc']))));
            $files=glob("Assets/document/".$data_doc);
            foreach ($files as $file) {
                if (is_file($file))
                unlink($file);
            }
            mysqli_query($conn_v1, "DELETE FROM lpm_data1_doc WHERE id_data1='$id_data1'");
            return mysqli_affected_rows($conn_v1);
        }
        // function __($data){global $conn_v1, $date;}
    }
    if($_SESSION['id-role']<=2){
        function data1_lpm($data){global $conn_v1, $date;
            $id_doc=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['id-doc']))));
            if(empty($id_doc) || $id_doc==0){
                $_SESSION['section']=1;
                $_SESSION['message-danger']="Kamu belum memasukan Jenis Dokumen, silakan masukan ulang!";
                header("Location: ./#page-top");return false;
            }
            $id_prodi=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn_v1, $data['id-prodi']))));
            if(empty($id_prodi)){$id_prodi=0;}
            $data_doc=file_documen($id_doc,$id_prodi);
            if(!$data_doc){return false;}
            if(empty($id_prodi) || $id_prodi==0){
                mysqli_query($conn_v1, "INSERT INTO lpm_data2_doc(id_doc,data_doc,date_created) VALUES('$id_doc','$data_doc','$date')");
            }else if(!empty($id_prodi) || $id_prodi>0){
                mysqli_query($conn_v1, "INSERT INTO lpm_data1_doc(id_doc,id_prodi,data_doc,date_created) VALUES('$id_doc','$id_prodi','$data_doc','$date')");
            }
            return mysqli_affected_rows($conn_v1);
        }
        function file_documen($id_doc,$id_prodi){
            $namaFile=$_FILES["documen"]["name"];
            $ukuranFile=$_FILES["documen"]["size"];
            $error=$_FILES["documen"]["error"];
            $tmpName=$_FILES["documen"]["tmp_name"];
            if($error===4){
                $_SESSION['section']=1;
                $_SESSION['message-danger']="Pilih documen kamu terlebih dahulu!";
                header("Location: ./#page-top"); return false;
            }
            $ekstensiGambarValid=['xls','pdf','ppt','doc','docx'];
            $ekstensiGambar=explode('.',$namaFile);
            $ekstensiGambar=strtolower(end($ekstensiGambar));
            if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
                $_SESSION['section']=1;
                $_SESSION['message-danger']="Maaf, file kamu bukan documen!";
                header("Location: ./#page-top"); return false;
            }
            if($ukuranFile>20000000){
                $_SESSION['section']=1;
                $_SESSION['message-danger']="Maaf, ukuran gambar terlalu besar! (20MB)";
                header("Location: ./#page-top"); return false;
            }
            $data_doc=$id_doc."_".$id_prodi."_".$namaFile;
            move_uploaded_file($tmpName,'Assets/document/'.$data_doc);
            return $data_doc;
        }
        // function __($data){global $conn_v1, $date;}
    }
    if($_SESSION['id-role']<=3){
        // function __($data){global $conn_v1, $date;}
    }
    if($_SESSION['id-role']<=4){
        // function __($data){global $conn_v1, $date;}
    }
}
    