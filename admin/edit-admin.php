<?php 
include "../conn.php";

    $usage = $_POST['usage'];
    $user_id = $_POST['user_id'];
    
    if($usage == 'get-data'){

        $query = mysql_query("SELECT * FROM admin WHERE user_id='$user_id'");
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
            "pesan" => "invalid" . $usage . $user_id
        );

    }

    header('Content-Type: application/json');
    echo json_encode($data);

?>