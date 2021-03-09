<?php 
        include "../conn.php";

            $kunjungan = $_POST['kunjungan'];
            $keterangan = $_POST['keterangan'];
            $ekstensi_diperbolehkan    = array('png', 'jpeg', 'jpg');
            $nama    = $_FILES['gambar_studi']['name'];
            $x        = explode('.', $nama);
            $ekstensi    = strtolower(end($x));
            $ukuran        = $_FILES['gambar_studi']['size'];
            $file_tmp    = $_FILES['gambar_studi']['tmp_name'];
             
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                if($ukuran < 5044070){ 
                    move_uploaded_file($file_tmp, 'gambar_studi/'.$nama);
                    $query = mysql_query("insert into studibanding (id, kunjungan, keterangan, gambar_studi)
                    values (null, '$kunjungan','$keterangan','$nama');
                    ");
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
            else{
                $data = array(
                    "status" => "gagal",
                    "pesan" => "File harus PNG JPEG dan JPG"
                );
                header('Content-Type: application/json');
                echo json_encode($data);
            }
        ?>