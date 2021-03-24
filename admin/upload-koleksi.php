<?php 
    include "../conn.php";
        $th_pel = $_POST['th_pel'];
        $koleksi = $_POST['koleksi'];
        $keterangan = $_POST['keterangan'];
        $jumlah = $_POST['jumlah'];
        $tambahan  = $_POST['tambahan'];
        $total = $_POST['total'];

        $query = mysql_query("insert into koleksi (id, th_pel, koleksi, keterangan, jumlah, tambahan, total)
                values (null, '$th_pel', '$koleksi', '$keterangan', '$jumlah', '$tambahan', '$total');
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

?>