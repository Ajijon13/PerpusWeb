<?php 
        include "../conn.php";
            $judul             = $_POST['judul'];
            $keterangan             = $_POST['keterangan'];
            $ekstensi_diperbolehkan = array('png', 'jpeg', 'jpg');
            $nama                   = $_FILES['gambar_berita']['name'];
            $x                      = explode('.', $nama);
            $ekstensi               = strtolower(end($x));
            $ukuran                 = $_FILES['gambar_berita']['size'];
            $file_tmp              = $_FILES['gambar_berita']['tmp_name']; 
         
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                if($ukuran < 5044070){ 
                    move_uploaded_file($file_tmp, 'gambar_berita/'.$nama);
                    $query=mysql_query("INSERT INTO berita VALUES(NULL, '$judul','$keterangan','$nama')");
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