<?php 
        include "../conn.php";

            $id                     = $_POST['id'];
            $keterangan             = $_POST['keterangan'];
            $ekstensi_diperbolehkan = array('png', 'jpeg', 'jpg');
            $nama                   = $_FILES['gambar_prestasi']['name'];
            $x                      = explode('.', $nama);
            $ekstensi               = strtolower(end($x));
            $ukuran                 = $_FILES['gambar_prestasi']['size'];
            $file_tmp              = $_FILES['gambar_prestasi']['tmp_name']; 
         
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                if($ukuran < 5044070){ 
                    move_uploaded_file($file_tmp, 'gambar_prestasi/'.$nama);
                    $query=mysql_query ("UPDATE prestasi SET keterangan='$keterangan',gambar_prestasi='$nama' WHERE id='$id'");
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