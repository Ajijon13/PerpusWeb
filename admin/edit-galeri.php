<?php 
include "../conn.php";

    $usage = $_POST['usage'];
    $id = $_POST['id'];
    
    if($usage == 'get-data'){

        $query = mysql_query("SELECT * FROM galeri WHERE id='$id'");
        $data_query = mysql_fetch_array($query);

        $data = array(
            "status" => "sukses",
            "pesan" => "berhasil ambil data",
            "data" => $data_query
        );

    }
    else{
        $data = array(
            "status" => "gagal",
            "pesan" => "invalid" . $usage . $id
        );

    }

    header('Content-Type: application/json');
    echo json_encode($data);

?>