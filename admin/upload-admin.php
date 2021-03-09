<?php 
        include "../conn.php";
			$user_id		   = $_POST['user_id'];
            $username          = $_POST['username'];
            $password          = $_POST['password'];
            $fullname  		   = $_POST['fullname'];
			$ekstensi_diperbolehkan = array('png', 'jpeg', 'jpg');
            $nama                   = $_FILES['gambar_admin']['name'];
            $x                      = explode('.', $nama);
            $ekstensi               = strtolower(end($x));
            $ukuran                 = $_FILES['gambar_admin']['size'];
            $file_tmp              = $_FILES['gambar_admin']['tmp_name']; 
         
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                if($ukuran < 5044070){ 
                    move_uploaded_file($file_tmp, 'gambar_admin/'.$nama);
                    $query=mysql_query("INSERT INTO `admin` VALUES('$user_id', '$username','$password','$fullname','$nama')");
                    if($query){

						$data = array(
                            "status" => "berhasil",
                            "pesan" => "Data berhasil diupload"
                        );
                        header('Content-Type: application/json');
                        echo json_encode($data);

                    }
                    else{
                        $data = array(
                            "status" => "gagal",
                            "pesan" => "Data gagal diupload"
                        );
                        header('Content-Type: application/json');
                        echo json_encode($data);
                    }
                }
                else{
                    $data = array(
                        "status" => "gagal",
                        "pesan" => "File terlalu besar"
                    );
                    header('Content-Type: application/json');
                    echo json_encode($data);
                }
            } 
?> 