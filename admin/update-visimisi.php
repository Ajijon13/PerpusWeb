<?php 
        include "../conn.php";

            $id = $_POST['id'];
            $visi  = $_POST['visi'];
            $misi = $_POST['misi'];
            
            
        $query = mysql_query("UPDATE `visimisi` SET `visi`='$visi', `misi`='$misi' WHERE id='$id'");
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