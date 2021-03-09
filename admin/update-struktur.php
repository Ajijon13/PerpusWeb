<?php 
        include "../conn.php";
            $id                     = $_POST['id'];
            $keterangan             = $_POST['keterangan'];
            $ekstensi_diperbolehkan = array('png', 'jpeg', 'jpg');
            $nama                   = $_FILES['gambar']['name'];
            $x                      = explode('.', $nama);
            $ekstensi               = strtolower(end($x));
            $ukuran                 = $_FILES['gambar']['size'];
            $file_tmp              = $_FILES['gambar']['tmp_name']; 
         
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                if($ukuran < 5044070){ 
                    move_uploaded_file($file_tmp, 'gambar/'.$nama);
                    $query=mysql_query("UPDATE struktur SET keterangan='$keterangan',gambar='$nama' WHERE id='$id'");
                    if($query){

                        $data = array(
                            "status" => "berhasil",
                            "pesan" => "Data berhasil diupdate"
                        );
                        header('Content-Type: application/json');
                        echo json_encode($data);

                    }
                    else{
                        $data = array(
                            "status" => "gagal",
                            "pesan" => "Data gagal diupdate"
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