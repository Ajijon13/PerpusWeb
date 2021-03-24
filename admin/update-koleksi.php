<?php 
        include "../conn.php";
 
            $id = $_POST['id'];
            $th_pel = $_POST['th_pel'];
            $koleksi = $_POST['koleksi'];
            $keterangan = $_POST['keterangan'];
            $jumlah = $_POST['jumlah'];
            $tambahan  = $_POST['tambahan'];
            $total = $_POST['total'];
            
        $query = mysql_query("UPDATE `koleksi` SET `th_pel`='$th_pel',`koleksi`='$koleksi',`keterangan`='$keterangan',`jumlah`='$jumlah',`tambahan`='$tambahan',`total`='$total' WHERE id='$id'");
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

