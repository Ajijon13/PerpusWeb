<?php 
        include "../conn.php";
        
            $t_tertib    = $_POST['t_tertib'];

            $query=mysql_query("INSERT INTO tatatertib VALUES(NULL,'$t_tertib')");
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
       