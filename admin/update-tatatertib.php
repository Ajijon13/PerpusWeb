<?php 
        include "../conn.php";
       
            $id = $_POST['id'];
            $t_tertib  = $_POST['t_tertib'];
            
        $query = mysql_query("UPDATE tatatertib SET t_tertib='$t_tertib' WHERE id='$id'");
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
        ?> 
    