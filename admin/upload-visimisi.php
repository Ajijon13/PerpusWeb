<?php 
        include "../conn.php";
       
            $visi    = $_POST['visi'];
            $misi = $_POST['misi'];

            $query=mysql_query("INSERT INTO visimisi VALUES(NULL,'$visi','$misi')");
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
        ?> 
       