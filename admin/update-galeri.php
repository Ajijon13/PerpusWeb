<?php 
        include "../conn.php";
            $nama                   = $_FILES['gambar_galeri']['name'];
            $id                     = $_POST['id'];
            $keterangan             = $_POST['keterangan'];
            $ekstensi_diperbolehkan = array('png', 'jpeg', 'jpg');
            $x                      = explode('.', $nama);
            $ekstensi               = strtolower(end($x));
            $ukuran                 = $_FILES['gambar_galeri']['size'];
            $file_tmp              = $_FILES['gambar_galeri']['tmp_name']; 
         
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                if($ukuran < 5044070){ 
                    move_uploaded_file($file_tmp, 'gambar_galeri/'.$nama);
                    $query =mysql_query("UPDATE `galeri` SET `gambar_galeri`='$nama',`keterangan`='$keterangan' WHERE `id`='$id'");
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